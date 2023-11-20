@extends('admin.layouts.layout')

@section('contain')
<div>
    <h2>
        List Product
    </h2>
</div>
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
            @php
                $i = 1
            @endphp
                @foreach ($products as $product)
                    <tr>
                       <td>{{ $i }}</td>
                       <td>{{$product->name}}</td>
                       <td>{{$product->price}} $</td>
                       <td>{{$product->limitDescription()}}</td>
                       <td>
                        <img src="{{ asset('storage/'.$product->image) }}" width="200px" alt="">
                        </td>
                       <td>
                        <a href="{{ route('admin.products.show',['id'=>$product->id]) }}">Chi tiết</a>
                                           
                        <td class="fs-3 ">
                            <a href="{{ route('admin.products.edit',['id'=>$product->id]) }}" class="text-warning" ><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')" href="{{ route('admin.products.destroy',['id'=>$product->id]) }}" class="text-danger" ><i class="fa-solid fa-trash"></i></a>
                        </div>
                       </td>
                    </tr>
                    @php
                        $i++
                    @endphp
                @endforeach
            @else
                    <tr class="text-danger text-center">
                        <td>No Data</td>
                    </tr>
            @endif
        @endisset
    </table >
    <div class="text-center d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection
