<?php

class EntriesRepository extends BaseRepository implements RepositoryInterface {

    /**
     * @return Eloquent
     */
    public function getModel()
    {
        return new Entry();
    }

    public function getLatestThreeEntriesByUser($users_id)
    {

    }

    public function findByTitle($slug){
        $this->model
            ->with(['author'])
            ->where('slug', '=', $slug)
            ->first();
    }

    public function getNumberOfSlugs($slug){
        return $this->model
            ->where('slug', '=', $slug)
            ->get()
            ->count();
    }
}