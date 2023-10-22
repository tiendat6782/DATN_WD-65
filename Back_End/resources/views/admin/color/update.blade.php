@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2 col-xl-8">
        <form action="{{ route('admin.colors.update',['id' => $color->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control" value="{{$color->name ?? old('name') }}">
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
