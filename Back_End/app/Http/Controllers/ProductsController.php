<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Products;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index(Request $request){
        $products = DB::table('products')->get();
        $categories = DB::table('categories')->get();
        $products = Products::all();
        return view('product.index', compact('products','categories'));
    }
    public function addProduct(Request $request){
        $categories = Category::all();
        $size = Size::all();
        $color = Color::all();
        if($request->isMethod('POST')){
            // $params = $request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $params['image'] = uploadFile("hinh", $request->file('image'));

            }
            
            $product = Products::create($request->except('_token'));
            
            if($product->id){
                Session::flash('success', " Thêm mới sản phẩm thành công");
                return redirect()->route('route_add_product');
            }
        }
        return view('product.add', compact('categories','size','color'));
    }
    public function deleteProduct($id){
        Products::where('id', $id)->delete();
        Session::flash('success', " Xóa thành công sản phẩm id: ".$id);
                return redirect()->route('route_index_product');
    }
    public function editProduct(Request $request, $id){
        $categories = Category::all();
        $product = Products::find($id);
        if($request->isMethod("POST")){
            $params = $request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $resultDelete = Storage::delete('/public/'.$product->image);
                if($resultDelete){
                    $params['image'] = uploadFile('hinh', $request->file('image'));
                }else{
                    $params['image'] = $product->image;
                }
            }
            $result = Products::where('id', $id)->update($params);
            if($result){
                Session::flash('success', " Cập nhật sản phẩm thành công");
                return redirect()->route('route_edit_product',['id'=>$id]);
            }else{
                Session::flash('success', " Cập nhật sản phẩm thaát bại");
            }
        }
        return view('product.edit', compact('product','categories'));
    }
}
