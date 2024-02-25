<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User Factory
        if (!User::find(1)) {
            User::create([
                'name' => 'Admin',
                'username' => 'admin',
                'password' => 'admin',
                'role' => 'admin',
                'image_url' => 'https://i.pravatar.cc/300'
            ]);
        };

        // Category Factory
        Category::factory(10)->create();

        // Post Factory
        $categories = Category::all();
        foreach ($categories as $category) {
            Post::factory(10)->create(['category_id' => $category->id]);
        }

        // Comment Factory
        $posts = Post::all();
        foreach ($posts as $post) {
            Comment::factory(4)->create([
                'post_id' => $post->id,
            ]);
        }
    }
}
