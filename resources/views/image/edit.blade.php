@extends('layout.master')
@section('content')
<main class="container">
    <h1>EDIT IMAGE</h1>
    <form action="{{ route('image.update',$image)}}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $image->title }}">    
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror        
        </div>
        <div class="mb-3">
            <img src="{{ $image->fileURL() }}" class="card-img-top" alt="..." style="width: 200px">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</main>
@endsection

