<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(30)->create();
        Tweet::factory(100)->create();
        Tag::factory(70)->create();

        foreach (Tweet::all() as $tweet) {
            $tweet->tags()->attach(
                Tag::inRandomOrder()->take(rand(1,3))->pluck('id')
            );
        }
    }
}
