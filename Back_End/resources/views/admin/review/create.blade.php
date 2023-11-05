@extends('admin.layouts.layout')

@section('contain')
<div class="container mt-2 col-xl-8">
    <form action="{{ route('admin.reviews.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mt-2">
            <label for="">Product ID</label>
            <select name="product_id" id="" class="form-select">
                <option value="">--Chọn loại sản phẩm --</option>
                @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-2">
            <label for="">User ID</label>
            <select name="user_id" id="" class="form-select">
                <option value="">--Chọn tên khách hàng --</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-2">
            <label for="">Rating</label>
            <input type="text" name="rating" id="" class="form-control" value="{{ old('rating') }}">
        </div>
        <div class="mt-2">
            <label for="">Comment</label>
            <textarea type="text" name="comment" rows="4" cols="50" id="" class="form-control" value="{{ old('comment') }}"></textarea>
        </div>
        <div class="mt-2">
            <label for="">Date</label>
            <input type="date" name="date" id="" class="form-control" value="{{ old('date') }}">
        </div>
        <div class="text-center mt-3">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection
