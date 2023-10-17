@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>
            <a href="{{ route('admin.colors.create') }}" class="btn btn-primary">Thêm</a>
        </th>
        </thead>
        @isset($colors)
            @if (count($colors) > 0)
                @foreach ($colors as $color)
                    <tr>
                        <td>{{ $color->id }}</td>
                        <td>{{ $color->name }}</td>
                        <td>
                            <a href="{{ route('admin.colors.edit', ['id' => $color->id]) }}" class="btn btn-warning">Sửa</a>
                            <a onclick="return confirm('Bạn có muốn xoá màu này không?')" href="{{ route('admin.colors.destroy', ['id' => $color->id]) }}" class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>
                @endforeach
            @else
            @endif
        @endisset
    </table>
@endsection