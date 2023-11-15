<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        $title = "Category";
        return  view('admin.category.index', compact('categories', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Category";
        return view('admin.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "name" => 'required',
            ],
            [
                "name.required" => "Not empty. Please enter name"
            ]
        );


        DB::table('categories')->insert(
            [
                "name" => $request->name,
            ]
        );
        return redirect()->route('admin.categories.index')->with(['msg' => 'Sucessfully']);
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
        $title = "Update title";
        $categories = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.update', compact('categories', 'title'));
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
        $request->validate(
            [
                "name" => 'required',
            ],
            [
                "name.required" => "Not empty. Please enter name"
            ]
        );
        DB::table('categories')->where('id', $id)->update([
            "name" => $request->name,
        ]);
        return redirect()->route('admin.categories.index')->with(['msg' => 'Update Sucessfully!']);
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
            // Kiểm tra xem 'size_id' có tồn tại trong bảng 'attributes' hay không
            $exists = Product::where('category_id', $id)->exists();

            if ($exists) {
                return redirect()->back()->with(['msg' => 'Category is associated with product. Cannot delete.']);
            }

            // Xóa tất cả các bản ghi có 'size_id' tương ứng trong bảng 'attributes'
            DB::table('categories')->where('id', $id)->delete();

            return redirect()->back()->with(['msg' => 'Delete Successfully']);
        }
    }
}
