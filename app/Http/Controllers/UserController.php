<?php

namespace App\Http\Controllers;

use Input;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{


    public function show($id)
    {
        // Получить экземпляр модели по ключу...
        $user = User::find($id);
        return view('user/profile', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (Input::hasFile('avatar'))
        {
            if (Input::file('avatar')->isValid())
            {
                $image = Input::file('avatar');
                $destinationPath = public_path('images') . '/avatars';
                $user->avatar = $user->createAvatar($image);
            }
        }

        $user->name = htmlspecialchars($request->name);

        $user->save();

        return \Redirect::to('user/'.$id);
    }

}
