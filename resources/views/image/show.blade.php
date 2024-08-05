@extends('layout.master')
@section('content')
<main class="container">
    <div class="card mb-3" style="max-width: 1080px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ $image->fileURL() }}" class="img-fluid rounded-start" alt="..." >
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $image->title}}</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              <div>
                <img src="https://i.pravatar.cc/100" class="rounded-circle mr-3">
              </div>
              <div>
                {{$image->user->name}}
              </div>
              <div>
                {{$image->user->getImagesCount()}}
              </div>
              <div class="btn-group">
                <button type="button" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                      </svg>
                    Download <span class="badge text-bg-secondary">{{ $image->downloads_count}}</span>
                </button>
                <button type="button" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                      </svg>
                    View <span class="badge text-bg-secondary">{{ $image->views_count}}</span>
                </button>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Created {{ $image->uploadDate()}}</li>
                <li class="list-group-item">Dimension: {{ $image->dimension}}</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
</main>
@endsection