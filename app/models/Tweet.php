<?php
/**
 * Created by PhpStorm.
 * User: perseus
 * Date: 12/01/15
 * Time: 4:24 PM
 */

class Tweet extends BaseModel implements ModelInterface {

    protected $table = 'hidden_tweets';

    protected $fillable = ['tweet_id'];

}