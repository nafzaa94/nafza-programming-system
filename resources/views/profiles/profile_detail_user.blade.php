@extends('layouts.app')

@section('content')

<div class="row">
    @include('profiles.navbar.side-navbar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
            <h1 class="h2">MY PROFILE</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <form action="/detailprofile/uploadimage/{{auth()->user()->user_id}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        @error('image_profile')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        @if(session()->has('success'))
                        <div style="margin-right: 20px;">
                            {{ session('success') }}
                        </div>
                        @endif
                        <input type="file" class="form-control @error('image_profile') is-invalid @enderror" id="image"
                            name="image_profile" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        <button class="btn btn-outline-secondary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link fw-bold active" aria-current="page"
                        href="/profile/{{auth()->user()->user_id}}">Detail
                        Profile</a>
                </li>
                <li class="nav-item">
                    <a style="color: #000" class="nav-link fw-bold"
                        href="/profileproject/{{auth()->user()->user_id}}">Detail
                        Project</a>
                </li>
                @can('github')
                <li class="nav-item">
                    <a style="color: #000" class="nav-link fw-bold"
                        href="/profilegithublink/{{auth()->user()->user_id}}">Link Github
                        And Date Class</a>
                </li>
                @endcan
            </ul>
        </div>

        <div class="d-flex justify-content-around mt-3">
            <div class="col-4">
                <div class="mb-3">
                    @if ($data->image_profile)
                    <img src="{{ asset('storage/'.$data->url_profile_image) }}" class="img-thumbnail" alt="imageprofile"
                        width="300px" height="300px">
                    @else
                    <img src="/images/contohprofile.jpeg" class="img-thumbnail" alt="imageprofile" width="300px"
                        height="300px">
                    @endif
                </div>
                <div>
                    <h5 class="text-uppercase" style="font-family: 'Noto Serif', serif;">USERNAME :
                        {{auth()->user()->name}}</h5>
                </div>
                <div>
                    <h5 style="font-family: 'Noto Serif', serif;">USERID : {{auth()->user()->user_id}}</h5>
                </div>
            </div>
            <div class="col-5">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse1">
                                FULL NAME
                            </button>
                        </h2>
                        <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-headin1"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{{ $data->fullname }}</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                                ADDRESS
                            </button>
                        </h2>
                        <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{{ $data->address }}</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                                PHONE NUMBER
                            </button>
                        </h2>
                        <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{{ $data->no_phone }}</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                GENDER
                            </button>
                        </h2>
                        <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{{ $data->gender }}</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                                STATUS DEPARTMENT
                            </button>
                        </h2>
                        <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{{ $data->statusdepartment }}</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
                                NAME DEPARTMENT
                            </button>
                        </h2>
                        <div id="flush-collapse6" class="accordion-collapse collapse" aria-labelledby="flush-heading6"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{{ $data->department }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection