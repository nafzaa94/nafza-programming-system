@extends('layouts.app')

@section('content')

@can('update')
<form action="/storeprofile/{{auth()->user()->id}}" method="post">
  @csrf
  <input name="id_user" type="hidden" value="{{auth()->user()->id}}">
  <div class="container">
      <div class="d-flex justify-content-between border border-2 p-2 mb-3">
              <div class="col-5">
                  <div class="mb-4">
                      <h3 class="text-center">Detail Your Profile</h3>
                  </div>
                  <div class="input-group mb-4">
                      <span class="input-group-text" id="basic-addon1">Full Name</span>
                      <input type="text" name="fullname" class="form-control" aria-label="fullname" aria-describedby="basic-addon1">
                  </div>
                  <div class="input-group mb-4">
                      <span class="input-group-text" id="basic-addon1">Address</span>
                      <input type="text" name="address" class="form-control" aria-label="address" aria-describedby="basic-addon1">
                  </div>
                  <div class="input-group mb-4">
                      <span class="input-group-text" id="basic-addon1">Phone Number</span>
                      <input type="text" name="no_phone" class="form-control" aria-label="no_phone" aria-describedby="basic-addon1">
                  </div>
                  <div class="d-flex align-items-center border input-group rounded mb-4">
                      <span class="input-group-text" id="basic-addon1">Gender</span>
                      <div class="d-flex">
                          <div class="form-check" style="margin-right: 40px; margin-left: 40px;">
                              <input class="form-check-input" type="radio" name="gender" value="Male" id="gender1">
                              <label class="form-check-label" for="gender1">
                              Male
                              </label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="gender" value="Female" id="gender2" checked>
                              <label class="form-check-label" for="gender2">
                              Female
                              </label>
                          </div>
                      </div>
                  </div>
                  <div class="input-group mb-4">
                      <label class="input-group-text" for="workorstudent1">Work Or Student</label>
                      <select class="form-select" id="workorstudent1" name="statusdepartment">
                      <option selected>Choose...</option>
                      <option value="Student">Student</option>
                      <option value="Work">Work</option>
                      </select>
                  </div>
                  <div class="mb-4">
                      <label for="exampleFormControlInput1" class="form-label">Name Of Company or College</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" name="department">
                  </div>
          </div>
          <div class="col-5">
                  <div class="mb-4">
                      <h3 class="text-center">Detail Your Project</h3>
                  </div>
                  <div class="input-group mb-4">
                      <span class="input-group-text" id="basic-addon1">Project Name</span>
                      <input type="text" name="projectname" class="form-control" aria-label="projectname" aria-describedby="basic-addon1">
                  </div>
                  <div class="input-group mb-4">
                      <span class="input-group-text" id="basic-addon1">Presentation Date</span>
                      <input type="date" name="presendate" class="form-control" aria-label="presendate" aria-describedby="basic-addon1">
                  </div>
                  <div class="input-group mb-4">
                      <label class="input-group-text" for="workorstudent1">Type Project</label>
                      <select class="form-select" id="workorstudent1" name="typeproject">
                      <option selected>Choose...</option>
                      <option value="fyp">Final Year Project</option>
                      <option value="company">Company Project</option>
                      <option value="hobby">Hobby Project</option>
                      </select>
                  </div>
                  <div class="mb-4">
                      <label for="exampleFormControlTextarea1" class="form-label">Objective Project (For Final Year Project Only)</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="objectiveproject" placeholder="Insert All Objective Project"></textarea>
                  </div>
          </div>
      </div>
      <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Save Data</button>
      </div>
  
  </div>
</form>
@else
<card-component></card-component>
@endcan



@endsection
