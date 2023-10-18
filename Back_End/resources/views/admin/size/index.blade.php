@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>
            <a href="{{ route('admin.sizes.create') }}" class="btn btn-primary">Thêm</a>
        </th>
        </thead>
        @isset($sizes)
            @if (count($sizes) > 0)
                @foreach ($sizes as $sizes)
                    <tr>
                        <td>{{ $sizes->id }}</td>
                        <td>{{ $sizes->name }}</td>
                        <td>
                            <a href="{{ route('admin.sizes.edit', ['id' => $sizes->id]) }}" class="btn btn-warning">Sửa</a>
                            <a onclick="return confirm('Bạn có muốn xoá cỡ này không?')" href="{{ route('admin.sizes.destroy', ['id' => $sizes->id]) }}" class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>
                @endforeach
            @else
            @endif
        @endisset
    </table>
@endsection
