@extends('layout.index')
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="">Add</a>
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
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection