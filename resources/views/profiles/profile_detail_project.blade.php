@extends('layouts.app')

@section('content')

<div class="row">
  @include('profiles.navbar.side-navbar')

  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
      <h1 class="h2">MY PROFILE</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <form action="/detailproject/uploadimage/{{auth()->user()->id}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="input-group">
            @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
            @if(session()->has('success'))
            <div style="margin-right: 20px; margin-top: 8px">
              {{ session('success') }}
            </div>
            @endif
            <input type="file" class="form-control @error('imageproject') is-invalid @enderror" id="imageproject"
              name="imageproject" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <button class="btn btn-outline-secondary" type="submit">Save</button>
          </div>
        </form>
      </div>
    </div>
    <div>
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/profile/{{auth()->user()->id}}">Detail Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/profileproject/{{auth()->user()->id}}">Detail Project</a>
        </li>
        @can('github')
        <li class="nav-item">
          <a class="nav-link" href="/profilegithublink/{{auth()->user()->id}}">Link Github And Component List</a>
        </li>
        @endcan
      </ul>
    </div>

    <div class="d-flex justify-content-around mt-3">
      <div class="col-5">
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading1">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse1">
                PROJECT NAME
              </button>
            </h2>
            <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-headin1"
              data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">{{ $data->projectname }}</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading2">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                PRESENTATION DATE
              </button>
            </h2>
            <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
              data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">{{ $data->presendate }}</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading3">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                TYPE PROJECT
              </button>
            </h2>
            <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
              data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">{{ $data->typeproject }}</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading4">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                OBJECTIVE PROJECT
              </button>
            </h2>
            <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
              data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <pre>{{ $data->objectiveproject }}</pre>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-5">
        <div class="mb-3">
          @if ($data->imageproject)
          <img src="{{ $data->url_project_image }}" class="img-thumbnail" alt="imageprofile" width="100%" height="100%">
          @else
          <img src="/images/contohproject.jpeg" class="img-thumbnail" alt="imageprofile" width="300px" height="300px">
          @endif
        </div>
        <div>
          <h5 class="text-uppercase" style="font-family: 'Noto Serif', serif;">USERNAME : {{auth()->user()->name}}</h5>
        </div>
        <div>
          <h5 style="font-family: 'Noto Serif', serif;">USERID : {{auth()->user()->id}}</h5>
        </div>
      </div>
    </div>
</div>
</main>
</div>

@endsection