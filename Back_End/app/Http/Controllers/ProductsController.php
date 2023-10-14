<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index(Request $request){
        $products = DB::table('products')->get();
        $products = Products::all();
        return view('product.index', compact('products'));
    }
    public function addProduct(Request $request){
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $params['image'] = uploadFile("hinh", $request->file('image'));

            }
            $product = Products::create($params);
            if($product->id){
                Session::flash('success', " Thêm mới sản phẩm thành công");
                return redirect()->route('route_add_product');
            }
        }
        return view('product.add');
    }
}
