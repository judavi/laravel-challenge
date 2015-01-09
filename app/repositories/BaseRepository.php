<?php

/**
 * Class BaseRepository
 */
abstract class BaseRepository {

    /**
     * @var
     */
    protected $model;

    /**
     *
     */
    function __construct()
    {
        $this->model = $this->getModel();
    }

    /**
     * @return Eloquent
     */
    abstract public function getModel();

    /**
     * @param $id
     * @return Eloquent
     */
    public function find($id){
        return $this->model->find($id);
    }

    /**
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all(){
        return $this->model->all();
    }

}