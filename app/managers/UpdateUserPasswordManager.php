<?php

class UpdateUserPasswordManager extends BaseManager implements ManagerInterface {

    function __construct(User $model, Illuminate\Http\Request $input)
    {
        $this->model = $model;
        $this->data = $this->setData($input->all());
        $this->input = $input;

    }

    public function getRules()
    {
        return [
            'current_password'     => 'required',
            'new_password'         => 'required|unique:users,username,:id',
            'new_password_confirm' => 'required|same:new_password',
        ];
    }

    public function save(){

        $this->isValid();
        $this->isTheUserPassword();
        $this->model->fill(['password' => $this->data['new_password']]);
        $this->model->save();

        return true;
    }

    public function isTheUserPassword(){

        if($this->model->password == $this->data['current_password']){
            return true;
        }else{
            throw new InvalidPasswordException('Is not your current Password');

        }
    }
}