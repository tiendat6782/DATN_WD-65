@extends('admin.layouts.layout')

@section('contain')
    <div class="container">
        <h2>{{ $title }} List</h2>

        {{-- Hiển thị số lượng và tổng giá --}}
        <p>Total Quantity: {{ $totalQuantity }}</p>


        <table class="table">
            <thead>
            <th>ID</th>
            <th>User ID</th>
            <th>Product ID</th>
            <th>Product Name</th> {{-- Thêm cột tên sản phẩm --}}
            <th>Quantity</th>
            <th>Total Price</th>
            <th>
                Actions
            </th>
            </thead>
            @isset($carts)
                @if ($carts->count() > 0)
                    @php $i = 1 @endphp
                    @foreach ($carts as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->user->id }}</td>
                            <td>{{ $item->product->id }}</td>
                            <td>{{ $item->product->name }}</td> {{-- Truy cập tên sản phẩm qua mối quan hệ --}}
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $totalPrice }}$</td>
                            <td class="fs-3">
                                <a href="{{route('admin.carts.show', ['id' => $item->id])}}" class="text-warning"><i class="fa-solid fa-eye"></i></a>
                                <a
                                    onclick="return confirm('Bạn có muốn xoá đơn hàng này không?')"
                                    href="{{ route('admin.carts.destroy', ['id' => $item->id]) }}"
                                    class="text-danger"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @php $i++ @endphp
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No records found</td>
                    </tr>
                @endif
            @endisset
        </table>
        <div class="text-center d-flex justify-content-center">
            {{ $carts->links() }}
        </div>
    </div>
@endsection
