@extends('admin.layouts.layout')

@section('contain')
    <div class="container mt-2 ">
        <form action="{{ route('admin.galery.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mt-2 col-sm-4">
                    <label for="">Product</label>
                    @error('product_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <select name="product_id" id="" class="form-select">
                        <option value="">--Chọn sản phẩm--</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-2">
                <label for="">Thmbnail</label>
                @error('thumbnail')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="file" id="thumbnail" name="thumbnail" accept="image/*" onchange="previewThumbnail()" class="form-control" >
                <img id="preview" src="" alt="Thumnail Preview"  class="img-thumbnail" style="display:none; max-width: 600px; max-height: 450px;">
            </div>

            <div class="text-center mt-3">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
<script>
    function previewThumbnail() {
        var input = document.getElementById('thumbnail');
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
