<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Galery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    public function index()
    {
        $galery = Galery::orderBy('id', 'desc')->paginate(10);
        $title = "Galery";
        return  view('admin.galery.index', compact('galery', 'title'));
    }
    public function create()
    {
        $products = Product::all();
        $title = "New Galery";
        return view('admin.galery.create', compact('products','title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Kiểm tra xem product_id có tồn tại trong bảng products hay không
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra và xác thực tệp hình ảnh (ví dụ: JPEG, PNG) và giới hạn kích thước tệp là 2MB (2048 KB)
        ], [
            'product_id.required' => 'Not empty. Please select a product',
            'product_id.exists' => 'The selected product does not exist',
            'thumbnail.required' => 'Not empty. Please select an image',
            'thumbnail.image' => 'Only enter image files',
            'thumbnail.mimes' => 'Only enter jpeg, png, jpg, gif',
            'thumbnail.max' => 'Image size should be less than 2MB',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = uploadFile('thumbnail', $request->file('thumbnail'));
        }

        DB::table('galery')->insert([
            'product_id' => $request->product_id,
            'thumbnail' => $thumbnail,
        ]);

        return redirect()->route('admin.products.show', $request->product_id)->with(['msg' => 'Successfully added to galery']);
    }

    public function edit($id)
    {
        $title = "Update Galery";
        $galery = Galery::find($id);
        return view('admin.galery.update', compact('galery', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'thumbnail.image' => 'Only enter image files',
            'thumbnail.mimes' => 'Only enter jpeg, png, jpg, gif',
            'thumbnail.max' => 'Image size should be less than 2MB',
        ]);

        $galery = Galery::find($id);

        if (!$galery) {
            return redirect()->back()->with(['error' => 'Gallery not found']);
        }

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');

            // Kiểm tra và lưu tệp tin
            if ($thumbnail->isValid()) {
                $thumbnailPath = $thumbnail->store('thumbnails', 'public');
                $galery->thumbnail = $thumbnailPath;

                // Xóa tệp tin cũ
                Storage::delete('/public/' . $galery->thumbnail);
            }
        }

        $galery->save();
        $products = Product::all();

        return redirect()->route('admin.products.show',compact('products'), ['product' => $galery->product_id])->with(['msg' => 'Gallery updated successfully']);
    }


    public function destroy($id)
    {
        $galery = Galery::find($id);

        if ($galery) {
            Storage::delete('/public/' . $galery->thumbnail);
            $galery->delete();
            return redirect()->route('admin.products.show', $galery->product_id)->with(['msg' => 'Galery deleted successfully']);
        }
    }
}
