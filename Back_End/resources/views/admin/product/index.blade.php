@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>...</th>    
            <th>
                <div class="text-center">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                </div>            
            </th>
        </thead>
        @isset($products)
            @if ($products->count()>0)
                @foreach ($products as $product)
                    <tr>
                       <td>{{$product->id}}</td>
                       <td>{{$product->name}}</td>
                       <td>{{$product->price}} $</td>
                       <td>{{$product->limitDescription()}}</td>
                       <td>
                        <img src="{{ asset('storage/'.$product->image) }}" width="200px" alt="">
                        </td>
                       <td>
                        <a href="{{ route('admin.products.show',['id'=>$product->id]) }}">Chi tiết</a>
                       </td>
                       
                       <td>                      
                        <div class="text-center">
                            <a href="{{ route('admin.products.edit',['id'=>$product->id]) }}" class="text-warning" ><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')" href="{{ route('admin.products.destroy',['id'=>$product->id]) }}" class="text-danger" ><i class="fa-solid fa-trash"></i></a>
                        </div>
                       </td>
                    </tr>
                @endforeach
            @else

            @endif
        @endisset
    </table>
@endsection
