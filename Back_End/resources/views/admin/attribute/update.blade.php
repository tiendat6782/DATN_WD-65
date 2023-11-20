@extends('admin.layouts.layout')

@section('contain')
<div>
    <h2>Update Attribute</h2>
</div>
    <div class="container mt-2 ">
        <form action="{{ route('admin.attribute.update',['id' => $item->id]) }}" method="post">
            @csrf
            <div class="mt-2 col-sm-4">
                <label for="">Product</label>@error('product_id')
                <span class="text-danger">{{ $message }}</span><br>
                @enderror
                <select name="product_id" id="" class="form-select">
                    <option value="">--Chọn giá trị--</option>
                    @foreach ($product as $productItem)
                        <option value="{{ $productItem->id }}" {{ $item->product_id == $productItem->id ? 'selected' : '' }}>{{ $productItem->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                
                
                
                <div class="mt-2 col-sm-4">
                    <label for="">Size</label>
                    @error('size_id')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
        
                    @foreach ($size as $sizeItem)
                        <div class="form-check">
                            <input type="checkbox" name="size_ids[]" value="{{ $sizeItem->id }}"
                                {{ in_array($sizeItem->id, explode(',', $item->size_id)) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $sizeItem->name }}</label>
                        </div>
                    @endforeach
                </div>
        
                <div class="mt-2 col-sm-4">
                    <label for="">Color</label>
                    @error('color_id')
                        <span class="text-danger">{{ $message }}</span><br>
                    @enderror
        
                    @foreach ($color as $colorItem)
                        <div class="form-check">
                            <input type="checkbox" name="color_ids[]" value="{{ $colorItem->id }}"
                                {{ in_array($colorItem->id, explode(',', $item->color_id)) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $colorItem->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        
            <div class="mt-2">
                <label for="">Số lượng</label>@error('quantity')
                <span class="text-danger">{{ $message }}</span><br>
                @enderror
                <input type="text" name="quantity" id="" class="form-control" value="{{old('quantity') ?? $item->quantity}}">
            </div>
            <div class="text-center mt-3">
            <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            <div class="fs-3 text-end">
                <a href="{{ route('admin.attribute.index') }}"><i class="fa-solid fa-share me-3 text-warning"></i></a>
                <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')" href="{{ route('admin.attribute.destroy',['id'=>$item->id]) }}" class="text-danger" ><i class="fa-solid fa-trash"></i></a>
            </div>
        
        </form>
        
    </div>
@endsection
