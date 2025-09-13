@extends('crud.layouts.app')
@section('title', 'Create Student')
@section('content')
<a href="{{ route('crud/home') }}" class="btn btn-success">Home</a>  
<p class="h3">Create New Student</p>
    

    <form action="{{ route('crud/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="roll" class="form-label">Roll</label>
            <input type="text" class="form-control" id="roll" name="roll" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Class</label>
            <input type="text" class="form-control" id="class" name="class" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
    
@endsection