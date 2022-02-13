@extends('layouts.app')

@section('content')

<div class="d-flex" style="margin-top: 20px">
  <div
    style="height: 100%; margin-top: -50px; width: 300px; position: absolute; z-index: 1; background-image: linear-gradient(to right, #e0c3fc, #8ec5fc); ">
    <div class="nav flex-column">
      <div class="accordion mt-2 border-0" id="accordionPanelsStayOpenExample">
        <div class="accordion-item border-0" style="background-image: linear-gradient(to right, #e0c3fc, #8ec5fc);">
          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapseone" aria-expanded="false"
              aria-controls="panelsStayOpen-collapseTwo"
              style="background-image: linear-gradient(to right, #e0c3fc, #8ec5fc);">
              Arduino
            </button>
          </h2>
          <div id="panelsStayOpen-collapseone" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
              <ul class="nav flex-column">
                @foreach ($datavideoarduino as $data)
                <li class="nav-item">
                  <button type="button" value="{{ $data->Id_video }}" id="{{ $data->Id_video }}" class="btn">{{
                    $data->Title_video }}</button>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="accordion-item border-0" style="background-image: linear-gradient(to right, #e0c3fc, #8ec5fc);">
          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
              aria-controls="panelsStayOpen-collapseTwo"
              style="background-image: linear-gradient(to right, #e0c3fc, #8ec5fc);">
              JavaScript
            </button>
          </h2>
          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
              <ul class="nav flex-column">
                @foreach ($datavideojavascript as $data)
                <li class="nav-item">
                  <button type="button" value="{{ $data->Id_video }}" id="{{ $data->Id_video }}" class="btn">{{
                    $data->Title_video }}</button>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="accordion-item border-0" style="background-image: linear-gradient(to right, #e0c3fc, #8ec5fc);">
          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapsethree" aria-expanded="false"
              aria-controls="panelsStayOpen-collapseTwo"
              style="background-image: linear-gradient(to right, #e0c3fc, #8ec5fc);">
              Hypertext Preprocessor
            </button>
          </h2>
          <div id="panelsStayOpen-collapsethree" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
              <ul class="nav flex-column">
                @foreach ($datavideophp as $data)
                <li class="nav-item">
                  <button type="button" value="{{ $data->Id_video }}" id="{{ $data->Id_video }}" class="btn">{{
                    $data->Title_video }}</button>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>

        <div class="accordion-item border-0" style="background-image: linear-gradient(to right, #e0c3fc, #8ec5fc);">
          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapseempat" aria-expanded="false"
              aria-controls="panelsStayOpen-collapseTwo"
              style="background-image: linear-gradient(to right, #e0c3fc, #8ec5fc);">
              Python
            </button>
          </h2>
          <div id="panelsStayOpen-collapseempat" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
              <ul class="nav flex-column">
                @foreach ($datavideopython as $data)
                <li class="nav-item">
                  <button type="button" value="{{ $data->Id_video }}" id="{{ $data->Id_video }}" class="btn">{{
                    $data->Title_video }}</button>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>

        <div class="accordion-item border-0" style="background-image: linear-gradient(to right, #e0c3fc, #8ec5fc);">
          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed border-0" type="button" data-bs-toggle="collapse"
              data-bs-target="#panelsStayOpen-collapsetlima" aria-expanded="false"
              aria-controls="panelsStayOpen-collapseTwo"
              style="background-image: linear-gradient(to right, #e0c3fc, #8ec5fc);">
              React js
            </button>
          </h2>
          <div id="panelsStayOpen-collapsetlima" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
              <ul class="nav flex-column">
                @foreach ($datavideoreactjs as $data)
                <li class="nav-item">
                  <button type="button" value="{{ $data->Id_video }}" id="{{ $data->Id_video }}" class="btn">{{
                    $data->Title_video }}</button>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-3">

  </div>
  <div class="col-9">
    <div class="text-center" style="margin-bottom: 50px" id="title-video">
      <h1>SELECT VIDEO</h1>
      <div class="spinner-border text-danger" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <div class="d-flex justify-content-center">

      <div class="col-7 mb-4" id="frame-video">
        <div class="d-flex justify-content-center"><img src="./images/left-arrow.png" alt="arrow" width="200"></div>
      </div>

    </div>
  </div>
</div>


<script>
  let id = [];

    let id_video = [];

    let Id_video = "";
    fetch('/api/Video')
     .then(response => response.json())
     .then(data => requireddata(data));

     const requireddata = (req) =>{
        for (let i = 0; i < req.length; i++){
           Id_video = req[i].Id_video;
           id[i] = document.getElementById(Id_video);
           id_video[i] = id[i].value;
           //console.log(id[0]);
           id[i].addEventListener("click", function(){ 
            fetch('/api/Video/'+ id_video[i])
              .then(response => response.json())
              .then(data => getdata(data));
            });
        }
     }

     function getdata(req){
                const sendtitle = document.getElementById("title-video");
                sendtitle.innerHTML = "<h1>" + req.Title_video + "</h1>"; 

                const sendframe = document.getElementById("frame-video");
                sendframe.innerHTML = '<iframe width="560" height="315" src="' + req.Link_video +'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
     }

</script>

@endsection