@extends('admin.layouts.layout')

@section('contain')

    <table class="table">
        <thead>
            <th>ID</th>
            <th>Product</th>
            <th>Size</th>
            <th>Color</th>
            <th>Quantity</th>
            <th>
                <div class="text-center">
                    <a href="{{ route('admin.attribute.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                </div>            
            </th>
        </thead>
        @isset($items)
            @if ($items->count()>0)
                @foreach ($items as $item)
                    <tr>
                       <td>{{$item->id}}</td>
                       <td>{{$item->getName()}}</td>
                       <td>{{$item->getSize()}} $</td>
                       <td>{{$item->getColor()}}</td>                    
                       <td>{{$item->quantity}}</td>                    
                       <td>                      
                        <div class="text-center fs-3">
                            <a href="{{ route('admin.attribute.edit',['id'=>$item->id]) }}" class="fs-3 text-warning" ><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?')" href="{{ route('admin.attribute.destroy',['id'=>$item->id]) }}" class="fs-3 text-danger" ><i class="fa-solid fa-trash"></i></a>
                        </div>
                       </td>
                    </tr>
                @endforeach
            @else

            @endif
        @endisset
    </table>
@endsection
