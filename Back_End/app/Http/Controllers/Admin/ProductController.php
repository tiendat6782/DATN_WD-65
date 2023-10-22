<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $tille = "Product";
        return  view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.product.create', compact(['categories', 'sizes', 'colors']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('admin.products.index')->with(['msg' => 'theem thanh cong']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        $products = DB::table('products')->where('id', $id)->first();
        return view('admin.product.update', compact('products', 'sizes', 'colors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('admin.products.index')->with(['msg' => 'Sửa thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id) {
            $image = DB::table('products')
                ->where('id', $id)
                ->select('image')
                ->first()->image;

            Storage::delete('/public/' . $image);
            DB::table('products')->where('id', $id)->delete();
            return redirect()->route('admin.products.index')->with(['msg' => 'Xoa thanh cong ' . $id]);
        }
    }
}
