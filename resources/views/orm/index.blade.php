@extends('orm.layouts.app')
@section('title', 'Product List')
@section('content')
 
<h1 class="display-6 text-center text-danger">Product Information</h1>
      <table class="table  table-striped table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($products->isNotEmpty())
                    @php
                    $serial = 1;
                    @endphp
                
                @foreach($products as $item) 
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                   
                    
                    <td>
                        {{-- <form action="{{ route('crud/edit',$item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure to edit this row?')" class="btn btn-info">Edit</button>
                        </form>

                        <form action="{{ route('crud/destroy',$item->id) }}" method="POST" style="display:inline;">
                            @csrf

                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure to delete ?')">Delete</button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
                @endif
                <tr>
                    <td>Number of product: {{ $numberOfProducts }} </td>
                    <td>  </td>
                    <td>  </td>
                    <td>  </td> 
                    <td> Total price: {{ $totalPrice }} </td>
                    <td> Sum of stock: {{ $sumStock }} </td> 
                    <td>  </td>
                </tr>
            </tbody>
        </table>
        {{-- {{ $students->links('pagination::bootstrap-5') }}    --}}
@endsection