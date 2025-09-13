@extends('orm.layouts.app')
@section('title', 'Student List')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

   @if (session('success_create'))
         <div class="alert alert-success">
             {{ session('success_create') }}
         </div>
     @endif
<h1 class="display-6 text-center text-danger">Student Information</h1>
      <table class="table  table-striped table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Roll</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- @if($students->isNotEmpty()) --}}
                    @php
                    $serial = 1;
                    @endphp
                
                @foreach($students as $item) 
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{ $item->roll }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->class }}</td>
                    <td>
                       <img width="150px" height="120px" src="{{ asset('storage/'.$item->image) }}" alt="Uploaded Image" />
                    </td>
                    
                    <td>
                        <form action="{{ route('crud/edit',$item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure to edit this row?')" class="btn btn-info">Edit</button>
                        </form>

                        <form action="{{ route('crud/destroy',$item->id) }}" method="POST" style="display:inline;">
                            @csrf

                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure to delete ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                {{-- @endif --}}
            </tbody>
        </table>
        {{-- {{ $students->links('pagination::bootstrap-5') }}    --}}
@endsection