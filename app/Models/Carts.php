<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;

    protected $table = "carts";
    protected $primaryKey = null;
    protected $fillable = [
        "customer_id",
        "book_id",
        "quantity"
    ];

    public $timestamps = false;
}
