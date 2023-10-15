@extends('layout.index')
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('route_add_category') }}">Add</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/category') }}">List</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ $c->description }}</td>
            <td>
                <button type="button" class="btn btn-danger"><a style="color: white;text-decoration: none" href="{{ route('route_delete_category',['id'=>$c->id]) }}">delete</a></button>
                  <button type="button" class="btn btn-warning"><a style="color: white;text-decoration: none" href="{{ route('route_edit_category',['id'=>$c->id]) }}">edit</a></button>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection