<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(\App\User::class, 10)->create();

        factory(App\Category::class, 50)->create()->each(function ($category) {
            $posts = factory(App\Post::class, random_int(2, 8))->make();

            print_r($posts->toArray());

            $category->posts()->saveMany($posts);
        });
    }
}
