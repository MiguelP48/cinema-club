<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Movie;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movie = Movie::first();
        $user = User::first();

        Review::insert([
            [
                'movie_id' => $movie ? $movie->id : null,
                'user_id' => $user ? $user->id : null,
                'comment' => 'Amazing movie, mind-blowing effects!',
                'rating' => 5
            ],
            [
                'movie_id' => $movie ? $movie->id : null,
                'user_id' => $user ? $user->id : null,
                'comment' => 'A classic sci-fi that changed cinema forever.',
                'rating' => 4
            ]
        ]);
    }
}
