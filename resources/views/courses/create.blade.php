@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <h2 class="display-2">
            Add a course

        </h2>

    </div>

</div>
<div class="row">
    <div class="col">
        <form action="{{ route('courses.store')}}" method="POST">
            {{ csrf_field()}}
                <div class="mb-3">
                  <label for="webDev" class="form-label">Web Development</label>
                  <input type="text" class="form-control" id="webDev" name="webDev">
                </div>
                <div class="mb-3">
                  <label for="fullStack" class="form-label">FullStack WebDev</label>
                  <input type="text" class="form-control" id="fullStack" name="fullStack">
                </div>
                <div class="mb-3">
                    <label for="proPractice" class="form-label">Professional Practice</label>
                  <input type="email" class="form-control" id="proPractice" name="proPractice">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              
        </form>

    </div>

</div>
@endsection