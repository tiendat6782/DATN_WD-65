@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2 ">
        <form action="{{ route('admin.carts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="">User ID</label>
                <select name="user_id" id="" class="form-select">
                    <option value="">--Chọn giá trị--</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <label for="">Product ID</label>
                <select name="product_id" id="" class="form-select">
                    <option value="">--Chọn giá trị--</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <label for="">Số lượng</label>
                <input type="text" name="quantity" id="" class="form-control" value="{{ old('quantity') }}">
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
