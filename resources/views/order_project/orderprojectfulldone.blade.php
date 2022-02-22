@extends('layouts.app')

@section('content')

<div class="container mt-4" style="margin-bottom: 200px">
    <div style="margin-top: 275px">
        <div class="d-flex justify-content-center">
            <h1>DONE FULL PAYMENT THANK YOU</h1>
        </div>
        <div class="d-flex justify-content-center">
            <a href="/orderproject/purchases/{{auth()->user()->user_id}}">GO TO COMFIRM PAGE</a>
        </div>
    </div>
</div>

@endsection