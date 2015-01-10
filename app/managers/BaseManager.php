<?php
use Illuminate\Http\Request as Input;


abstract class BaseManager {

    protected $model;
    protected $data;
    protected $input;
    protected $entryRepository;
    protected $usersRepository;

    abstract public function getRules();

    function __construct(ModelInterface $model, Input $input)
    {
        $this->model = $model;
        $this->data = $this->setData($input->all());
        $this->input = $input;
        $this->usersRepository = new UsersRepository();
        $this->entryRepository = new EntriesRepository();
    }

    public function save()
    {
        $this->isValid();
        $this->model->fill($this->data);
        $this->model->save();

        return true;
    }

    protected function isValid()
    {
        $validation = \Validator::make($this->data, $this->getRules());

        if ($validation->fails()) {
            //dd($validation->messages());
            throw new ValidationException('Validation failed', $validation->messages());
        }

    }

    protected function setData(Array $data)
    {
        return array_only($data, array_keys($this->getRules()));
    }


    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

} 