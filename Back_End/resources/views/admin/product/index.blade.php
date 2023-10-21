@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Category_id</th>
            <th>Size_id</th>
            <th>Color_id</th>
            <th>Total_quantity</th>
            <th>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Them</a>
            </th>
        </thead>
        @isset($products)
            @if ($products->count()>0)
                @foreach ($products as $product)
                    <tr>
                       <td>{{$product->id}}</td>
                       <td>{{$product->name}}</td>
                       <td>{{$product->price}}</td>
                       <td>{{$product->limitDescription()}}</td>
                       <td>
                        <img src="{{ asset('storage/'.$product->image) }}" width="100px" alt="">
                        </td>
                       <td>{{$product->getCate() }}</td>
                       <td>{{$product->getSize()}}</td>
                       <td>{{$product->getColor()}}</td>
                       <td>{{$product->total_quantity}}</td>
                       <td>
                        <a href="{{ route('admin.products.edit',['id'=>$product->id]) }}" class="btn btn-warning" >Sửa</a>
                        <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')" href="{{ route('admin.products.destroy',['id'=>$product->id]) }}" class="btn btn-danger" >Xoá</a>

                       </td>
                    </tr>
                @endforeach
            @else

            @endif
        @endisset
    </table>
@endsection
