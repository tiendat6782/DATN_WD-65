<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $table = 'attributes';
    public function getName()
    {
        $product = Product::find($this->product_id);
        if ($product) {
            return $product->name;
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
}
