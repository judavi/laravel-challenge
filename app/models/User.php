<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 *
 * The class that represents de users model in the application
 *
 * Class User
 */
class User extends BaseModel implements UserInterface, RemindableInterface, ModelInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The fillable attributes for users
	 *
	 * @var array
     */
	protected $fillable = ['username', 'email', 'password', 'twitter_account'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
