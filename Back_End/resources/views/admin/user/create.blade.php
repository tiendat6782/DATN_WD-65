@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2 ">
        <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="mt-2">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="mt-2">
                <label for="">Phone number</label>
                <input type="tel" name="phone_number" id="" class="form-control" value="{{ old('phone_number') }}">
            </div>
            <div class="mt-2">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control" value="{{ old('password') }}">
            </div>

            <div class="text-center mt-3">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
