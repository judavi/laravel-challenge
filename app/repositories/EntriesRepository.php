<?php
class EntriesRepository extends BaseRepository implements RepositoryInterface {
    /**
     * @return Eloquent
     */
    public function getModel()
    {
        return new Entry();
    }
    public function getLatestThreeEntriesByUser()
    {
        return $this->model->with(['author' => function($query){
            $query->groupBy('id');
        }])->orderBy('created_at', 'DESC')->take(2);
    }

    public function allEntries(){
        return $this->model->with(['author'])->orderBy('created_at', 'DESC')->paginate(5);
    }

    public function getAllByAuthor($author_id){
        return $this->model->where('author_id', '=', $author_id)->paginate(5);
    }

    public function findByTitle($slug){
        $entry = $this->model
            ->with(['author'])
            ->where('slug', '=', $slug)
            ->first();

        if(is_null($entry)){
            throw new ResourceException('What you are looking for does not exist', 404);

        }else{
            return $entry;
        }
    }
    public function getNumberOfSlugs($slug){
        return $this->model
            ->where('slug', '=', $slug)
            ->get()
            ->count();
    }
}