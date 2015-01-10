<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Carbon\Carbon;

class EntriesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 70) as $index) {
            $date = Carbon::now()->subDays(rand(1, 50));

            Entry::create([
                'id'         => $index,
                'title'      => $faker->sentence(rand(4, 6)),
                'content'    => $faker->text(),
                'author_id'  => rand(1, 10),
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }

}