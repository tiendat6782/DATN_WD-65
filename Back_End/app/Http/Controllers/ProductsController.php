<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(Request $request){
        $products = DB::table('products')->get();
        $products = Products::all();
        return view('product.index', compact('products'));
    }
}
