<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'book_id'
    ];

    /**
     * Relation: 1 Event - 1 Movie
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
