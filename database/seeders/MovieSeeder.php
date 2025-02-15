<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;


class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::insert([
            [
                'title' => 'Inception',
                'director' => 'Christopher Nolan',
                'genre' => 'Sci-Fi',
                'release_year' => 2010,
                'duration' => 148,
                'synopsis' => 'A mind-bending thriller about dreams within dreams.'
            ],
            [
                'title' => 'The Matrix',
                'director' => 'Lana Wachowski, Lilly Wachowski',
                'genre' => 'Action',
                'release_year' => 1999,
                'duration' => 136,
                'synopsis' => 'A computer hacker learns about the true nature of reality.'
            ]
        ]);
    }
}
