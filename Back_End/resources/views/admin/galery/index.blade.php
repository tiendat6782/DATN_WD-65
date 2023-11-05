@extends('admin.layouts.layout')

@section('contain')
<table class="table">
    <thead>
    <th>ID</th>
    <th>Product </th>
    <th>Thumbnail</th>
    <th>
        <a href="{{ route('admin.galery.create') }}" class="btn btn-primary">Them</a>
    </th>
    </thead>
    @isset($galery)
    @if ($galery->count()>0)
    @foreach ($galery as $galery)
    <tr>
        <td>{{$galery->id}}</td>
        <td>{{$galery->getPro()}}</td>
        <td>
            <img src="{{ asset('storage/'.$galery->thumbnail) }}" width="300px" alt="">
        </td>
        <td>
            <a href="{{ route('admin.galery.edit',['id'=>$galery->id]) }}" class="btn btn-warning" >Sửa</a>
            <a onclick="return confirm('Bạn có muốn xoá trưng bày này không?')" href="{{ route('admin.galery.destroy',['id'=>$galery->id]) }}" class="btn btn-danger" >Xoá</a>

        </td>
    </tr>
    @endforeach
    @else

    @endif
    @endisset
</table>
@endsection
