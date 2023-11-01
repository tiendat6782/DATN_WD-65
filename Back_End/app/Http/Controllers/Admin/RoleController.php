<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return  view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
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


        DB::table('roles')->insert(
            [
                "name" => $request->name,
                "description" => $request->description,
            ]
        );
        return redirect()->route('admin.roles.index')->with(['msg' => 'Sucessfully']);
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
        $roles = DB::table('roles')->where('id', $id)->first();
        return view('admin.role.update', compact('roles'));
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
        DB::table('roles')->where('id', $id)->update([
            "name" => $request->name,
            "description" => $request->description,
        ]);
        return redirect()->route('admin.roles.index')->with(['msg' => 'Update Sucessfully!']);
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
            DB::table('roles')->where('id', $id)->delete();
            return redirect()->route('admin.roles.index')->with(['msg' => 'Delete Sucessfully']);
        }
    }
}
