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
        </form>
    </div>
@endsection
