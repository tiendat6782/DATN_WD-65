@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2 col-xl-8">
        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="mt-2">
                <label for="">Price</label>
                <input type="text" name="price" id="" class="form-control" value="{{ old('price') }}">
            </div>
            <div class=" mt-2">
                <label for="">Description</label>
                <textarea name="description" class="form-control" value="{{ old('description') }}" placeholder="Mô tả sản phẩm"></textarea>
            </div>
            <div class="mt-2">
                <label for="">Image</label>
                <input type="file" name="image" id="" class="form-control" value="{{ old('image') }}">
            </div>
            <div class="mt-2">
                <label for="">Category</label>
                <select name="category_id" id="" class="form-select">
                    <option value="">--Chọn giá trị--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mt-2">
                <label for="">Size</label>
                <select name="size_id" id="" class="form-select">
                    <option value="">--Chọn giá trị--</option>
                    @foreach ($sizes as $size)
                        <option value="{{ $size->id }}" {{ old('size_id') == $size->id ? 'selected' : '' }}>{{ $size->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mt-2">
                <label for="">Color</label>
                <select name="color_id" id="" class="form-select">
                    <option value="">--Chọn giá trị--</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}" {{ old('color_id') == $color->id ? 'selected' : '' }}>{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>
            
           
            
            <div class="mt-2">
                <label for="">Số lượng</label>
                <input type="text" name="total_quantity" id="" class="form-control" value="{{ old('total_quantity') }}">
            </div>
            <div class="text-center mt-3">
            <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection