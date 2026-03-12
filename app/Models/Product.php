<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'brand',
        'gender',
        'description',
        'price_10ml',
        'price_30ml',
        'image',
        'stock',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price_10ml' => 'decimal:2',
        'price_30ml' => 'decimal:2',
        'stock' => 'integer',
    ];

    /**
     * Scope a query to only include products in stock.
     */
    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    /**
     * Scope a query to filter by gender.
     */
    public function scopeGender($query, $gender)
    {
        return $query->where('gender', $gender);
    }
}