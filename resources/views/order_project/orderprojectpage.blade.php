@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-around">
              <div class="card text-white bg-{{ $data[0]->package_color }} mb-3" style="width: 19rem;">
                <div class="card-header">{{ $data[0]->package_name }}</div>
                <div class="card-body">
                  <h3 class="card-title text-center">{{ $data[0]->package_price }}</h3>
                  <div class="d-flex justify-content-center">
                    <form action="/orderproject/comfirm/{{auth()->user()->id}}" method="post">
                      @csrf
                      <input name="namepackage" type="hidden" value="{{ $data[0]->package_name }}">
                      <Button type="submit" class="btn btn-info">Select</Button>
                    </form>
                  </div>
                      @foreach ( $data_detail_standard as $data2)
                      <div class="d-flex mt-3">
                        <img src="/images/{{ $data2->image }}" alt="accept" width="20px" height="20px">
                        <p class="card-text" style="margin-left: 10px">{{ $data2->detail }}</p>
                      </div>
                      @endforeach
                </div>
              </div>    
              <div class="card text-white bg-{{ $data[1]->package_color }} mb-3" style="width: 19rem;">
                <div class="card-header">{{ $data[1]->package_name }}</div>
                <div class="card-body">
                  <h3 class="card-title text-center">{{ $data[1]->package_price }}</h3>
                  <div class="d-flex justify-content-center">
                    <form action="/orderproject/comfirm/{{auth()->user()->id}}" method="post">
                      @csrf
                      <input name="namepackage" type="hidden" value="{{ $data[1]->package_name }}">
                      <Button type="submit" class="btn btn-info">Select</Button>
                    </form>
                  </div>
                      @foreach ( $data_detail_premium as $data2)
                      <div class="d-flex mt-3">
                        <img src="/images/{{ $data2->image }}" alt="accept" width="20px" height="20px">
                        <p class="card-text" style="margin-left: 10px">{{ $data2->detail }}</p>
                      </div>
                      @endforeach
                </div>
              </div> 
              <div class="card text-white bg-{{ $data[2]->package_color }} mb-3" style="width: 19rem;">
                <div class="card-header">{{ $data[2]->package_name }}</div>
                <div class="card-body">
                  <h3 class="card-title text-center">{{ $data[2]->package_price }}</h3>
                  <div class="d-flex justify-content-center">
                    <form action="/orderproject/comfirm/{{auth()->user()->id}}" method="post">
                      @csrf
                      <input name="namepackage" type="hidden" value="{{ $data[2]->package_name }}">
                      <Button type="submit" class="btn btn-info">Select</Button>
                    </form>
                  </div>
                      @foreach ( $data_detail_business as $data2)
                      <div class="d-flex mt-3">
                        <img src="/images/{{ $data2->image }}" alt="accept" width="20px" height="20px">
                        <p class="card-text" style="margin-left: 10px">{{ $data2->detail }}</p>
                      </div>
                      @endforeach
                </div>
              </div> 
    </div>
</div>



@endsection