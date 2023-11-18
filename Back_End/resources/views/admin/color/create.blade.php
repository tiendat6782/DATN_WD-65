@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2">
        <form action="{{ route('admin.colors.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="fs-3">
                <a href="{{ route('admin.colors.index') }}"><i class="fa-solid fa-share me-3 text-warning"></i></a>
            </div>
            <div class="row">
                <div class="mt-2 col-sm-6">
                <label for="">Name</label>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="mt-2 col-sm-6">
                <label for="">Color_code</label>
                @error('color_code') <span class="text-danger">{{ $message }}</span>@enderror
                <input type="text" name="color_code" id="" class="form-control" value="{{ old('color_code') }}">
            </div></div>
            <div class="mt-2">
                <label for="">Description</label>
                @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                <input type="text" name="description" id="" class="form-control" value="{{ old('description') }}">
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
