@extends('layout.master')
@section('content')
<main class="container">    
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($images as $image)        
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $image->fileURL() }}" class="card-img-top" alt="..." style="width: 100px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $image->title }}</h5>                        
                        <a href="{{ $image->link() }}" class="btn btn-primary">View</a>
                        @can('update-image',$image)
                            <a href="{{ route('image.edit',$image->id) }}" class="btn btn-primary">Edit</a>
                        @endcan
                        @can('delete-image',$image)
                            <form action="{{ route('image.destroy',$image)}}" method="POST" style="display: inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Ban cos chan muon xoa!')"> DELETE</button>
                            </form>
                        @endcan
                        
                    </div> 
                </div>
            </div>        
        @endforeach
    </div>    
    <div class="position-relative m-4">
    <div class="position-absolute top-0 start-50 translate-middle mt-1" >
    {{ $images->links() }}
    </div>
    </div>
</main>
@endsection
