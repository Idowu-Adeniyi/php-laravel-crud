@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <h2 class="display-2">
            Edit a course

        </h2>

    </div>

</div>
<div class="row">
    <div class="col">
        <form action="{{ route('courses.store')}}" method="PUT">
            {{ csrf_field()}}
                <div class="mb-3">
                  <label for="webDev" class="form-label">Web Development</label>
                  <input type="text" class="form-control" id="webDev" name="webDev" value="{{ $course -> webDev}}">
                </div>
                <div class="mb-3">
                  <label for="fullStack" class="form-label">FullStack WebDev</label>
                  <input type="text" class="form-control" id="fullStack" name="fullStack" value="{{ $course -> fullStack}}">
                </div>
                <div class="mb-3">
                    <label for="proPractice" class="form-label">Professional Practice</label>
                  <input type="email" class="form-control" id="proPractice" name="proPractice" value="{{ $course -> proPractice}}">
                </div>
                <button type="submit" class="btn btn-primary">Update course</button>
              
        </form>

    </div>

</div>
@endsection