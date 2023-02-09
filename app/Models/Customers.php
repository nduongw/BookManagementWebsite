<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = "customers";
    protected $fillable = [
        'username',
        "first_name",
        "last_name",
        "avatar",
        "birthday",
        "phone",
        "address",
        "email",
        "money_spent",
    ];

    protected $hidden = [
        'password'
    ];

    public $timestamps = false;
}
