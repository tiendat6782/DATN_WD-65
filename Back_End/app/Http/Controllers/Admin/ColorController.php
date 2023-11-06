<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Color;
use App\Models\Product;
use App\Models\Attribute;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Color";
        $colors = Color::orderBy('id', 'desc')->paginate(10);
        return  view('admin.color.index', compact('colors', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Create Color";
        return view('admin.color.create', compact('title'));
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
                "name" => 'required|unique:color',
                "color_code" => 'required',
                "description" => 'required',
            ],
            [
                "name.required" => 'Not Empty. Please enter name color',
                "color_code.required" => 'Not Empty. Please enter color code',
                "description.required" => 'Not Empty. Please enter description',
            ]
        );


        DB::table('color')->insert(
            [
                "name" => $request->name,
                "color_code" => $request->color_code,
                "description" => $request->description,
            ]
        );
        return redirect()->route('admin.colors.index')->with(['msg' => 'Successfully']);
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
        $title = "Update Color";
        $color = DB::table('color')->where('id', $id)->first();
        return view('admin.color.update', compact('color', 'title'));
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
                "name" => 'required|unique:color',
                "color_code" => 'required',
                "description" => 'required',
            ],
            [
                "name.required" => 'Not Empty. Please enter name color',
                "color_code.required" => 'Not Empty. Please enter color code',
                "description.required" => 'Not Empty. Please enter description',
            ]
        );
        DB::table('color')->where('id', $id)->update([
            "name" => $request->name,
            "color_code" => $request->color_code,
            "description" => $request->description,
        ]);
        return redirect()->route('admin.colors.index')->with(['msg' => 'Update Successfully!']);
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
            $product = Product::whereHas('attributes', function ($query) use ($id) {
                $query->where('color_id', $id);
            })->first();

            Attribute::where('color_id', $id)->delete();

            if ($product) {
                $product->total_quantity = $product->attributes()->sum('quantity');
                $product->save();
            }

            // Xóa bản ghi trong bảng 'size'
            DB::table('color')->where('id', $id)->delete();

            return redirect()->route('admin.colors.index')->with(['msg' => 'Delete Successfully']);
        }
    }
}
