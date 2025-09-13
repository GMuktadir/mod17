@extends('crud.layouts.app')
@section('title', 'Edit Student')
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

<a href="{{ route('crud/home') }}" class="btn btn-success">Home</a>  
<p class="h3">Edit Student</p>
    
    
        
   
    <form action="{{ route('crud/update',$student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="roll" class="form-label">Roll</label>
            <input type="text" value="{{ $student->roll }}" class="form-control" id="roll" name="roll" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" value="{{ $student->name }}" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Class</label>
            <input type="text" value="{{ $student->class }}" class="form-control" id="class" name="class" required>
        </div>

        @if($student->image)
        <div class="mb-3">
            <label for="image" class="form-label">Photo</label>
            <img width="150px" height="120px" src="{{ asset('storage/'.$student->image) }}" alt="Uploaded Image" />
        </div>
        @endif
        
        <div class="mb-3">
            <label for="image" class="form-label">Upload</label>
            <input type="file" value="{{ $student->image }}" class="form-control" id="image" name="image" accept="image/*">   
        </div>
      
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
     
@endsection