@extends('layout.master')
@section('content')
<main class="container">
    <h1>UPLOAD IMAGE</h1>
    <form action="{{ route('image.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title">    
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror        
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Image</label>
            <input type="file" class="form-control" name="file" rows="3">
            @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</main>
@endsection

