<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Carbon\Carbon;

class EntriesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 150) as $index) {
            $title = $faker->sentence(rand(4, 6));
            $date = Carbon::now()->subDays(rand(1, 20));

            Entry::create([
                'id'         => $index,
                'title'      => $title,
                'content'    => $faker->text(),
                'slug' => Str::slug($title),
                'author_id'  => rand(1, 10),
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }

}