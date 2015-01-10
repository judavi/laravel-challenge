<?php
/**
 * Created by PhpStorm.
 * User: perseus
 * Date: 9/01/15
 * Time: 9:58 PM
 */

class CreateUserManager extends BaseManager implements ManagerInterface{

    public function getRules()
    {
        return [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|unique:users',
            'confirm_password' => 'required|same:password',
            'twitter_account' => 'required|unique:users',
            'slug' => 'alpha'
        ];
    }
}