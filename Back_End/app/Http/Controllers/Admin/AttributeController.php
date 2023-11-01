<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    public function index()
    {

        $items = Attribute::orderBy('id', 'desc')->paginate(10);
        $size = Size::all();
        $product = Product::all();
        $color = Color::all();
        $title = "Attribute";
        return view('admin.attribute.index', compact('items', 'size', 'color', 'product', 'title'));
    }
    public function create()
    {
        $size = Size::all();
        $product = Product::all();
        $color = Color::all();
        $title = "Create Attribute";
        return view('admin.attribute.create', compact('size', 'color', 'product', 'title'));
    }
    public function store(Request $request)
    {
        // Kiểm tra và xác thực dữ liệu đầu vào từ request
        $request->validate([
            'product_id' => 'required',
            'size_id' => 'required',
            'color_id' => 'required',
            'quantity' => 'required|numeric', // Bạn có thể thay đổi quy tắc kiểm tra tùy theo yêu cầu
        ]);

        // Tạo một bản ghi mới trong bảng 'attributes'
        $newAttribute = new Attribute;
        $newAttribute->product_id = $request->input('product_id');
        $newAttribute->size_id = $request->input('size_id');
        $newAttribute->color_id = $request->input('color_id');
        $newAttribute->quantity = $request->input('quantity');
        $newAttribute->save();

        return redirect()->route('admin.attribute.index')->with(['msg' => 'Sucessfully']); // Chuyển hướng sau khi lưu sản phẩm thành công
    }
    public function edit($id)
    {
        $title = "Update Attribute";

        $item = Attribute::find($id);
        $size = Size::all();
        $product = Product::all();
        $color = Color::all();
        return view('admin.attribute.update', compact('item', 'size', 'color', 'product', 'title'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'size_id' => 'required',
            'color_id' => 'required',
            'quantity' => 'required|numeric', // Bạn có thể thay đổi quy tắc kiểm tra tùy theo yêu cầu
        ]);
        DB::table('attributes')->where('id', $id)->update([

            "product_id" => $request->product_id,
            "size_id" => $request->size_id,
            "color_id" => $request->color_id,
            "quantity" => $request->quantity,
        ]);
        return redirect()->route('admin.attribute.index')->with(['msg' => 'Update Successfully!']);
    }
    public function destroy($id)
    {
        DB::table('attributes')->where('id', $id)->delete();
        return redirect()->route('admin.attribute.index')->with(['msg' => 'Deleted Successfully']);
    }
}
