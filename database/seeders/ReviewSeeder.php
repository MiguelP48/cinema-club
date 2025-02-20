<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;


class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book = Book::first();
        $user = User::first();

        Review::insert([
            [
                'book_id' => $book ? $book->id : null,
                'user_id' => $user ? $user->id : null,
                'comment' => 'Amazing book, mind-blowing effects!',
                'date' => Carbon::now()->addDays(5),
            ],
            [
                'book_id' => $book ? $book->id : null,
                'user_id' => $user ? $user->id : null,
                'comment' => 'A classic sci-fi book that changed the life forever.',
                'date' => Carbon::now()->addDays(5),
            ]
        ]);
    }
}
