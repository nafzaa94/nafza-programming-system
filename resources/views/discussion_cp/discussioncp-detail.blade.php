@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8 mt-5">
            <div class="card">
                <div class="card-body" id="body-question-{{ $datapost->Key_Post }}">
                    <h5 class="card-title">TITLE: {{ $datapost->Title_Post }}</h5>
                    <p class="card-text">QUESTION: {{ $datapost->Question_Post }}</p>
                </div>

                <div class="card-body" id="body-image-{{ $datapost->Key_Post }}">
                    <h5 class="card-title text-center">IMAGE PROJECT</h5>
                    <div class="d-flex justify-content-center">
                        @if ($datapost->Image_Project_Post)
                        <img src="{{ $datapost->Url_Image_Project_Post }}" alt="" height="100%" width="100%">
                        @endif
                    </div>
                </div>
                @if ($datapost->Coding_Post)
                <div class="card-body" id="body-coding-{{ $datapost->Key_Post }}">
                    <h5 class="card-title text-center">CODE</h5>
                    <pre style="background-color: rgb(168, 168, 168); padding: 30px">{{ $datapost->Coding_Post }}</pre>
                </div>
                @endif

                @if ($datapost->Image_Code_Post)
                <div class="card-body" id="body-image-{{ $datapost->Key_Post }}">
                    <h5 class="card-title text-center">IMAGE PROJECT</h5>
                    <div class="d-flex justify-content-center">
                        <img src="{{ $datapost->Url_Image_Code_Post }}" alt="" height="100%" width="100%">
                    </div>
                </div>
                @endif

            </div>
        </div>
        <div class="col-4 mt-5">
            <div class="card">
                <div class="card-header">
                    POST BY:
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $datapost->Username }}</h5>
                    <p class="card-text"><small class="text-muted">Last updated {{
                            $datapost->created_at->diffForHumans()
                            }}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection