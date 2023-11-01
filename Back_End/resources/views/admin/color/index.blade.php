@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Color Code</th>
        <th>Description</th>
        <th>
            <a href="{{ route('admin.colors.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
        </th>
        </thead>
        @isset($colors)
            @if (count($colors) > 0)
            @php $i = 1 @endphp
                @foreach ($colors as $color)
                    <tr>
                        <td>{{ $i}}</td>
                        <td>{{ $color->name }}</td>
                        <td>{{ $color->color_code }}</td>
                        <td>{{ $color->description }}</td>
                        <td class="fs-3">
                            <a href="{{ route('admin.colors.edit', ['id' => $color->id]) }}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return confirm('Bạn có muốn xoá màu này không?')" href="{{ route('admin.colors.destroy', ['id' => $color->id]) }}" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
            @php $i++  @endphp

                @endforeach
            @else
            @endif
        @endisset
    </table>
    <div class="text-center d-flex justify-content-center">
        {{ $colors->links() }}
    </div>
@endsection
