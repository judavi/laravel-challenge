<?php

class Entry extends BaseModel implements ModelInterface {

    protected $table = 'entries';

    protected $fillable = ['title', 'content', 'author_id', 'slug'];


    public function author()
    {
        return $this->belongsTo('User');
    }
}