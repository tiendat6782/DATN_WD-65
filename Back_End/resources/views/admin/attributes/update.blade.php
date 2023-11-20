@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2 col-xl-8">
        <form action="{{ route('admin.attributes.update',['id' => $attributes->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="">Product ID</label>
                <select name="product_id" id="" class="form-select">
                    <option value="">--Chọn mã sản phẩm --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $attributes->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <label for="">Size ID</label>
                <select name="size_id" id="" class="form-select">
                    <option value="">--Chọn mã kích cỡ --</option>
                    @foreach ($sizes as $size)
                        <option value="{{ $size->id }}" {{$attributes->size_id == $size->id? 'selected' : '' }}>{{ $size->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <label for="">Color ID</label>
                <select name="color_id" id="" class="form-select">
                    <option value="">--Chọn mã màu --</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}" {{$attributes->color_id == $color->id? 'selected' : '' }}>{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <label for="">Quantity</label>
                <input type="number" name="quantity" id="" class="form-control" value="{{ $attributes->name ?? old('quantity') }}">
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
