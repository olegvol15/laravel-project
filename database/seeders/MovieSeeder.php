<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Category;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Action' => [
                ['title' => 'Mad Max: Fury Road', 'year' => 2015, 'description' => 'Post-apocalyptic chaos and car chases.'],
                ['title' => 'John Wick', 'year' => 2014, 'description' => 'A retired hitman seeks revenge.'],
            ],
            'Comedy' => [
                ['title' => 'The Mask', 'year' => 1994, 'description' => 'A man discovers a magical mask.'],
                ['title' => 'Home Alone', 'year' => 1990, 'description' => 'Boy defends house from burglars.'],
            ],
            'Drama' => [
                ['title' => 'The Shawshank Redemption', 'year' => 1994, 'description' => 'Hope and friendship in prison.'],
                ['title' => 'Forrest Gump', 'year' => 1994, 'description' => 'Life story of a simple man.'],
            ],
            'Horror' => [
                ['title' => 'The Conjuring', 'year' => 2013, 'description' => 'Paranormal investigators face evil.'],
                ['title' => 'Hereditary', 'year' => 2018, 'description' => 'Family secrets turn terrifying.'],
            ],
            'Sci-Fi' => [
                ['title' => 'Interstellar', 'year' => 2014, 'description' => 'Space journey to save mankind.'],
                ['title' => 'Inception', 'year' => 2010, 'description' => 'Dreams within dreams.'],
            ],
            'Romance' => [
                ['title' => 'The Notebook', 'year' => 2004, 'description' => 'Enduring love story.'],
                ['title' => 'Titanic', 'year' => 1997, 'description' => 'Love aboard a sinking ship.'],
            ],
            'Fantasy' => [
                ['title' => 'Harry Potter and the Sorcerer\'s Stone', 'year' => 2001, 'description' => 'A boy discovers he’s a wizard.'],
                ['title' => 'The Lord of the Rings: The Fellowship of the Ring', 'year' => 2001, 'description' => 'Quest to destroy the One Ring.'],
            ],
            'Documentary' => [
                ['title' => 'Planet Earth', 'year' => 2006, 'description' => 'Stunning look at nature.'],
                ['title' => 'The Social Dilemma', 'year' => 2020, 'description' => 'The impact of social media.'],
            ],
        ];

        foreach ($data as $categoryName => $movies) {
            $category = Category::where('name', $categoryName)->first();
            if ($category) {
                foreach ($movies as $movieData) {
                    Movie::create([
                        'title' => $movieData['title'],
                        'description' => $movieData['description'],
                        'year' => $movieData['year'],
                        'category_id' => $category->id,
                    ]);
                }
            }
        }
    }
}
