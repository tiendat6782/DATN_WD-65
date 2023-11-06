@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2 ">
        <form action="{{ route('admin.sizes.update',['id' => $size->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="">Name</label>
                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                <input type="text" name="name" id="" class="form-control" value="{{$size->name ?? old('name') }}">
            </div>
            <div class="mt-2">
                <label for="">Description</label>
                @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                <input type="text" name="description" id="" class="form-control" value="{{$size->description ?? old('description') }}">
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
            <div class="fs-3 text-end">
                <a href="{{ route('admin.sizes.index') }}"><i class="fa-solid fa-share me-3 text-warning"></i></a>
                <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')" href="{{ route('admin.sizes.destroy',['id'=>$size->id]) }}" class="text-danger" ><i class="fa-solid fa-trash"></i></a>
            </div>
        </form>
    </div>
@endsection
