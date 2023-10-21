<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';

    public function getUs()
    {
        $users = User::find($this->user_id);
        if ($users) {
            return $users->name;
        } else {
            return "Empty";
        }
    }
    public function getPro()
    {
        $products = User::find($this->product_id);
        if ($products) {
            return $products->name;
        } else {
            return "Empty";
        }
    }

}

