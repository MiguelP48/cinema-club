<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = [
        'title',
        'director',
        'genre',
        'release_year',
        'duration',
        'synopsis'
    ];

    /**
     * REe1 Movie - N Reviews.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
