<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = DB::table('categories')->get();
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
    public function addCategory(Request $request){  
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $category = Category::create($params);
            if($category->id){
                Session::flash('success', "Thêm category thành công");
                return redirect()->route('route_add_category');
            }
        }
        return view('category.add');
    }
    public function deleteCategory($id){
        Category::where('id', $id)->delete();
        Session::flash('success', "Xóa category thành công id: ".$id);
                return redirect()->route('route_index_category');
    }
    public function editCategory(Request $request, $id){
        $category = Category::find($id);
        if($request->isMethod("POST")){
            $result = Category::where('id', $id)->update($request->except('_token'));
            if($result){
                Session::flash('success', "Cập nhật category thành công");
                return redirect()->route('route_edit_category',['id'=>$id]);
            }
        }
        return view('category.edit', compact('category'));
    }
}
