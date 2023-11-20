@extends('admin.layouts.layout')

@section('contain')
<div>
    <h2>
        List Size
    </h2>
</div>
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>
            <a href="{{ route('admin.sizes.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
        </th>
        </thead>
        @isset($sizes)
            @if (count($sizes) > 0)
            @php $i = 1 @endphp
                @foreach ($sizes as $size)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $size->name }}</td>
                        <td>{{ $size->description }}</td>
                        <td class="fs-3">
                            <a href="{{ route('admin.sizes.edit', ['id' => $size->id]) }}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return confirm('Bạn có muốn xoá cỡ này không?')" href="{{ route('admin.sizes.destroy', ['id' => $size->id]) }}" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @php $i++ @endphp

                @endforeach
            @else
            @endif
        @endisset
    </table>
    <div class="text-center d-flex justify-content-center">
        {{ $sizes->links() }}
    </div>
@endsection
