@extends('admin.layouts.layout')

@section('contain')

    <div class="container mt-2 ">
        <form action="{{ route('admin.products.update',['id' => $products->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="">Name</label> @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                <input type="text" name="name" id="" class="form-control" value="{{ $products->name }}">
            </div>
            <div class="mt-2">
                <label for="">Price</label>@error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" name="price" id="" class="form-control" value="{{ $products->price }}">
            </div>
            <div class=" mt-2">
                <label for="">Description</label>@error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <textarea name="description" class="form-control"  placeholder="Mô tả sản phẩm">{{ $products->description}}</textarea>
            </div>
            <div class="mt-2">
                <label for="">Image</label>@error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                @if ($products->image)
                <input type="file" name="image" id="" class="form-control" value="{{ $products->image }}">
                @endif
            </div>
            <div class="mt-2">
                <label for="">Category</label>@error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <select name="category_id" id="" class="form-select">
                    <option value="">--Chọn giá trị--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $products->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>    
            <div class="text-center mt-3">
                
            <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>
    <div class="fs-3 text-end">
        <a href="{{ route('admin.products.index') }}"><i class="fa-solid fa-share me-3 text-warning"></i></a>
        <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')" href="{{ route('admin.products.destroy',['id'=>$products->id]) }}" class="text-danger" ><i class="fa-solid fa-trash"></i></a>
    </div>
@endsection
