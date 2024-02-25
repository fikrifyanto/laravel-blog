<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!User::find(1)) {
            User::create([
                'name' => 'Admin',
                'username' => 'admin',
                'password' => 'admin',
                'role' => 'admin'
            ]);
        };

        Post::factory(10)->create();
    }
}
