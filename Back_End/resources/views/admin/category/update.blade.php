@extends('admin.layouts.layout')

@section('contain')
<div>
    <h2>
        Update Category
    </h2>
</div>
    <div class="container mt-2 ">
        <form action="{{ route('admin.categories.update',['id' => $categories->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="">Name</label>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                <input type="text" name="name" id="" class="form-control" value="{{$categories->name ?? old('name') }}">
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            <div class="fs-3 text-end">
                <a href="{{ route('admin.categories.index') }}"><i class="fa-solid fa-share me-3 text-warning"></i></a>
                <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')" href="{{ route('admin.categories.destroy',['id'=>$categories->id]) }}" class="text-danger" ><i class="fa-solid fa-trash"></i></a>
            </div>
        </form>
    </div>
@endsection
