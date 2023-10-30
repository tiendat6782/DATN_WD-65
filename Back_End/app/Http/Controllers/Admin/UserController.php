<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return  view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact(['roles']));
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

//        if ($request->hasFile('image')) {
//            $image = uploadFile('hinh', $request->file('image'));
//        }
        if ($request->hasFile('image')) {
            $image = uploadFile('hinh', $request->file('image'));
        }

        DB::table('users')->insert(
            [
                "name" => $request->name,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
                "image" => $image,
                "email_verified_at" => $request->email_verified_at,
                // "password" => $request->password,
            ]
        );
        return redirect()->route('admin.users.index')->with(['msg' => 'theem thanh cong']);
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
        $roles = Role::all();
        $users = DB::table('users')->where('id', $id)->first();
        return view('admin.user.update', compact('users', 'roles'));
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
            $image = DB::table('users')->where('id', $id)->select('image')->first()->image;
            if ($request->hasFile('image')) {
                $resultImg = Storage::delete('/public/' . $image);
                if ($resultImg) {
                    $image = uploadFile('hinh', $request->file('image'));
                }
            }
        }

        DB::table('users')->where('id', $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "image" => $image,
            "phone_number" => $request->phone_number,
            // "password" => $request->category_id,
        ]);
        return redirect()->route('admin.users.index')->with(['msg' => 'Sửa thành công!']);
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
            $image = DB::table('users')
                ->where('id', $id)
                ->select('image')
                ->first()->image;

            Storage::delete('/public/' . $image);
            DB::table('users')->where('id', $id)->delete();
            return redirect()->route('admin.users.index')->with(['msg' => 'Xoa thanh cong ' . $id]);
        }
    }
}
