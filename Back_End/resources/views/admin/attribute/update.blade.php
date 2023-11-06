@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2 ">
        <form action="{{ route('admin.attribute.update',['id' => $item->id]) }}" method="post">
            @csrf
           
            <div class="row">
                <div class="mt-2 col-sm-4">
                    <label for="">Product</label>
                    <select name="product_id" id="" class="form-select">
                        <option value="">--Chọn giá trị--</option>
                        @foreach ($product as $productItem)
                            <option value="{{ $productItem->id }}" {{ $item->product_id == $productItem->id ? 'selected' : '' }}>{{ $productItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mt-2 col-sm-4">
                    <label for="">Size</label>
                    <select name="size_id" id="" class="form-select">
                        <option value="">--Chọn giá trị--</option>
                        @foreach ($size as $sizeItem)
                            <option value="{{ $sizeItem->id }}" {{ $item->size_id == $sizeItem->id ? 'selected' : '' }}>
                                {{ $sizeItem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mt-2 col-sm-4">
                    <label for="">Color</label>
                    <select name="color_id" id="" class="form-select">
                        <option value="">--Chọn giá trị--</option>
                        @foreach ($color as $colorItem)
                            <option value="{{ $colorItem->id }}" {{ $item->color_id == $colorItem->id ? 'selected' : '' }}>
                                {{ $colorItem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
             
            <div class="mt-2">
                <label for="">Số lượng</label>
                <input type="text" name="quantity" id="" class="form-control" value="{{$item->quantity ?? old('quantity') }}">
            </div>
            <div class="text-center mt-3">
            <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
