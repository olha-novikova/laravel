<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Input;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $image = Input::file('avatar');

        $destinationPath = public_path('images') . '/avatars';

        if(!$image->move($destinationPath, $image->getClientOriginalName())) {
            return $this->errors(['message' => 'Error saving the file.', 'code' => 400]);
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'avatar' => $image->getClientOriginalName(),
        ]);
    }

    public  function getFBLogin(){
        return Socialite::driver('facebook')->redirect();
    }

    public  function getVKLogin(){
        return Socialite::with('vkontakte')->redirect();
    }

    public function getFBUser()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/login');
        }

        $authUser = $this->findOrCreateUser($user, 'facebook');

        \Auth::login($authUser, true);

        return \Redirect::to('/');
    }

    public function getVKUser()
    {
        try {
            $user = Socialite::driver('vkontakte')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/login');
        }

        $authUser = $this->findOrCreateUser($user, 'vkontakte');

        \Auth::login($authUser, true);

        return \Redirect::to('/');
    }

    private function findOrCreateUser($providerUser, $provider)
    {
        switch ($provider){
            case 'vkontakte':
                $id_type = 'vk_id';
                break;
            case 'facebook':
                $id_type = 'fb_id';
                break;
            case 'google':
                break;
        }

        if ( $authUser = User::where($id_type, $providerUser->id)->first() ) {
            return $authUser;
        }

        return User::create([
            'name' => $providerUser->name,
            'email' => $providerUser->email,
             $id_type => $providerUser->id,
            'avatar' => $providerUser->avatar
        ]);

    }
}
