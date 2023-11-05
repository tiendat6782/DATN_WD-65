<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return  view('admin.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $users = User::all();
        return view('admin.review.create', compact(['products', 'users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->input('date');

        DB::table('review')->insert([
            "product_id" => $request->product_id,
            "user_id" => $request->user_id,
            "rating" => $request->rating,
            "comment" => $request->comment,
            "date" => $date
        ]);

        return redirect()->route('admin.review.index')->with(['msg' => 'Thêm thành công']);
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
        $users = User::all();
        $reviews = DB::table('review')->where('id', $id)->first();
        return view('admin.review.update', compact('reviews','products', 'users',));
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
        $date = $request->input('date');
        DB::table('review')
            ->where('id', $id)
            ->update([
                "product_id" => $request->product_id,
                "user_id" => $request->user_id,
                "rating" => $request->rating,
                "comment" => $request->comment,
                "date" => $date
            ]);

        return redirect()->route('admin.review.index')->with(['msg' => 'Sửa thành công!']);
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
            $image = DB::table('review')
                ->where('id', $id);
            DB::table('review')->where('id', $id)->delete();
            return redirect()->route('admin.review.index')->with(['msg' => 'Xoa thanh cong ' . $id]);
        }
    }
}
