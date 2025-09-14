@extends('orm.layouts.app')
@section('title', 'Add Customer')
@section('content')
   <h1 class="display-6 text-center text-danger"> Insert Customer</h1>

    <form action="{{ route('orm/customer/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
@endsection