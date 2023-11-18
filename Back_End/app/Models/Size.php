<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'size';
    protected $fillable = ['name', 'description'];
    public static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            $totalQuantity = $product->attributes()->sum('quantity');
            $product->total_quantity = $totalQuantity;
        });
    }
}
