@extends('layouts.app')

@section('content')



<div class="d-flex justify-content-center" style="margin-bottom: 100px">
    <div style="margin-right: 30px">
        <button class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Back"
            style="background-color: #0F3B4C; color: #FFF"><i class="bi bi-back"></i></button>
    </div>
    <div class="col-7">
        <div class="card mb-3">
            @if ($datapost->Image_Post)
            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/'.$datapost->Url_Post_Image) }}" class="card-img-top"
                    alt="postimage-{{ $datapost->id }}" style="width: 500px; padding: 10px">
            </div>
            {{-- <img src="{{ $datapost->Url_Post_Image }}" class="card-img-top" alt="postimage-{{ $datapost->id }}">
            --}}
            @endif
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Title : {{ $datapost->Title_Post }}</h5>
                    <h5><img class="avatar rounded-circle img-thumbnail" src="{{ $datapost->Avatar }}" width="30"
                            height="30" alt=""> {{ $datapost->Username }}</h5>
                </div>
                <p class="card-text">{{ $datapost->Question_Post }}</p>
                <p class="card-text"><small class="text-muted">Last updated {{ $datapost->created_at->diffForHumans()
                        }}</small></p>
            </div>
            <div class="p-2">
                {{-- <formdiscussionfyp-component></formdiscussionfyp-component> --}}
                <viewcommentdiscussionfyp-component></viewcommentdiscussionfyp-component>
                <input id="Username" name="Username" type="hidden" value="{{ auth()->user()->name }}">
                <input id="User_id" name="User_id" type="hidden" value="{{ auth()->user()->user_id }}">
                <input id="Key_post" name="Key_Post" type="hidden" value="{{ $datapost->Key_Post }}">
            </div>
        </div>
    </div>
</div>

@foreach ($datacomment as $dataa)
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvas{{ $dataa->Key_reply }}"
    aria-labelledby="offcanvasBottomLabel" style="height: 300px">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Edit</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small">
        <div class="d-flex justify-content-center">
            <div class="col-6">
                <form action="/community/discussionfyp/comments/edit/{{ $dataa->Key_reply }}" method="post">
                    @csrf
                    <div class="p-2 rounded">
                        <div class="mb-2">

                            <label for="exampleFormControledit" class="form-label">Edit Comment</label>
                            <textarea class="form-control" id="exampleFormControledit" name="Comment"
                                rows="2">{{ $dataa->Comment }}</textarea>

                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary">Edit Comment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endforeach


@endsection