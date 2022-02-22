@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <h1 style="position: absolute; z-index: 1; color: white; margin-top: 150px">WELCOME TO DISCUSSION CODING PROBLEMS
    </h1>
    <button style="position: absolute; z-index: 1; margin-top: 230px" class="btn btn-primary" type="button"
        data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Create New
        Post</button>

    <div style="width: 1200px; background-color:#468499;" class="offcanvas offcanvas-start" data-bs-scroll="true"
        data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">NEW POST</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <form action="/community/discussioncp/{{ auth()->user()->user_id }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="d-flex">
                <div class="col-6">
                    <div class="offcanvas-body">
                        <p>Insert Image Project (Optional)</p>
                        <div class="input-group mb-5">
                            <label class="input-group-text" for="inputImageMultiple1">Upload</label>
                            <input type="file" class="form-control" id="inputImageMultiple1" name="Image_Project_Post"
                                multiple>
                        </div>
                        <div class="input-group mb-5">
                            <label class="input-group-text" for="inputGroupSelect01">Language Program</label>
                            <select class="form-select" id="inputGroupSelect01" name="Language_Programming">
                                <option selected>Choose Language...</option>
                                @foreach ($datalanguage as $item)
                                <option value="{{ $item->nameprogram }}">{{ $item->nameprogram }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon1">Title Question</span>
                            <input type="text" class="form-control" name="Title_Post" aria-label="Title_Post"
                                aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Question</span>
                            <textarea class="form-control" aria-label="With textarea" name="Question_Post"
                                rows="7"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-6" style="padding: 16px">
                    <p>Insert Image Code (Optional)</p>
                    <div class="input-group mb-5">
                        <label class="input-group-text" for="inputImageMultiple1">Upload</label>
                        <input type="file" class="form-control" id="inputImageMultiple1" name="Image_Code_Post"
                            multiple>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Code (Optional)</span>
                        <textarea class="form-control" aria-label="With textarea" name="Coding_Post"
                            rows="15"></textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-warning">POST</button>
            </div>
        </form>
    </div>
</div>

<img src="/images/image11.jpg" alt="imagetopside" width="100%" height="400px"
    style="margin-top: -50px; position: relative">



@foreach ($datapost as $item)
<div class="container">
    <div class="row">
        <div class="col-8 mt-5">
            <div class="card">
                <div class="card-body" id="body-question-{{ $item->Key_Post }}">
                    <h5 class="card-title">TITLE: {{ $item->Title_Post }}</h5>
                    <p class="card-text">QUESTION: {{ $item->Question_Post }}</p>
                </div>

                <div class="card-body" id="body-image-{{ $item->Key_Post }}">
                    <h5 class="card-title text-center">IMAGE PROJECT</h5>
                    <div class="d-flex justify-content-center">
                        @if ($item->Image_Project_Post)
                        <img src="{{ $item->Url_Image_Project_Post }}" alt="" height="100%" width="100%">
                        @endif
                    </div>
                </div>
                @if ($item->Coding_Post)
                <div class="card-body" id="body-coding-{{ $item->Key_Post }}">
                    <h5 class="card-title text-center">CODE</h5>
                    <pre style="background-color: rgb(168, 168, 168); padding: 30px">{{ $item->Coding_Post }}</pre>
                </div>
                @endif

                @if ($item->Image_Code_Post)
                <div class="card-body" id="body-image-{{ $item->Key_Post }}">
                    <h5 class="card-title text-center">IMAGE PROJECT</h5>
                    <div class="d-flex justify-content-center">
                        <img src="{{ $item->Url_Image_Code_Post }}" alt="" height="100%" width="100%">
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
                    <h5 class="card-title">{{ $item->Username }}</h5>
                    <p class="card-text"><small class="text-muted">Last updated {{ $item->created_at->diffForHumans()
                            }}</small></p>
                    <a href="/community/discussioncp/detail/{{ $item->Key_Post }}"
                        class="btn btn-outline-dark">Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection