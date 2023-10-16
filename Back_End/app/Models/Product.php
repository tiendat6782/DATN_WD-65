<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public function limitDescription()
    {
        return Str::limit($this->description, 30, '...');
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
        $Size = Size::find($this->size_id);
        if ($Size) {
            return $Size->name;
        } else {
            return "Empty";
        }
    }
}
