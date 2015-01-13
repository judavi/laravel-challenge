<?php



class UpdateUserManager extends BaseManager implements ManagerInterface {

    function __construct(User $model, Illuminate\Http\Request $input)
    {
        $this->model = $model;
        $this->data = $this->setData($input->all());
        $this->input = $input;
        $this->usersRepository = new UsersRepository();
        $this->entryRepository = new EntriesRepository();
    }

    public function getRules()
    {
        return [
            'username'        => 'required|unique:users,username,'.$this->model->id,
            'email'           => 'required|email|unique:users,email,'.$this->model->id,
            'twitter_account' => 'required|unique:users,email,'.$this->model->id,
        ];
    }
}