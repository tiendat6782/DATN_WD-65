@extends('admin.layouts.layout')

@section('contain')
<div>
    <h2>Category List</h2>
</div>
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
                    @php $i = 1 @endphp

                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->name }}</td>
                        <td class="fs-3">
                            <a href="{{ route('admin.categories.edit', ['id' => $item->id]) }}" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return confirm('Bạn có muốn loại này không?')" href="{{ route('admin.categories.destroy', ['id' => $item->id]) }}" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @php $i++ @endphp

                @endforeach
            @else
            @endif
        @endisset
    </table>
    <div class="text-center d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
@endsection
