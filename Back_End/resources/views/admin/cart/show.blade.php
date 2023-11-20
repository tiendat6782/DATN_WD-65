@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-5">
        <h2>{{ $title }}</h2>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $cart->id }}</td>
            </tr>
            <tr>
                <th>User Name</th>
                <td>{{ $userName }}</td>
            </tr>
            <tr>
                <th>User Address</th>
                <td>{{ $userAddress }}</td>
            </tr>
            <tr>
                <th>User Phone Number</th>
                <td>{{ $userPhoneNumber }}</td>
            </tr>
            <tr>
                <th>Product Name</th>
                <td>{{ $cart->product->name }}</td>
            </tr>
            {{-- Hiển thị giá sản phẩm --}}
            <tr>
                <th>Product Price</th>
                <td>${{ $productPrice }}</td>
            </tr>
            {{-- Hiển thị ảnh sản phẩm --}}
            <tr>
                <th>Product Image</th>
                <td>
                    @if ($cart->product->image)
                        <img src="{{ asset('storage/' . $cart->product->image) }}" alt="{{ $cart->product->name }}" class="img-thumbnail" style="max-width: 200px;">
                    @else
                        No image available
                    @endif
                </td>
            </tr>
            {{-- Hiển thị số lượng sản phẩm và tổng đơn hàng --}}
            <tr>
                <th>Quantity</th>
                <td>{{ $totalQuantity }}</td>
            </tr>
            <tr>
                <th>Total Price</th>
                <td>${{ $totalPrice }}</td>
            </tr>
            {{-- Hiển thị trạng thái đơn hàng --}}
             <tr>
                <th>Status</th>
                <td>{{ $status }}</td>
            </tr>
            {{-- Hiển thị thêm thông tin khác nếu cần --}}
        </table>
    </div>
@endsection
