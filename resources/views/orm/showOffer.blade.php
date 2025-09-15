@extends('orm.layouts.app')
@section('title', 'Offer List')
@section('content')


<h1 class="display-6 text-center text-danger">Offer Information</h1>
<a href="{{ route('orm/offer') }}"><button class="btn btn-outline-info" type="submit">ADD</button></a>
      <table class="table  table-striped table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Offer Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($offers->isNotEmpty())
                    @php
                    $serial = 1;
                    @endphp
                
                @foreach($offers as $item) 
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{ $item->offer_name }}</td>
                    
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
                    <td>Number of offer: {{ $numberOfOffers }} </td>
                    <td>  </td>
                    <td>  </td>
                    
                </tr>
            </tbody>
        </table>

@endsection