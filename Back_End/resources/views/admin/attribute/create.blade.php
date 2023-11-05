@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2 ">
        <form action="{{ route('admin.attribute.store') }}" method="post">
            @csrf
           
            <div class="row">
                <div class="mt-2 col-sm-4">
                    <label for="">Product</label>
                    @error('product_id')
                    <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                    <select name="product_id" id="" class="form-select">
                        <option value="">--Chọn giá trị--</option>
                        @foreach ($product as $item)
                            <option value="{{ $item->id }}" {{ old('product_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mt-2 col-sm-4">
                    <label for="">Size</label>
                        @error('size_id')
                    <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                    
                    <select name="size_id" id="" class="form-select">
                        <option value="">--Chọn giá trị--</option>
                        @foreach ($size as $item)
                            <option value="{{ $item->id }}" {{ old('size_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mt-2 col-sm-4">
                    <label for="">Color</label>
                    @error('color_id')
                    <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                    <select name="color_id" id="" class="form-select">
                        <option value="">--Chọn giá trị--</option>
                        @foreach ($color as $item)
                            <option value="{{ $item->id }}" {{ old('color_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>   
            <div class="mt-2">
                <label for="">Số lượng</label>
                    @error('quantity')
                    <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                <input type="text" name="quantity" id="" class="form-control" value="{{ old('total_quantity') }}">
            </div>
            <div class="text-center mt-3">
            <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
