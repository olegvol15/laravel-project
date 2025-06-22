<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Actor;
use App\Models\Movie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = Category::factory()->count(5)->create();
        $actors = Actor::factory()->count(5)->create();

        Movie::factory()->count(15)->create()->each(function ($movie) use ($categories, $actors) {
            $movie->category()->associate($categories->random());
            $movie->actors()->attach($actors->random(3));
            $movie->save();
        });
    }
}
