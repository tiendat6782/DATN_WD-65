@extends('admin.layouts.layout')

@section('contain')
<div class="fs-3">
    
</div>
<div>
    <h2><a href="{{ route('admin.attribute.index') }}"><i class="fa-solid fa-house text-warning"></i></a> Create Attribute</h2>
</div>
<style>
    .checkbox-group {
        display: flex;
        flex-wrap: wrap;
    }

    .checkbox-label {
        margin-right: 15px;
    }
</style>

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
                    <div class="checkbox-group">
                        @foreach ($size as $item)
                            <label class="checkbox-label">
                                <input type="checkbox" name="size_id" class="size-checkbox" value="{{ $item->id }}" {{ old('size_id') == $item->id ? 'checked' : '' }}>
                                {{ $item->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
        
                <div class="mt-2 col-sm-4">
                    <label for="">Color</label>
                    @error('color_id')
                    <span class="text-danger">{{ $message }}</span><br>
                    @enderror
                    <div class="checkbox-group">
                        @foreach ($color as $item)
                            <label class="checkbox-label">
                                <input type="checkbox" name="color_id" class="color-checkbox" value="{{ $item->id }}" {{ old('color_id') == $item->id ? 'checked' : '' }}>
                                {{ $item->name }}
                            </label>
                        @endforeach
                    </div>
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
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const sizeCheckboxes = document.querySelectorAll('.size-checkbox');
                    const colorCheckboxes = document.querySelectorAll('.color-checkbox');
        
                    sizeCheckboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', function () {
                            if (this.checked) {
                                sizeCheckboxes.forEach(otherCheckbox => {
                                    if (otherCheckbox !== this) {
                                        otherCheckbox.checked = false;
                                    }
                                });
                            }
                        });
                    });
        
                    colorCheckboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', function () {
                            if (this.checked) {
                                colorCheckboxes.forEach(otherCheckbox => {
                                    if (otherCheckbox !== this) {
                                        otherCheckbox.checked = false;
                                    }
                                });
                            }
                        });
                    });
                });
            </script>
        </form>
        
        
        
    </div>
@endsection
