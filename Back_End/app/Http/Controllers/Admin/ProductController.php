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
        $title = "Product";
        return  view('admin.product.index', compact('products', 'title'));
    }
    // ProductController.php



    public function create()
    {
        $categories = Category::all();
        $title = "New Product";
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.product.create', compact(['categories', 'sizes', 'colors', 'title']));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'price' => 'required|numeric',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id', // Kiểm tra xem category_id có tồn tại trong bảng categories hay không
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra và xác thực tệp hình ảnh (ví dụ: JPEG, PNG) và giới hạn kích thước tệp là 2MB (2048 KB)
            ],
            [
                'name.required' => 'Not empty. Please enter name',
                'price.required' => 'Not empty. Please enter price',
                'price.numeric' => 'Please enter price is number',
                'description.required' => 'Not empty. Please enter description',
                'image.required' => 'Not empty. Please enter image',
                'image.image' => 'Only enter file image',
                'image.mimes' => 'Only enter jpeg, png, jpg, gif',
                'image.max' => 'Image < 2Mb',
            ]
        );

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
            ]
        );
        return redirect()->route('admin.products.index')->with(['msg' => 'Sucessfully']);
    }
    public function edit($id)
    {
        $title = "Update Product";
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        $products = Product::find($id);
        return view('admin.product.update', compact('products', 'sizes', 'colors', 'categories', 'title'));
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
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required|numeric',
                'description' => 'required',
                'category_id' => 'required|exists:categories,id', // Kiểm tra xem category_id có tồn tại trong bảng categories hay không
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra và xác thực tệp hình ảnh (ví dụ: JPEG, PNG) và giới hạn kích thước tệp là 2MB (2048 KB)
            ],
            [
                'name.required' => 'Not empty. Please enter name',
                'price.required' => 'Not empty. Please enter price',
                'price.numeric' => 'Please enter price is number',
                'description.required' => 'Not empty. Please enter description',
                'image.required' => 'Not empty. Please enter image',
                'image.image' => 'Only enter file image',
                'image.mimes' => 'Only enter jpeg, png, jpg, gif',
                'image.max' => 'Image < 2Mb',
            ]
        );
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
            return redirect()->route('admin.products.index')->with(['msg' => 'Deleted Successfully']);
        }
    }
}
