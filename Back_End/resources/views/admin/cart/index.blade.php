@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
        <th>ID</th>
        <th>User ID</th>
        <th>Product ID</th>
        <th>Quantity</th>
        <th>
            <a href="{{ route('admin.carts.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
        </th>
        </thead>
        @isset($carts)
            @if ($carts->count()>0)
                @foreach ($carts as $carts)
                    <tr>
                        <td>{{$carts->id}}</td>
                        <td>{{$carts->getUs() }}</td>
                        <td>{{$carts->getPro() }}</td>
                        <td>{{$carts->quantity}}</td>
                        <td class="fs-3">
                            <a href="{{ route('admin.carts.edit',['id'=>$carts->id]) }}" class="text-warning" ><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return confirm('Bạn có muốn xoá đơn hàng này không?')" href="{{ route('admin.carts.destroy',['id'=>$carts->id]) }}" class="text-danger" ><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                @endforeach
            @else

            @endif
        @endisset
    </table>
@endsection
