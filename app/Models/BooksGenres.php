<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksGenres extends Model
{
    use HasFactory;

    protected $table = "books_genres";
    protected $fillable = [
        "book_id",
        "genres_id"
    ];

    public $timestamps = false;
}
