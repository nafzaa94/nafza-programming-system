@extends('layouts.app')

@section('content')

<section class="section1">
  <div class="d-flex justify-content-center">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="/images/welcome1.jpg" class="d-block w-100 rounded" alt="welcome1">
          <div class="carousel-caption d-none d-md-block">
            @auth
            <h2 class="text-uppercase" style="font-family: 'Abril Fatface', cursive;">Welcome {{ auth()->user()->name }}
            </h2>
            @else
            <h2 style="font-family: 'Abril Fatface', cursive;">Welcome To Nafza Programming</h2>
            @endauth
            <p style="font-family: 'Cormorant Garamond', serif;">Can I Help You In Programming ?</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
          <img src="/images/welcome2.jpg" class="d-block w-100 rounded" alt="welcome2">
          <div class="carousel-caption d-none d-md-block">
            <h2 style="font-family: 'Gluten', cursive;">Join Me Now !</h2>
            <p style="font-family: 'Cormorant Garamond', serif;">You Can Sign Up For Join Me</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
          <img src="/images/welcome3.jpg" class="d-block w-100 rounded" alt="welcome3">
          <div class="carousel-caption d-none d-md-block">
            <h2 style="color: #FFF; font-family: 'Akronim', cursive; ">Learn Programming Now</h2>
            <p style="color: #FFF; font-family: 'Cormorant Garamond', serif;">What Programming Language Do You Want To
              Learn ?</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
    <path fill="#E0C3FC" fill-opacity="1"
      d="M0,0L34.3,21.3C68.6,43,137,85,206,90.7C274.3,96,343,64,411,48C480,32,549,32,617,58.7C685.7,85,754,139,823,144C891.4,149,960,107,1029,117.3C1097.1,128,1166,192,1234,186.7C1302.9,181,1371,107,1406,69.3L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
    </path>
  </svg>
</section>


<section class="section2">
  <div class="d-flex">
    <div class="col-1"></div>
    <div class="col-5">
      <div class="d-flex justify-content-center">
        <h1 style="color: #000; font-family: 'Gluten', cursive; ">Study Programming Language C++ With Arduino And Python
          With Raspberry Pi</h1>
      </div>
      <div class="mt-2">
        <h5>What is Arduino And Raspberry Pi?</h5>
        <a href="https://www.arduino.cc/" type="button" class="btn btn-primary mt-2" style="margin-right: 30px;">Learn
          More Arduino</a>
        <a href="https://www.raspberrypi.org/" type="button" class="btn btn-primary mt-2">Learn More Raspberry PI</a>
      </div>
    </div>
    <div class="col-1"></div>
    <div class="col-5">
      <div class="d-flex justify-content-center">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="/images/arduino.png" class="d-block" alt="arduino" width="400px">
            </div>
            <div class="carousel-item">
              <img src="/images/rasberrypi.png" class="d-block" alt="rasberrypi" width="400px">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 300">
    <path fill="#8ec5fc" fill-opacity="1"
      d="M0,192L48,176C96,160,192,128,288,138.7C384,149,480,203,576,202.7C672,203,768,149,864,149.3C960,149,1056,203,1152,218.7C1248,235,1344,213,1392,202.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
    </path>
  </svg>
</section>

<section class="section3">
  <div class="d-flex">

    <div class="col-5">
      <div class="d-flex justify-content-center">
        <img src="/images/all2.jpeg" alt="reactJs" class="rounded img-thumbnail" width="300px" height="160px">
      </div>
    </div>
    <div class="col-1"></div>
    <div class="col-5">
      <div class="d-flex justify-content-center">
        <h1 style="color: #000; font-family: 'Gluten', cursive; ">Study Programming Language JavaScript With React.js,
          Angular.js And Vue.js For Single Website</h1>
      </div>
      <div class="mt-2">
        <h5>What is React.js, Angular.js And Vue.js?</h5>
        <a href="https://reactjs.org/" type="button" class="btn mt-2"
          style="background-color: #af5cfd; color: #FFF">Learn More React.Js</a>
        <a href="https://angular.io/" type="button" class="btn mt-2"
          style="background-color: #af5cfd; color: #FFF">Learn More Angular.Js</a>
        <a href="https://v3.vuejs.org/" type="button" class="btn mt-2"
          style="background-color: #af5cfd; color: #FFF">Learn More Vue.Js</a>
      </div>
    </div>
    <div class="col-1"></div>
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
    <path fill="#E0C3FC" fill-opacity="1"
      d="M0,0L34.3,21.3C68.6,43,137,85,206,90.7C274.3,96,343,64,411,48C480,32,549,32,617,58.7C685.7,85,754,139,823,144C891.4,149,960,107,1029,117.3C1097.1,128,1166,192,1234,186.7C1302.9,181,1371,107,1406,69.3L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
    </path>
  </svg>
