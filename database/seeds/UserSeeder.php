<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create()->each(function ($user) {
            $user->posts()
                ->saveMany(factory(Post::class, 3)->make())
                ->each(function ($post) {
                    $post->categories()
                        ->attach(Category::all()->random());
                });
        });
    }
}
