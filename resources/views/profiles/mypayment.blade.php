@extends('layouts.app')

@section('content')

<div class="row">
    @include('profiles.navbar.side-navbar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-around">
            @can('halfpayment')
            <div class="card" style="width: 18rem;">
                <img src="{{ $data->url_imagehalfpayment }}" class="img-thumbnail" alt="imagehalfpayment">
                <div class="card-body">
                    <h5 class="card-title">{{$data->package}}</h5>
                    <p class="card-text">RECEIPT HALF PAYMENT</p>
                </div>
            </div>
            @elsecan('fullpayment')
            <div class="card" style="width: 18rem;">
                <img src="{{ $data->url_imagehalfpayment }}" class="img-thumbnail" alt="imagehalfpayment">
                <div class="card-body">
                    <h5 class="card-title">{{$data->package}}</h5>
                    <p class="card-text">RECEIPT HALF PAYMENT</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="{{ $data->url_imagefullpayment }}" class="img-thumbnail" alt="imagefullpayment">
                <div class="card-body">
                    <h5 class="card-title">{{$data->package}}</h5>
                    <p class="card-text">RECEIPT FULL PAYMENT</p>
                </div>
            </div>
            @endcan


            @can('halfpayment')
            <div class="card bg-info" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title mt-3 text-center">PAYMENT BALANCE</h5>
                    <h6 class="card-subtitle mt-3 mb-3 text-muted text-center">HALF PAYMENT</h6>
                    <h1 class="card-text text-center">{{$balance}}</h1>
                </div>
            </div>
            @elsecan('fullpayment')
            <div class="card bg-info" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title mt-3 text-center">PAYMENT BALANCE</h5>
                    <h6 class="card-subtitle mt-3 mb-3 text-muted text-center">FULL PAYMENT</h6>
                    <h1 class="card-text text-center">THANK YOU</h1>
                </div>
            </div>
            @endcan

        </div>
    </main>
</div>


@endsection