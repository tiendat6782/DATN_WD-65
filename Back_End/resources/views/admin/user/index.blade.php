@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>Image</th>
        <th>
        </th>
        </thead>
        @isset($users)
        @php
            $i = 1
        @endphp
            @if ($users->count()>0)
                @foreach ($users as $item)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone_number}}</td>
                     
                        <td>
                            <img src="{{ asset('storage/'.$item->image) }}" width="200px" alt="">
                            </td>
                    
                        <td class="fs-3">
                            <a href="" class="text-warning" ><i class="fa-solid fa-eye"></i></i></a>
                            <a onclick="return confirm('Bạn có muốn xoá user này không?')" href="{{ route('admin.users.destroy',['id'=>$item->id]) }}" class="text-danger" ><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
              
            @else

            @endif
        @endisset
    </table>
    <div class="text-center d-flex justify-content-center">
        {{ $users->links() }}
    </div>
@endsection
