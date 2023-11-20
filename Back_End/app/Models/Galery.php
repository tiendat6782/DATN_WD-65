<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;
    protected $table = 'galery';

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function getPro()
    {
        $product = Product::find($this->product_id);
        if ($product) {
            return $product->name;
        } else {
            return "Empty";
        }
    }
}
