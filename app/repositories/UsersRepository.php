<?php

class UsersRepository extends BaseRepository implements RepositoryInterface {

    /**
     * @return Eloquent
     */
    public function getModel()
    {
        return new User();
    }

    public function allUsersId(){
        return $this->model
            ->select('id')
            ->get();
    }

    public function findByUserName($slug){
        $this->model
            ->with(['entries'])
            ->where('slug', '=', $slug)
            ->first();
    }
}