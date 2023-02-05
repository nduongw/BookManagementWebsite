<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksPublishers extends Model
{
    use HasFactory;
    protected $table = "books_publishers";
    protected $fillable = [
        "book_id",
        "publisher_id"
    ];

    public $timestamps = false;
}
