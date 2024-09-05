<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Comment::factory(10)->create();

        User::factory()->create([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => env('ADMIN_PASSWORD'),
            'role' => 1,
            'subscribed' => 1
        ]);
    }
}
