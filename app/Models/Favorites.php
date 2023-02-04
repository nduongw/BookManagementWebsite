<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;

    protected $table = "favorites";
    protected $fillable = [
        "book_id",
        "customer_id"
    ];

    public $timestamps = false;
}
