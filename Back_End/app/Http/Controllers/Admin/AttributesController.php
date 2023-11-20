<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::all();
        return  view('admin.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.attributes.create', compact(['products', 'sizes','colors']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('attributes')->insert(
            [
                "product_id" => $request->product_id,
                "size_id" => $request->size_id,
                "color_id" => $request->color_id,
                "quantity" => $request->quantity,
            ]
        );
        return redirect()->route('admin.attributes.index')->with(['msg' => 'theem thanh cong']);
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
        $products = Product::all();
        $sizes = Size::all();
        $colors = Color::all();
        $attributes = DB::table('attributes')->where('id', $id)->first();
        return view('admin.attributes.update', compact('attributes','products', 'sizes','colors'));
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
        DB::table('attributes')->insert(
            [
                "product_id" => $request->product_id,
                "size_id" => $request->size_id,
                "color_id" => $request->color_id,
                "quantity" => $request->quantity,
            ]
        );
        return redirect()->route('admin.attributes.index')->with(['msg' => 'Sửa thành công!']);
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
            DB::table('attributes')->where('id', $id)->delete();
            return redirect()->route('admin.attributes.index')->with(['msg' => 'Xoa thanh cong ' . $id]);
        }
    }
}
