<?php
use Illuminate\Http\Request as Input;


abstract class BaseManager {

    protected $entity;
    protected $data;
    protected $input;

    abstract public function getRules();
    function __construct(ModelInterface $entity, Input $input)
    {
        $this->entity = $entity;
        $this->setData($input->all());
        $this->input;
    }

    public function save()
    {
        $this->isValid();
        $this->entity->fill($this->data);
        $this->entity->save();

        return true;
    }

    public function isValid()
    {
        $validation = \Validator::make($this->data, $this->getRules());

        if ($validation->fails()) {
            //dd($validation->messages());
            throw new ValidationException('Validation failed', $validation->messages());
        }

    }

    protected function setData(Array $data)
    {
        $this->data = array_only($data, array_keys($this->getRules()));
    }


    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }

} 