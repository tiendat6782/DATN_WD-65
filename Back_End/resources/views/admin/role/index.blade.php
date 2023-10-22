@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>
            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Thêm</a>
        </th>
        </thead>
        @isset($roles)
            @if (count($roles) > 0)
                @foreach ($roles as $roles)
                    <tr>
                        <td>{{ $roles->id }}</td>
                        <td>{{ $roles->name }}</td>
                        <td>{{ $roles->description }}</td>
                        <td>
                            <a href="{{ route('admin.roles.edit', ['id' => $roles->id]) }}" class="btn btn-warning">Sửa</a>
                            <a onclick="return confirm('Bạn có muốn loại này không?')" href="{{ route('admin.roles.destroy', ['id' => $roles->id]) }}" class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>
                @endforeach
            @else
            @endif
        @endisset
    </table>
@endsection
