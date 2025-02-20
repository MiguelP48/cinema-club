<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Book;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book = Book::first();

        Event::insert([
            [
                'title' => 'Cine Club - Inception',
                'description' => 'Proyección de Inception con debate.',
                'date' => Carbon::now()->addDays(5),
                'location' => 'Cine Club Sala 1',
                'book_id' => $book ? $book->id : null
            ],
            [
                'title' => 'Maratón Matrix',
                'description' => 'Maratón de The Matrix y sus secuelas.',
                'date' => Carbon::now()->addDays(10),
                'location' => 'Cine Club Sala 2',
                'book_id' => $book ? $book->id : null
            ]
        ]);
    }
}
