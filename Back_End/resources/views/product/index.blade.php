@extends('layout.index')
@section('content')
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Category_Id</th>
            <th>Size_id</th>
            <th>Color_Id</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->price }}</td>
                <td><img src="{{ $p->image?''.Storage::url($p->image):''}}" style="width: 100px" /></td>
                <td>{{ $p->category_id }}</td>
                <td>{{ $p->size_id }}</td>
                <td>{{ $p->color_id }}</td>
                <td>{{ $p->total_quantity }}</td>
                <td>Action</td>
            </tr>
            @endforeach
            
        </tbody>
</table>
@endsection