@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-evenly" style="margin-bottom: 65px">
  <div class="card" style="width: 18rem;">
    <img src="./images/discussion.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title fw-bold text-uppercase">Discussion Of Final Year Project</h5>
      <p class="card-text">In this room a place to discuss the final year project and In this room can also create a
        room for chat meetings.</p>
      <a href="/community/discussionfyp/{{auth()->user()->user_id}}" class="btn btn-outline-primary">Go Detail</a>
    </div>
  </div>
  <div class="card" style="width: 18rem;">
    <img src="./images/discussion2.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title fw-bold text-uppercase">Discussion Of Coding Problem</h5>
      <p class="card-text">In this room a place to discuss coding problems and In this room can also create a room for
        chat meetings.</p>
      <a href="/community/discussioncp/{{auth()->user()->user_id}}" class="btn btn-outline-primary">Go Detail</a>
    </div>
  </div>
  <div class="card" style="width: 18rem;">
    <img src="./images/information.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title fw-bold text-uppercase">Information Update System</h5>
      <p class="card-text">In this room where the admin will share infomation if there is the latest update about the
        website system.</p>
      <a href="#" class="btn btn-outline-primary">Go Detail</a>
    </div>
  </div>
</div>

@endsection