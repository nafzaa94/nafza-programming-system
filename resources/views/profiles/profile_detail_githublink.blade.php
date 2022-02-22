@extends('layouts.app')

@section('content')

<div class="row">
    @include('profiles.navbar.side-navbar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom">
            <h1 class="h2">MY PROFILE</h1>
            @if(session()->has('success'))
            <div style="margin-right: 20px;">
                <h5 class="fw-bold" style="color: red">{{ session('success') }}</h5>
            </div>
            @endif
        </div>
        <div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a style="color: #000" class="nav-link fw-bold" aria-current="page"
                        href="/profile/{{auth()->user()->user_id}}">Detail Profile</a>
                </li>
                <li class="nav-item">
                    <a style="color: #000" class="nav-link fw-bold"
                        href="/profileproject/{{auth()->user()->user_id}}">Detail
                        Project</a>
                </li>
                @can('github')
                <li class="nav-item">
                    <a class="nav-link fw-bold active" href="/profilegithublink/{{auth()->user()->user_id}}">Link Github
                        And Date Class</a>
                </li>
                @endcan
            </ul>
        </div>

        <div class="d-flex justify-content-around">
            <div class="col-5 mt-3 p-2">
                <h3 class="text-center mb-2 fw-bold">Set Date Class</h3>

                <form action="/profilegithublink/set/{{auth()->user()->user_id}}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="">Name Project</label>
                        <input type="text" class="form-control" value="{{ $data->projectname }}" name="name_project"
                            disabled>
                    </div>
                    <label class="fs-4">Start Class</label>
                    <div class="d-flex">
                        <div class="form-group mb-2" style="margin-right: 30px">
                            <label for="">Date</label>
                            <input type="date" class="form-control" name="start_date_class">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Time</label>
                            <input type="time" class="form-control" name="start_time_class">
                        </div>
                    </div>

                    <label class="fs-4">End Class</label>
                    <div class="d-flex">
                        <div class="form-group mb-4" style="margin-right: 30px">
                            <label for="">Date</label>
                            <input type="date" class="form-control" name="end_date_class">
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Time</label>
                            <input type="time" class="form-control" name="end_time_class">
                        </div>
                    </div>


                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Send <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                <path
                                    d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                            </svg></button>
                    </div>

                </form>
            </div>
            <div class="col-4 mt-3 p-2">
                <h3 class="text-center fw-bold mb-4">Github And Meet</h3>

                <div class="accordion mb-5" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
                                LINK GITHUB
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @if ($dataGit->url_github)
                                <a href="{{ $dataGit->url_github }}">{{ $dataGit->url_github }}</a>
                                @else
                                <h5 class="text-center">No Data</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion mb-5" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                LINK MEETING
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @if ($dataGit->url_meet)
                                <a href="{{ $dataGit->url_meet }}">{{ $dataGit->url_meet }}</a>
                                @else
                                <h5 class="text-center">No Data</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                                TIME AND DATE MEETING
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table table-secondary table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Start Time</th>
                                            <th scope="col">End Time</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @if ($dataGit->start_time_class)
                                            <td>{{$dataGit->start_time_class}}</td>
                                            @endif
                                            @if ($dataGit->end_time_class)
                                            <td>{{ $dataGit->end_time_class }}</td>
                                            @endif
                                            @if ($dataGit->start_date_class)
                                            <td>{{ $dataGit->start_date_class }}</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </main>


</div>

@endsection