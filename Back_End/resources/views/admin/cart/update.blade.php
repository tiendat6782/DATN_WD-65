@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2 col-xl-8">
        <form action="{{ route('admin.carts.update',['id' => $carts->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="">User ID</label>
                <select name="user_id" id="" class="form-select">
                    <option value="">--Chọn giá trị--</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $carts->user == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <label for="">Product ID</label>
                <select name="product_id" id="" class="form-select">
                    <option value="">--Chọn giá trị--</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $carts->product == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <label for="">Số lượng</label>
                <input type="text" name="quantity" id="" class="form-control" value="{{ $users->quantity ?? old('quantity') }}">
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
