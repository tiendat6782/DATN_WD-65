<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Size";
        $sizes = Size::orderBy('id', 'desc')->paginate(10);
        return  view('admin.size.index', compact('sizes', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Size';
        return view('admin.size.create', compact('title'));
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
                "description" => 'required',
            ],
            [
                "name.required" => 'Not empty. Please enter name',
                "description.required" => 'Not empty. Please enter name',
            ]
        );


        DB::table('size')->insert(
            [
                "name" => $request->name,
                "description" => $request->description,
            ]
        );
        return redirect()->route('admin.sizes.index')->with(['msg' => 'Successfully']);
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
        $title = "Update Size";
        $size = DB::table('size')->where('id', $id)->first();
        return view('admin.size.update', compact('size','title'));
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
                "description" => 'required',
            ],
            [
                "name.required" => 'Not empty. Please enter name',
                "description.required" => 'Not empty. Please enter name',
            ]
        );
        DB::table('size')->where('id', $id)->update([
            "name" => $request->name,
            "description" => $request->description,
        ]);
        return redirect()->route('admin.sizes.index')->with(['msg' => 'Update Successfully!']);
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
            DB::table('size')->where('id', $id)->delete();
            return redirect()->route('admin.sizes.index')->with(['msg' => 'Delete Successfully']);
        }
    }
}
