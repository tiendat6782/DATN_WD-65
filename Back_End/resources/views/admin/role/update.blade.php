@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2 ">
        <form action="{{ route('admin.roles.update',['id' => $roles->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control" value="{{$roles->name ?? old('name') }}">
            </div>
            <div class=" mt-2">
                <label for="">Description</label>
                <textarea name="description" class="form-control"  placeholder="Mô tả vai trò">{{ $roles->description ?? old('description') }}</textarea>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
