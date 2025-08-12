<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::all();

        // Safety check: ensure at least 4 tags exist
        if ($tags->count() < 4) {
            throw new \Exception("At least 4 tags are required. Please run TagSeeder before UserSeeder.");
        }

        // Create 20 users with posts, comments, and tag relationships
        User::factory(20)
            ->create()
            ->each(function ($user) use ($tags) {
                // Each user has 1–3 posts
                $posts = Post::factory(rand(1, 3))
                    ->for($user)
                    ->create();

                $posts->each(function ($post) use ($user, $tags) {
                    // Each post has 2–5 comments (by the post owner)
                    Comment::factory(rand(2, 5))
                        ->for($post)
                        ->for($user)
                        ->create();

                    // Attach 1–4 random tags
                    $post->tags()->attach(
                        $tags->random(rand(1, min(4, $tags->count())))->pluck('id')->toArray()
                    );
                });
            });

        // Create 1 test user (without posts/comments)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
