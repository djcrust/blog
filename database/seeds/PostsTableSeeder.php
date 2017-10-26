<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        $limit = 5;

        for ($i = 0; $i <$limit; $i++) {
            DB::table('posts')->insert ([
               'title' => $faker -> catchPhrase,
               'slug' => $faker -> slug,
               'body' => $faker -> paragraph,
                'created_at' => $faker -> dateTime($max = 'now'),
                'updated_at' => $faker -> dateTime($max = 'now'),
            ]);
        }

    }
}
