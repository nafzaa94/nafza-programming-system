@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
  <h1 style="position: absolute; z-index: 1; color: white; margin-top: 150px">WELCOME TO DISCUSSION FINAL YAER PROJECT
  </h1>
  <button style="position: absolute; z-index: 1; margin-top: 230px" class="btn btn-primary" type="button"
    data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Create New
    Post</button>

  <div style="width: 650px; background-color:#468499;" class="offcanvas offcanvas-start" data-bs-scroll="true"
    data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasScrollingLabel">NEW POST</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <form action="/community/discussionfyp/{{ auth()->user()->user_id }}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Insert Image (Optional)</p>
        <div class="input-group mb-5">
          <label class="input-group-text" for="inputGroupFile01">Upload</label>
          <input type="file" class="form-control" id="inputGroupFile01" name="Image_Post" multiple>
        </div>
        <div class="input-group mb-5">
          <label class="input-group-text" for="inputGroupSelect01">Language Program</label>
          <select class="form-select" id="inputGroupSelect01" name="Language_Programming">
            <option selected>Choose Language...</option>
            @foreach ($DataLanguage as $item)
            <option value="{{ $item->nameprogram }}">{{ $item->nameprogram }}</option>
            @endforeach
          </select>
        </div>
        <div class="input-group mb-5">
          <span class="input-group-text" id="basic-addon1">Title Question</span>
          <input type="text" class="form-control" name="Title_Post" aria-label="Title_Post"
            aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-5">
          <span class="input-group-text">Question</span>
          <textarea class="form-control" aria-label="With textarea" name="Question_Post" rows="3"></textarea>
        </div>

        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-outline-warning">POST</button>
        </div>
      </form>
    </div>
  </div>
</div>


<img src="/images/image10.jpg" alt="imagetopside" width="100%" height="400px"
  style="margin-top: -50px; position: relative">

<div class="container mt-3" style="margin-bottom: 100px">
  <div class="d-flex justify-content-around">
    <div class="col-8">
      @foreach ($DataPost as $item)
      <div class="card mb-3">
        @if ($item->Image_Post)
        <div class="d-flex justify-content-center">
          <img src="{{ $item->Url_Post_Image }}" class="card-img-top" style="width: 500px"
            alt="postimage-{{ $item->id }}">
        </div>
        @endif
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <h5 class="card-title">Title : {{ $item->Title_Post }}</h5>
            @if ($item->Username === auth()->user()->name)
            <div class="btn-group">
              <button type="button" class="btn btn-sm"><i class="bi bi-person-circle"></i> {{ $item->Username
                }}</button>
              <button type="button" class="btn btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu">
                <li><button class="dropdown-item" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvas{{$item->Key_Post}}" aria-controls="offcanvasBottom">Edit</button></li>
                <form action="/community/postdiscussionfyp/delete/{{ $item->id }}" method="post">
                  @method("delete")
                  @csrf
                  <li><button type="submit" class="dropdown-item"
                      onclick="return comfirm('are you sure?')">Delete</button></li>
                </form>

              </ul>
            </div>
            @else
            <div class="btn-group">
              <button type="button" class="btn btn-sm"><i class="bi bi-person-circle"></i> {{ $item->Username
                }}</button>
              <button type="button" class="btn btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Report</a></li>
              </ul>
            </div>
            @endif
          </div>
          <p class="card-text">{{ $item->Question_Post }}</p>
          <div class="d-flex justify-content-between">
            <p class="card-text"><small class="text-muted">Last updated {{ $item->created_at->diffForHumans() }}</small>
            </p>

            <a href="/community/discussionfyp/detail/{{ $item->Key_Post }}" class="btn btn-primary position-relative">
              Details
            </a>

          </div>
        </div>
      </div>
      @endforeach

    </div>

    <div class="col-3 rounded" style="background-color: #468499; max-height: 350px;">
      <div>
        <h1 class="text-center mt-4">Create Room</h1>
        <div class="p-3">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-door-open"></i></span>
            <input type="text" class="form-control" placeholder="Room Name" aria-label="NameRoom"
              aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2"><i class="bi bi-window-sidebar"></i></span>
            <input type="text" class="form-control" placeholder="Room Title" aria-label="TitleRoom"
              aria-describedby="basic-addon3">
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01"><i class="bi bi-person-plus"></i></label>
            <select class="form-select" id="inputGroupSelect01">
              <option selected>Total users</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01"><i class="bi bi-code"></i></label>
            <select class="form-select" id="inputGroupSelect01">
              <option selected>Code Language</option>
              @foreach ($DataLanguage as $item)
              <option value="{{ $item->nameprogram }}">{{ $item->nameprogram }}</option>
              @endforeach
            </select>
          </div>
          <div class="d-flex justify-content-center">
            <button class="btn btn-danger">Create</button>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>

@foreach ($DataPost as $itemm)
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvas{{$itemm->Key_Post}}"
  aria-labelledby="offcanvasBottomLabel" style="height: 500px; background-color: #468499;">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasBottomLabel">EDIT POST</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body small">
    <form action="/community/postdiscussionfyp/editpost/{{$itemm->Key_Post}}" method="post"
      enctype="multipart/form-data">
      @csrf
      <div class="d-flex justify-content-center">
        <div class="col-6 p-2">
          <p style="color: red">! Insert Image Again If Change Image</p>
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Upload</label>
            <input type="file" class="form-control" id="inputGroupFile01" name="Image_Post">
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Language Program</label>
            <select class="form-select" id="inputGroupSelect01" name="Language_Programming">
              <option value="{{ $itemm->Language_Programming }}" selected>{{ $itemm->Language_Programming }}</option>
              @foreach ($DataPost as $item)
              <option value="{{ $item->nameprogram }}">{{ $item->nameprogram }}</option>
              @endforeach
            </select>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Title Question</span>
            <input type="text" class="form-control" name="Title_Post" aria-label="Title_Post"
              aria-describedby="basic-addon1" value="{{ $itemm->Title_Post }}">
          </div>
          <div class="input-group">
            <span class="input-group-text">Question</span>
            <textarea class="form-control" aria-label="With textarea" name="Question_Post"
              rows="3">{{ $itemm->Question_Post }}</textarea>
          </div>
        </div>

      </div>
      <div class="d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-outline-warning">EDIT POST</button>
      </div>
    </form>
  </div>
</div>
@endforeach



@endsection