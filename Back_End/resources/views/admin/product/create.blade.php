@extends('admin.layouts.layout')

@section('contain')
<div>
    <h2>
        Create Product
    </h2>
</div>
    <div class="container mt-2 ">
        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="fs-3">
                <a href="{{ route('admin.products.index') }}"><i class="fa-solid fa-share me-3 text-warning"></i></a>
            </div>
            <div class="row">
                <div class="mt-2 col-sm-4">
                    <label for="">Name</label>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" name="name" id="" class="form-control" value="{{ old('name') }}" placeholder="Enter the product name">
                </div>
                <div class="mt-2 col-sm-4">
                    <label for="">Category</label>
                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <select name="category_id" id="" class="form-select">
                        <option value="">--Chọn giá trị--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-2 col-sm-4">
                    <label for="">Price</label>
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" name="price" id="" class="form-control" value="{{ old('price') }}" placeholder="Enter product price">
                </div>
            </div>
            <div class=" mt-2">
                <label for="">Description</label>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <textarea name="description" class="form-control" value="{{ old('description') }}" placeholder="Product Description"></textarea>
            </div>
            <div class="mt-2">
                <label for="">Image</label>
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage()" class="form-control" >
                <img id="preview" src="" alt="Image Preview"  class="img-thumbnail" style="display:none; max-width: 300px; max-height: 300px;">
            </div>


            <div class="text-center mt-3">
            <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
<script>
    function previewImage() {
        var input = document.getElementById('image');
        var preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.style.display = 'block';
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
