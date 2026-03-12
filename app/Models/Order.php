<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'address',
        'notes',
        'total',
        'items',
        'status',
    ];

    protected $casts = [
        'items' => 'array', // automatically convert JSON to array
    ];
}