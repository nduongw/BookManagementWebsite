<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = "books";
    protected $fillable = [
        "tittle",
        // "image",
        "price",
        // "discount",
        // "import_price",
        "quantity",
        "content",
        "categoryid"
        // "publication_date"
    ];

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_updated';

    public $timestamps = false;
}
