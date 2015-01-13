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
        $user = $this->model
            ->with(['entries'])
            ->where('slug', '=', $slug)
            ->first();
        if(is_null($user)){
            throw new ResourceException('What you are looking for does not exist', 404);

        }else{
            return $user;
        }
    }
}