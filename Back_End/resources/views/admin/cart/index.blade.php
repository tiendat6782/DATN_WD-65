@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
        <th>ID</th>
        <th>User ID</th>
        <th>Product ID</th>
        <th>Quantity</th>
        <th>
            <a href="{{ route('admin.carts.create') }}" class="btn btn-primary">Them</a>
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
                        <td>
                            <a href="{{ route('admin.carts.edit',['id'=>$carts->id]) }}" class="btn btn-warning" >Sửa</a>
                            <a onclick="return confirm('Bạn có muốn xoá đơn hàng này không?')" href="{{ route('admin.carts.destroy',['id'=>$carts->id]) }}" class="btn btn-danger" >Xoá</a>

                        </td>
                    </tr>
                @endforeach
            @else

            @endif
        @endisset
    </table>
@endsection
