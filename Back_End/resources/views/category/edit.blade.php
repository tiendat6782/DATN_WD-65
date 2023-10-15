@extends('layout.index')
@section('content')

<form action="{{ route('route_edit_category',['id'=>$category->id]) }}"  method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Nhập tên của danh mục">
    </div>

    <div class="mb-3">  
        <label class="form-label">Description</label>
        <input type="text" class="form-control" name="description" value="{{ $category->description }}" placeholder="Nhập mô tả của danh mục">
    </div>
    

    <button type="submit" class="btn btn-primary">Update Category</button>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

@endsection
