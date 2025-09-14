@extends('orm.layouts.app')
@section('title', 'Customer List')
@section('content')
 
<h1 class="display-6 text-center text-danger">Customer Information</h1>
<a href="{{ route('orm/customer') }}"><button class="btn btn-outline-info" type="submit">ADD</button></a>
      <table class="table  table-striped table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Customer Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($customers->isNotEmpty())
                    @php
                    $serial = 1;
                    @endphp
                
                @foreach($customers as $item) 
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{ $item->name }}</td>
                    
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
                    <td>Number of Customer: {{ $numberOfCustomers }} </td>
                    <td>  </td>
                    <td>  </td>
                    
                </tr>
            </tbody>
        </table>
        {{-- {{ $students->links('pagination::bootstrap-5') }}    --}}
@endsection