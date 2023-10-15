<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
protected $fillable = ['id','name', 'description', 'price', 'image', 'category_id','size_id','color_id'];

}
