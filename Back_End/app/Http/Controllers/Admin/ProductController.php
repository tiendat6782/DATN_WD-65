<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        $tille = "Product";
        return  view('admin.product.index', compact('products', 'tille'));
    }
    public function create()
    {
        $categories = Category::all();
        $tille = "New Product";
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.product.create', compact(['categories', 'sizes', 'colors', 'tille']));
    }
    public function store(Request $request)
    {
        // $request->validate();

        if ($request->hasFile('image')) {
            $image = uploadFile('hinh', $request->file('image'));
        }

        DB::table('products')->insert(
            [
                "name" => $request->name,
                "price" => $request->price,
                "description" => $request->description,
                "image" => $image,
                "category_id" => $request->category_id,
                "size_id" => $request->size_id,
                "color_id" => $request->size_id,
                "total_quantity" => $request->total_quantity,
            ]
        );
        return redirect()->route('admin.products.index')->with(['msg' => 'More Success']);
    }
    public function edit($id)
    {
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        $products = Product::find($id);
        return view('admin.product.update', compact('products', 'sizes', 'colors', 'categories'));
    }
    public function show($id)
    {
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        $products = DB::table('products')->where('id', $id)->first();
        return view('admin.product.show', compact('products', 'sizes', 'colors', 'categories'));
    }
    public function update(Request $request, $id)
    {
        if ($id) {
            $image = DB::table('products')->where('id', $id)->select('image')->first()->image;
            if ($request->hasFile('image')) {
                $resultImg = Storage::delete('/public/' . $image);
                if ($resultImg) {
                    $image = uploadFile('hinh', $request->file('image'));
                }
            }
        }
        DB::table('products')->where('id', $id)->update([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
            "image" => $image,
            "category_id" => $request->category_id,
            "size_id" => $request->size_id,
            "color_id" => $request->size_id,
            "total_quantity" => $request->total_quantity,
        ]);
        return redirect()->route('admin.products.index')->with(['msg' => 'Update Successfully!']);
    }
    public function destroy($id)
    {
        if ($id) {
            $image = DB::table('products')
                ->where('id', $id)
                ->select('image')
                ->first()->image;

            Storage::delete('/public/' . $image);
            DB::table('products')->where('id', $id)->delete();
            return redirect()->route('admin.products.index')->with(['msg' => 'Deleted Successfully' . $id]);
        }
    }
}
