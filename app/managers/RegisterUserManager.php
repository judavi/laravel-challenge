<?php


class RegisterUserManager extends BaseManager implements ManagerInterface{

    function __construct(User $model, Illuminate\Http\Request $input)
    {
        $input->all();
        $this->model = $model;
        $this->data = $this->setData($input->all());
        $this->input = $input;

    }

    public function getRules()
    {
        return [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|unique:users',
            'confirm_password' => 'required|same:password',
            'twitter_account' => 'required|unique:users',
            'slug' => 'required'
        ];
    }
}