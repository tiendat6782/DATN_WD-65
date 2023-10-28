@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2 ">
        <form action="{{ route('admin.roles.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}">
            </div>
            <div class=" mt-2">
                <label for="">Description</label>
                <textarea name="description" class="form-control" value="{{ old('description') }}" placeholder="Mô tả vai trò"></textarea>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
