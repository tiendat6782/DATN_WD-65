<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = DB::table('categories')->get();
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
}