</section>


<section class="section4">
  <div class="d-flex">
    <div class="col-1"></div>
    <div class="col-5">
      <div class="d-flex justify-content-center">
        <h1 style="color: #000; font-family: 'Gluten', cursive; ">Study Programming Language Dart With Flutter And
          JavaScript With React Native For Application Android Or Ios</h1>
      </div>
      <div class="mt-2">
        <h5>What is Flutter And React Native?</h5>
        <a href="https://flutter.dev/" type="button" class="btn btn-primary mt-2" style="margin-right: 30px">Learn More
          Flutter</a>
        <a href="https://reactnative.dev/" type="button" class="btn btn-primary mt-2">Learn More React Native</a>
      </div>
    </div>
    <div class="col-1"></div>
    <div class="col-5">
      <div class="d-flex justify-content-center">
        <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                src="https://d33wubrfki0l68.cloudfront.net/554c3b0e09cf167f0281fda839a5433f2040b349/ecfc9/img/header_logo.svg"
                class="d-block" alt="React native" width="200px">
            </div>
            <div class="carousel-item">
              <img src="https://storage.googleapis.com/cms-storage-bucket/ec64036b4eacc9f3fd73.svg" class="d-block"
                alt="flutter" width="400px">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 300">
    <path fill="#8ec5fc" fill-opacity="1"
      d="M0,192L48,176C96,160,192,128,288,138.7C384,149,480,203,576,202.7C672,203,768,149,864,149.3C960,149,1056,203,1152,218.7C1248,235,1344,213,1392,202.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
    </path>
  </svg>
</section>

<section class="section5">
  <div class="d-flex">

    <div class="col-5">
      <div class="d-flex justify-content-center">
        <img src="/images/laravel-bootstrap.png" class="rounded img-thumbnail" alt="laravel-bootstrap" width="300px"
          height="200px">
      </div>
    </div>
    <div class="col-1"></div>
    <div class="col-5">
      <div class="d-flex justify-content-center">
        <h1 style="color: #000; font-family: 'Gluten', cursive; ">Study Programming Language Html, Cascading Style
          Sheets, and Hypertext Preprocessor With Framework Laravel and Bootstrap</h1>
      </div>
      <div class="mt-2">
        <h5>What is Laravel And Bootstrap?</h5>
        <a href="https://laravel.com/" type="button" style="margin-right: 30px; background-color: #af5cfd; color: #FFF"
          class="btn mt-2">Learn More Laravel</a>
        <a href="https://getbootstrap.com/" type="button" class="btn mt-2"
          style="background-color: #af5cfd; color: #FFF">Learn More Bootstrap</a>
      </div>
    </div>
    <div class="col-1"></div>
  </div>


  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
    <path fill="#E0C3FC" fill-opacity="1"
      d="M0,0L34.3,21.3C68.6,43,137,85,206,90.7C274.3,96,343,64,411,48C480,32,549,32,617,58.7C685.7,85,754,139,823,144C891.4,149,960,107,1029,117.3C1097.1,128,1166,192,1234,186.7C1302.9,181,1371,107,1406,69.3L1440,32L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
    </path>
  </svg>
</section>

<div style="background-color: #e0c3fc" class="fixed-bottom">
  <div class="d-flex justify-content-center">
    <a style="margin-right: 10px" href="https://www.facebook.com/Idea-Project-Dan-Membuat-Project-222410584967060"><svg
        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook"
        viewBox="0 0 16 16">
        <path
          d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
      </svg></a>
    <a style="margin-right: 10px" href="https://www.instagram.com/nafzajustnotdev/?hl=en"><svg
        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram"
        viewBox="0 0 16 16">
        <path
          d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
      </svg></a>
    <a href="https://www.tiktok.com/@nafzanotjustdev"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
        fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
        <path
          d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z" />
      </svg></a>
  </div>
  <div class="d-flex justify-content-center">
    <span class="navbar-text">
      <p class="fw-bold">&copy; 2022 <strong class="fw-bold fs-5">Nafza Programming</strong></p>
    </span>
  </div>
</div>


@endsection