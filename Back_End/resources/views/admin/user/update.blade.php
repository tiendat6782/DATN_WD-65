@extends('admin.layouts.layout')

@section('contain')

    <div class="container mt-2 ">
        <form action="{{ route('admin.users.update',['id' => $users->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control" value="{{$users->name ?? old('name') }}">
            </div>
            <div class="mt-2">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control" value="{{$users->email ?? old('email') }}">
            </div>
            <div class="mt-2">
                <label for="">Phone number</label>
                <input type="tel" name="phone_number" id="" class="form-control" value="{{$users->phone_number ?? old('phone_number') }}">
            </div>
            <div class="mt-2">
                <label for="">Image</label>
                @if ($users->image)
                <input type="file" name="image" id="" class="form-control" value="{{ $users->image }}">
                @endif
            </div>
            {{-- <div class="mt-2">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control" value="{{$users->password ?? old('password') }}">
            </div> --}}



            {{-- <div class="mt-2">
                <label for="">Số lượng</label>
                <input type="text" name="total_quantity" id="" class="form-control" value="{{ old('total_quantity') }}">
            </div> --}}
            <div class="text-center mt-3">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
