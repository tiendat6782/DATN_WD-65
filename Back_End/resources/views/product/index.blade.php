@extends('layout.index')
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('route_add_product') }}">Add</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/product') }}">List</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

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
                <td>
                  <button type="button" class="btn btn-danger"><a style="color: white;text-decoration: none" href="{{ route('route_delete_product',['id'=>$p->id]) }}">delete</a></button>
                  <button type="button" class="btn btn-warning"><a style="color: white;text-decoration: none" href="{{ route('route_edit_product',['id'=>$p->id]) }}">edit</a></button>

                </td>
            </tr>
            @endforeach
            
        </tbody>
</table>
@endsection