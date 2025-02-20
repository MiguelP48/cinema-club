<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::insert([
            [
                'title' => 'Inception',
                'author' => 'Christopher Nolan',
                'genre' => 'Sci-Fi',
                'release_year' => 2010
            ],
            [
                'title' => 'The Matrix',
                'author' => 'Lana Wachowski, Lilly Wachowski',
                'genre' => 'Action',
                'release_year' => 1999,
            ]
        ]);
    }
}
