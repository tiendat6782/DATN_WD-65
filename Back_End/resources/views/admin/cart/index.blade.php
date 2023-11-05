@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
        <th>ID</th>
        <th>User ID</th>
        <th>Product ID</th>
        <th>Quantity</th>
        <th>
        </th>
        </thead>
        @isset($carts)
            @if ($carts->count()>0)
            @php $i = 1 @endphp
                @foreach ($carts as $item)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->getUs() }}</td>
                        <td>{{$item->getPro() }}</td>
                        <td>{{$item->quantity}}</td>
                        <td class="fs-3">
                            <a href="" class="text-warning" ><i class="fa-solid fa-eye"></i></a>
                            <a onclick="return confirm('Bạn có muốn xoá đơn hàng này không?')" href="{{ route('admin.carts.destroy',['id'=>$item->id]) }}" class="text-danger" ><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
            @php $i++ @endphp

                @endforeach
            @else

            @endif
        @endisset
    </table>
    <div class="text-center d-flex justify-content-center">
        {{ $carts->links() }}
    </div>
@endsection
