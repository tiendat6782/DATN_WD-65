@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2 ">
        <form action="{{ route('admin.products.update',['id' => $products->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control" value="{{ $products->name ?? old('name') }}">
            </div>
            <div class="mt-2">
                <label for="">Price</label>
                <input type="text" name="price" id="" class="form-control" value="{{ $products->price ?? old('price') }}">
            </div>
            <div class=" mt-2">
                <label for="">Description</label>
                <textarea name="description" class="form-control"  placeholder="Mô tả sản phẩm">{{ $products->description ?? old('description') }}</textarea>
            </div>
            <div class="mt-2">
                <label for="">Image</label>
                @if ($products->image)
                <input type="file" name="image" id="" class="form-control" value="{{ $products->image }}">
                @endif
            </div>
            <div class="mt-2">
                <label for="">Category</label>
                <select name="category_id" id="" class="form-select">
                    <option value="">--Chọn giá trị--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $products->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mt-2">
                <label for="">Size</label>
                <select name="size_id" id="" class="form-select">
                    <option value="">--Chọn giá trị--</option>
                    @foreach ($sizes as $size)
                        <option value="{{ $size->id }}" {{ $products->size_id == $size->id ? 'selected' : '' }}>
                            {{ $size->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            
            
            <div class="mt-2">
                <label for="">Color</label>
                <select name="color_id" id="" class="form-select">
                    <option value="">--Chọn giá trị--</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}" {{ $products->color_id == $color->id ? 'selected' : '' }}>
                            {{ $color->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
           
            
            <div class="mt-2">
                <label for="">Số lượng</label>
                <input type="text" name="total_quantity" id="" class="form-control" value="{{ $products->total_quantity ?? old('total_quantity') }}">
            </div>
            <div class="text-center mt-3">
            <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
