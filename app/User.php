<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class User extends SleepingOwlModel implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract,
                                    ModelWithImageFieldsInterface
{
    use Authenticatable, Authorizable, CanResetPassword;
    use ModelWithImageOrFileFieldsTrait;
  //  use ModelWithImageOrFileFieldsTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'avatar', 'fb_id', 'vk_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public static function getList()
    {
        return static::lists('name', 'id') -> all();
    }

    public function getImageFields()
    {
        return [
            'avatar' =>  '/avatars'
        ];
    }

    public function createAvatar($image){
        if (is_null($image)) return;

        if ($image instanceof UploadedFile)
        {
            $extension = $image->getClientOriginalExtension();
            $time = time();
            $destinationName = str_random(15)."_".$time.".".$extension;
            $destinationPath = public_path('images') . '/avatars';

            if(!$image->move($destinationPath, $destinationName)) {
                return $this->errors(['message' => 'Error saving the file.', 'code' => 400]);
            }
            \Image::make($destinationPath."/".$destinationName)->resize(200, 200)->save($destinationPath."/".$destinationName);

        }
        return  asset('images/avatars/'.$destinationName);
    }
}
