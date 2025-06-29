<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 
use App\Models\Actor;
class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actors = [
            'Leonardo DiCaprio',
            'Morgan Freeman',
            'Scarlett Johansson',
            'Brad Pitt',
            'Angelina Jolie',
            'Tom Hardy',
            'Natalie Portman'
        ];

        foreach ($actors as $name) {
            Actor::create(['name' => $name]);
        }
    }
}
