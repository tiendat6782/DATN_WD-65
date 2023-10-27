<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';

    public function getPro()
    {
        $product = Product::find($this->product_id);
        if ($product) {
            return $product->name;
        } else {
            return "Empty";
        }
    }
    public function getUser()
    {
        $user = User::find($this->user_id);
        if ($user) {
            return $user->name;
        } else {
            return "Empty";
        }
    }


}
