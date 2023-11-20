@extends('admin.layouts.layout')
@section('contain')
<div>
    <h2>
        Show User
    </h2>
</div>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $users->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $users->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{ $users->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Address </th>
                        <td>{{ $users->address }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>{{ $users->role_id ?? 'N/A' }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-12 mt-3">
                @if ($users->image)
                    <img src="{{ asset('storage/' . $users->image) }}" alt="{{ $users->name }}" style="max-width: 100%;">
                @else
                    <p>No image available</p>
                @endif
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Back to List</a>
            <a href="{{ route('admin.users.edit', ['id' => $users->id]) }}" class="btn btn-warning">Edit User</a>
            <form action="{{ route('admin.users.destroy', ['id' => $users->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete User</button>
            </form>
        </div>
    </div>
@endsection
