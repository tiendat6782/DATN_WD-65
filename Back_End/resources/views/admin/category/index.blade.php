@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Thêm</a>
        </th>
        </thead>
        @isset($categories)
            @if (count($categories) > 0)
                @foreach ($categories as $categories)
                    <tr>
                        <td>{{ $categories->id }}</td>
                        <td>{{ $categories->name }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', ['id' => $categories->id]) }}" class="btn btn-warning">Sửa</a>
                            <a onclick="return confirm('Bạn có muốn loại này không?')" href="{{ route('admin.categories.destroy', ['id' => $categories->id]) }}" class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>
                @endforeach
            @else
            @endif
        @endisset
    </table>
@endsection
