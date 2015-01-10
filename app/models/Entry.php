<?php
/**
 * Created by PhpStorm.
 * User: perseus
 * Date: 9/01/15
 * Time: 6:03 PM
 */

class Entry extends BaseModel implements ModelInterface {

    protected $table = 'entries';

    protected $fillable = ['title', 'content', 'author_id', 'slug'];

    public function author(){
        return $this->belongsTo('Entry');
    }
}