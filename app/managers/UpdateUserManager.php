<?php

/**
 * Created by PhpStorm.
 * User: perseus
 * Date: 9/01/15
 * Time: 10:00 PM
 */
class UpdateUserManager extends BaseManager implements ManagerInterface {

    public function getRules()
    {
        return [
            'username'        => 'required|unique:users,username,' . $this->model->id,
            'email'           => 'required|email|unique:users,email,' . $this->model->id,
            'twitter_account' => 'required|unique:users,email,' . $this->model->id,

        ];
    }
}