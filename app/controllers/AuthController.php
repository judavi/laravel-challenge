<?php

class AuthController extends \BaseController
{

    public function auth()
    {
        $data = Input::only('username', 'password');

        $credentials = array(
            'username' => $data['username'],
            'password' => $data['password']
        );


        if (Auth::attempt($credentials)) {
            return Redirect::route('users.show');
        } else {
            return Redirect::back()->with('login_error', 1);
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('login');

    }

} 