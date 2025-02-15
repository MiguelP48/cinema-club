<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'movie_id',
        'user_id',
        'comment',
        'rating'
    ];

    /**
     * Relation: 1 Review - 1 User
     */
    public function user()
    {
        return $this->belongsTo(related: User::class);
    }

    /**
     * Relation: 1 Review - 1 Movie
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
