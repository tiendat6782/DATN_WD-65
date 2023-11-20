<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Cart";
        $carts = Cart::with(['product', 'user'])->orderBy('id', 'desc')->paginate(10);

        // Tính tổng giá và số lượng
        $totalQuantity = $carts->sum('quantity');
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->quantity * optional($cart->product)->price; // Tránh lỗi nếu sản phẩm không tồn tại
        });

        return view('admin.cart.index', compact('carts', 'title', 'totalQuantity', 'totalPrice'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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
                "user_id" => 'required',
                "product_id" => 'required',
                "quantity" => 'required|numeric',
            ]
        );


        DB::table('cart')->insert(
            [
                "user_id" => $request->user_id,
                "product_id" => $request->product_id,
                "quantity" => $request->quantity,
            ]
        );
        return redirect()->route('admin.carts.index')->with(['msg' => 'Sucessfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::with(['product', 'user', 'order'])->findOrFail($id);

        // Tính tổng giá và số lượng
        $totalQuantity = $cart->quantity;
        $totalPrice = $cart->quantity * optional($cart->product)->price;

        // Thông tin khách hàng
        $userName = $cart->user->name;
        $userAddress = $cart->user->address;
        $userPhoneNumber = $cart->user->phone_number;

        // Thêm giá sản phẩm
        $productPrice = optional($cart->product)->price;

        // Lấy trạng thái đơn hàng từ bảng order
        $status = optional($cart->order)->status;

        $title = "Cart Details";
        return view('admin.cart.show', compact('cart', 'title', 'userName', 'userAddress', 'userPhoneNumber', 'totalQuantity', 'totalPrice', 'productPrice', 'status'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $products = Product::all();
        $carts = DB::table('cart')->where('id', $id)->first();
        return view('admin.cart.update', compact('carts', 'users', 'products'));
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
        DB::table('cart')->where('id', $id)->update([
            "user_id" => $request->user_id,
            "product_id" => $request->product_id,
            "quantity" => $request->quantity,
        ]);
        return redirect()->route('admin.carts.index')->with(['msg' => 'Update Sucessfully']);
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
            DB::table('cart')->where('id', $id)->delete();
            return redirect()->route('admin.carts.index')->with(['msg' => 'Delete Sucessfully']);
        }
    }
}
