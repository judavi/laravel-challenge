<?php

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$user_name = $faker->userName;

			User::create([
				'id' => $index,
				'username' => $user_name,
				'email' => $faker->email,
				'password' => 123456,
				'slug' => Str::slug($user_name),
				'twitter_account' => $user_name,
			]);
		}
	}

}