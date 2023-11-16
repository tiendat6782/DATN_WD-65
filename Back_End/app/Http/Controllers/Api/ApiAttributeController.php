<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\Size;

class ApiAttributeController extends Controller
{
    public function getProductVariants($productId)
    {
        // Tìm sản phẩm
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Lấy danh sách kích thước và màu sắc cho sản phẩm
        $sizes = Size::all(); // Thay thế bằng logic lấy kích thước cho sản phẩm cụ thể
        $colors = Color::all(); // Thay thế bằng logic lấy màu sắc cho sản phẩm cụ thể

        // Lấy danh sách biến thể của sản phẩm
        $variants = Attribute::where('product_id', $productId)->get();

        // Chỉ định kích thước và màu sắc cho từng biến thể
        foreach ($variants as $variant) {
            $variant->size = $sizes->find($variant->size_id);
            $variant->color = $colors->find($variant->color_id);
        }

        return response()->json(['variants' => $variants, 'sizes' => $sizes, 'colors' => $colors], 200);
    }
}
