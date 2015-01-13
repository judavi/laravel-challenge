<?php

class UpdateEntryManager extends BaseManager implements ManagerInterface {

    public function getRules()
    {
        return [
            'title'     => 'required',
            'content'   => '',
            'slug'      => 'unique:entries,slug,' . $this->model->id,
        ];
    }
}