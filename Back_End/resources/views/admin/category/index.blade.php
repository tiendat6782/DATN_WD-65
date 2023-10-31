@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary "><i class="fa-solid fa-plus"></i></a>
        </th>
        </thead>
        @isset($categories)
            @if (count($categories) > 0)
                @foreach ($categories as $categories)
                    <tr>
                        <td>{{ $categories->id }}</td>
                        <td>{{ $categories->name }}</td>
                        <td class="fs-3">
                            <a href="{{ route('admin.categories.edit', ['id' => $categories->id]) }}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return confirm('Bạn có muốn loại này không?')" href="{{ route('admin.categories.destroy', ['id' => $categories->id]) }}" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @else
            @endif
        @endisset
    </table>
@endsection
