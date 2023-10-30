@extends('admin.layouts.layout')

@section('contain')
  <table class="table">
    <tr>
        <th>Name:</th>
        <td>{{ $products->name }}</td>
    </tr>
    <tr>
        <th>Price:</th>
        <td>{{ $products->price }}$</td>
    </tr>
    <tr>
        <th>Description:</th>
        <td>{{ $products->description }}</td>
    </tr>
    <tr>
        <th>Image:</th>
        <td>
            <img src="{{ asset('storage/'.$products->image) }}" alt="{{ $products->image }}" width="500px">
        </td>
    </tr>
    <tr>
        <th>Category:</th>
        <td>{{ $categories->find($products->category_id)->name ?? "Empty" }}</td>
    </tr>
    <tr>
        <th>Color:</th>
        <td>{{ $colors->find($products->color_id)->name ?? "Empty" }}</td>
    </tr>
    <tr>
        <th>Size:</th>
        <td>{{ $sizes->find($products->size_id)->name ?? "Empty" }}</td>
    </tr>
    <tr>
        <th>Total quantity</th>
        <td>{{ $products->total_quantity }}</td>
    </tr>
  </table>
  <div class="text-end fs-3">
        <a href="{{ route('admin.products.index') }}"><i class="fa-solid fa-share me-3"></i></a>
        <a href="{{ route('admin.products.edit',['id'=>$products->id]) }}" class="text-warning me-3"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href="{{ route('admin.products.destroy',['id'=>$products->id]) }}" class="text-danger me-3"><i class="fa-solid fa-trash"></i></a>
  </div>
@endsection