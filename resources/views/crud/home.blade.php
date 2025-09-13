@extends('crud.layouts.app')
@section('title', 'CRUD Home')
@section('content')
{{-- Error display --}}
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <a href="{{ route('crud/create') }}" class="btn btn-info">Add New Student</a>   
     <p class="h3">Student information </p>
    
     @if (session('success_create'))
         <div class="alert alert-success">
             {{ session('success_create') }}
         </div>
     @endif
      @if (session('success_update'))
         <div class="alert alert-info">
             {{ session('success_update') }}
         </div>
     @endif
    <table class="table">
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
                @foreach($student as $item) 
                <tr>
                    <td>{{ $loop->iteration + $student->firstItem() -1 }}</td>
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
            </tbody>
        </table>
        {{ $student->links('pagination::bootstrap-5') }}

@endsection