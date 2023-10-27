@extends('admin.layouts.layout')

@section('contain')
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Product ID</th>
        <th>User ID</th>
        <th>Rating</th>
        <th>Comment</th>
        <th>Date</th>
        <th>
            <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary">Them</a>
        </th>
        </thead>
        @isset($reviews)
            @if ($reviews->count()>0)
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{$review->id}}</td>
                        <td>{{$review->getPro()}}</td>
                        <td>{{$review->getUser() }}</td>
                        <td>{{$review->rating}}</td>
                        <td>{{$review->comment}}</td>
                        <td>{{$review->date}}</td>
                        <td>
                            <a href="{{ route('admin.reviews.edit',['id'=>$review->id]) }}" class="btn btn-warning" >Sửa</a>
                            <a onclick="return confirm('Bạn có muốn xoá bình luận này không?')" href="{{ route('admin.reviews.destroy',['id'=>$review->id]) }}" class="btn btn-danger" >Xoá</a>

                        </td>
                    </tr>
                @endforeach
            @else

            @endif
        @endisset
    </table>
@endsection
