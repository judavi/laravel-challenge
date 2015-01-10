<?php

/**
 * Created by PhpStorm.
 * User: perseus
 * Date: 10/01/15
 * Time: 12:51 AM
 */
class UpdateEntryManager extends BaseManager implements ManagerInterface {

    public function getRules()
    {
        return [
            'title'     => 'required',
            'content'   => '',
            'author_id' => 'required|integer',
            'slug'      => 'alpha|unique:entries,slug,' . $this->model->id,
        ];
    }
}