@extends('orm.layouts.app')
@section('title', 'Add offer')
@section('content')
   <h1 class="display-6 text-center text-danger"> Insert Offer</h1>

    <form action="{{ route('orm/offer/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="offer_name" class="form-label">Offer Name</label>
            <input type="text" class="form-control" id="offer_name" name="offer_name" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
@endsection