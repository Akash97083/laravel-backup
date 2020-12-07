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

        factory(App\Category::class, 20)->create()->each(function ($category) {
            for ($i = 0; $i < random_int(1, 5); $i++) {
                // print_r(factory(App\Post::class)->make()->toArray());
                $category->posts()->save(factory(App\Post::class)->make());
            }
        });
    }
}
