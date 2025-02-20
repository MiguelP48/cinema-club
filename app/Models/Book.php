<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'genre',
        'release_year'
    ];

    /**
     * REe1 Movie - N Reviews.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
