@extends('layouts.app')

@section('content')

<div class="container mt-4" style="margin-bottom: 45px">
    <div class="d-flex justify-content-center">
            <div class="col-5">
                <div class="card text-white bg-{{ $datapackage->package_color }} mb-3" style="width: 19rem;">
                    <div class="card-header">{{ $datapackage->package_name }}</div>
                    <div class="card-body">
                      <h3 class="card-title text-center">{{ $datapackage->package_price }}</h3>
                          @foreach ( $datadetail as $data2)
                          <div class="d-flex mt-3">
                            <img src="/images/{{ $data2->image }}" alt="accept" width="20px" height="20px">
                            <p class="card-text" style="margin-left: 10px">{{ $data2->detail }}</p>
                          </div>
                          @endforeach
                    </div>
                </div>

                <div class="col-8">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                        <div>
                            PRE-ORDER YOU ONLY PAY HALF PRICE
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                      Your Username : {{ $datauser->username }}
                    </div>
                </div>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                      Your Email : {{ $datauser->email }}
                    </div>
                </div>
                @can('halfpayment')
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      Your Payment : Your Payment Half
                    </div>
                </div>
                @elsecan('fullpayment')
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                      Your Payment : Your Payment Full
                    </div>
                </div>
                @elsecan('nopayment')
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      Your Payment : Go Select Your Payment
                    </div>
                </div>
                @endcan
                
                @can('nopayment')
                <div class="d-flex justify-content-around mt-5 bg-warning p-3 rounded">
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">BANK TRANSFER/ATM DEPOSIT</button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">BANK TRANSFER/ATM DEPOSIT</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <h6 class="text-center">INSERT PICTURE OF PAYMENT RECEIPT</h6>
                        <form action="/orderproject/halfpayment/{{auth()->user()->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-5 mb-4">
                                    <label for="formFile" class="form-label">PICTURE OF PAYMENT RECEIPT</label>
                                    <input class="form-control" type="file" id="imagehalfpayment" name="imagehalfpayment" required>
                                    <input name="namepackage" type="hidden" value="{{ $datapackage->package_name }}">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary">SEND HALF PAYMENT</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center">
                            <div class="col-6">
                                <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                        <img src="/images/contohpayment.jpeg" class="d-block w-100" alt="..." width="100px">
                                      </div>
                                      <div class="carousel-item">
                                        <img src="/images/contohpayment2.jpg" class="d-block w-100" alt="...">
                                      </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <button type="button" class="btn btn-outline-primary">iPAY88</button>
                    <button type="button" class="btn btn-outline-primary">DEBIT</button>
                </div>
                @elsecan('halfpayment')
                <div class="d-flex justify-content-around mt-5 bg-warning p-3 rounded">
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">BANK TRANSFER/ATM DEPOSIT</button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">BANK TRANSFER/ATM DEPOSIT</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <h6 class="text-center">INSERT PICTURE OF PAYMENT RECEIPT</h6>
                        <div class="bg-danger p-2 rounded">
                          <h6 class="text-center">NAME : NIK AHMAD FAIZAL BIN ZAINAL ABIDIN</h6>
                          <h6 class="text-center">BANK NAME : RHB BANK</h6>
                          <h6 class="text-center">NO. ACCOUNT : 1-63024-0011236-3</h6>
                        </div>
                        <form action="/orderproject/fullpayment/{{auth()->user()->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3 mb-4">
                                <label for="formFile" class="form-label">PICTURE OF PAYMENT RECEIPT</label>
                                <input class="form-control" type="file" id="imagefullpayment" name="imagefullpayment" required>
                                <input name="namepackage" type="hidden" value="{{ $datapackage->package_name }}">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary">SEND FULL PAYMENT</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center">
                            <div class="col-6">
                                <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                        <img src="/images/contohpayment.jpeg" class="d-block w-100" alt="..." width="100px">
                                      </div>
                                      <div class="carousel-item">
                                        <img src="/images/contohpayment2.jpg" class="d-block w-100" alt="...">
                                      </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <button type="button" class="btn btn-outline-primary">iPAY88</button>
                    <button type="button" class="btn btn-outline-primary">DEBIT</button>
                </div>
                @elsecan('fullpayment')
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                  </svg>

                  <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                      Thank You {{ $datauser->username }} for payment
                    </div>
                  </div>
                @endcan
            </div>
            </div>
            <form action="/orderproject/submit/{{auth()->user()->id}}" method="post">
                @csrf
                <div class="d-flex justify-content-center mt-5">
                    @can('halfpayment')
                    <input name="namepackage" type="hidden" value="{{ $datapackage->package_name }}">
                    <button type="submit" class="btn btn-outline-success">COMFIRM HALF PAYMENT</button>
                    @elsecan('fullpayment')
                    <input name="namepackage" type="hidden" value="{{ $datapackage->package_name }}">
                    <button type="submit" class="btn btn-outline-success">COMFIRM FULL PAYMENT</button>
                    @endcan
                </div> 
            </form>         
    </div>
</div>
    
@endsection