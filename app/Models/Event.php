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
        'movie_id'
    ];

    /**
     * Relation: 1 Event - 1 Movie
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
