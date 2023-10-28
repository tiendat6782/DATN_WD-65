@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Product ID</th>
        <th>Size ID</th>
        <th>Color ID</th>
        <th>Quantity</th>
        <th>
            <a href="{{ route('admin.attributes.create') }}" class="btn btn-primary">Them</a>
        </th>
        </thead>
        @isset($attributes)
            @if ($attributes->count()>0)
                @foreach ($attributes as $attribute)
                    <tr>
                        <td>{{$attribute->id}}</td>
                        <td>{{$attribute->getPro()}}</td>
                        <td>{{$attribute->getSize() }}</td>
                        <td>{{$attribute->getCol() }}</td>
                        <td>{{$attribute->quantity}}</td>
                        <td>
                            <a href="{{ route('admin.attributes.edit',['id'=>$attribute->id]) }}" class="btn btn-warning" >Sửa</a>
                            <a onclick="return confirm('Bạn có muốn xoá bình luận này không?')" href="{{ route('admin.attributes.destroy',['id'=>$attribute->id]) }}" class="btn btn-danger" >Xoá</a>

                        </td>
                    </tr>
                @endforeach
            @else

            @endif
        @endisset
    </table>
@endsection
