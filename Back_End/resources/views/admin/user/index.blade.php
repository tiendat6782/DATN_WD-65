@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>Email verified at</th>
        <th>Password</th>
        <th>Role id</th>
        <th>Remember token</th>
        <th>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
        </th>
        </thead>
        @isset($users)
            @if ($users->count()>0)
                @foreach ($users as $users)
                    <tr>
                        <td>{{$users->id}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->phone_number}}</td>
                        <td>{{$users->create_at}}</td>
                        <td>{{$users->password}}</td>
                        <td>{{$users->role_id}}</td>
                        <td>{{$users->remember_token}}</td>

                        <td class="fs-3">
                            <a href="{{ route('admin.users.edit',['id'=>$users->id]) }}" class="text-warning" ><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return confirm('Bạn có muốn xoá user này không?')" href="{{ route('admin.users.destroy',['id'=>$users->id]) }}" class="text-danger" ><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                @endforeach
            @else

            @endif
        @endisset
    </table>
@endsection
