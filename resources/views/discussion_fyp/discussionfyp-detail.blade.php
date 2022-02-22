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
            <img src="{{ $datapost->Url_Post_Image }}" class="card-img-top" alt="postimage-{{ $datapost->id }}">
            @endif
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Title : {{ $datapost->Title_Post }}</h5>
                    <h5><img class="avatar rounded-circle img-thumbnail" src="/images/avatar.png" width="30" height="30"
                            alt=""> {{ $datapost->Username }}</h5>
                </div>
                <p class="card-text">{{ $datapost->Question_Post }}</p>
                <p class="card-text"><small class="text-muted">Last updated {{ $datapost->created_at->diffForHumans()
                        }}</small></p>
            </div>
            <div class="p-2">
                <hr>
                @foreach ($datacomment as $data)
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <div>
                                    <img class="avatar rounded-circle img-thumbnail" src="/images/avatar.png" width="50"
                                        height="50" alt="">
                                </div>
                                <div style="margin-left: 20px">
                                    <h5>{{ $data->Username }}</h5>
                                    <small class="text-muted">{{ $data->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                            <div>
                                @if ($data->Username === auth()->user()->name)
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm"><i class="bi bi-three-dots"></i></button>
                                    <button type="button" class="btn btn-sm dropdown-toggle dropdown-toggle-split"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><button class="dropdown-item" type="button" data-bs-toggle="offcanvas"
                                                data-bs-target="#offcanvas{{ $data->Key_reply }}"
                                                aria-controls="offcanvasBottom">Edit</button></li>
                                        <form action="/community/discussionfyp/comments/delete/{{ $data->id }}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <li><button onclick="comfirmdelete()" type="submit"
                                                    class="dropdown-item">Delete</button></li>
                                        </form>
                                    </ul>
                                </div>
                                @else
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm"><i class="bi bi-three-dots"></i></button>
                                    <button type="button" class="btn btn-sm dropdown-toggle dropdown-toggle-split"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Report</a></li>
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-{{ $data->Key_reply}}"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            {{ $data->Comment }}
                                        </button>
                                    </h2>
                                    <div id="flush-{{ $data->Key_reply}}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div>
                                            <div class="mt-2" id="reply-{{ $data->Key_reply }}"></div>
                                            <input class="reply" type="hidden" value="{{ $data->Key_reply }}">
                                        </div>
                                        <form
                                            action="/community/discussionfyp/reply/{{ $data->Key_reply}}/{{ auth()->user()->user_id }}"
                                            method="post">
                                            @csrf
                                            <div class="p-2">
                                                <div class="mb-2">
                                                    <label for="exampleFormControlTextarea1"
                                                        class="form-label">Reply</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                                        name="reply" rows="2"></textarea>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-outline-primary">Reply</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                </div>


                @endforeach



                <form action="/community/discussionfyp/comments/{{ auth()->user()->user_id }}" method="post">
                    @csrf
                    <div class="p-2 rounded" style="background-color: #0F3B4C">
                        <div class="mb-2">

                            <label for="exampleFormControlTextarea1" class="form-label" style="color: #fff">New
                                Comment</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="Comment"
                                rows="3"></textarea>

                        </div>
                        <input name="Key_Post" type="hidden" value="{{ $datapost->Key_Post }}">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary" style="color: #fff">Comment</button>
                        </div>
                    </div>
                </form>
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

<script>
    function comfirmdelete(){
        comfirm("Are You Sure?")
    }
</script>


<script>
    const datareply = document.getElementsByClassName("reply");

let data_id_reply = "";

let data_id_reply_fetch = "";

let data_username_fetch = "";

let data_reply = "";

fetch('/api/comment')
  .then(response => response.json())
  .then(data => requireddata(data));

  function requireddata (req){
    for (var a = 0; a < req.length; a++){

        data_id_reply_fetch = req[a].Key_reply;

        data_username_fetch =req[a].Username;

        data_reply = req[a].Reply;

        for (var i = 0; i < datareply.length; i++){
            data_id_reply = datareply[i].value;

            if (data_id_reply == data_id_reply_fetch){
                const send = document.getElementById("reply-" + data_id_reply);
                let pNew = document.createElement("div");
                pNew.setAttribute("class", "alert alert-dark");
                pNew.setAttribute("role", "alert")

                let textNew = document.createTextNode(data_reply + ' ( Reply By : ' + data_username_fetch + " )");

                pNew.appendChild(textNew);
                send.appendChild(pNew);
            }
             //console.log(data_id_reply);
        }

        // console.log(data_id_reply_fetch);

        }
        

        

    };
    

</script>



@endsection