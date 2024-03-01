<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory(10)->create();
        \App\Models\Topic::factory(6)->create();

        Tag::factory(10)->create();

        $posts = Post::factory(60)->state(new Sequence(
            fn(Sequence $sequence) => ['user_id' => User::all()->random(), 'topic_id' => Topic::all()->random()],
        ))->create();

        foreach ($posts as $post) {
            $tags = Tag::inRandomOrder()->limit(rand(1, 5))->get();
            $post->tags()->attach($tags);
        }
    }
}
