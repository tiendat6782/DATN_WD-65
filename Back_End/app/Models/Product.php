<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public function limitDescription()
    {
        return Str::limit($this->description, 30, '...');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function getCate()
    {
        $category = Category::find($this->category_id);
        if ($category) {
            return $category->name;
        } else {
            return "Empty";
        }
    }
    public function getColor()
    {
        $color = Color::find($this->color_id);
        if ($color) {
            return $color->name;
        } else {
            return "Empty";
        }
    }
    public function getSize()
    {
        $size = Size::find($this->size_id);
        if ($size) {
            return $size->name;
        } else {
            return "Empty";
        }
    }
    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'product_id');
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            $totalQuantity = $product->attributes()->sum('quantity');
            $product->total_quantity = $totalQuantity;
        });
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
