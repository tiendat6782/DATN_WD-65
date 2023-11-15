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
        // Lấy ra các users có role_id = 1
        $users = User::where('role_id', 1)->orderBy('id', 'desc')->paginate(10);
        $title = "User";
        return view('admin.user.index', compact('users', 'title'));
    }

  
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
        return redirect()->route('admin.users.index')->with(['msg' => 'Update Sucessfully!']);
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
            return redirect()->route('admin.users.index')->with(['msg' => 'Delete Sucessfully']);
        }
    }
}
