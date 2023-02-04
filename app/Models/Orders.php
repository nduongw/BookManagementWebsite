<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $fillable = [
        "customer_id",
        "fullname",
        "phone",
        "address",
        "note",
        "total",
        "status"
    ];

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'last_updated';
}
