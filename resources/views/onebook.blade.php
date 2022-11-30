@extends('layout.userlayout')
@section('title','Book')
    
@section('content')
    <div>
        <h1>{{$book->title}}</h1>
        <img src="{{ asset($book->picture) }}" alt="" srcset="">
        <h5>Edition Date :{{$book->editionDate}}</h5>
        <p>{{$book->description}}</p>
       <a href="{{ asset($book->filepath) }}" download>Download</a>
    </div>
    <form class="px-md-2" method="POST" action="" enctype="multipart/form-data">
        @csrf
        <!-- Name input -->
        <div class="form-outline mb-4">
            <input type="text" id="form1Example1"
                class="form-control form-control-lg @error('name')is-invalid @enderror"
                name="name" />
            <label class="form-label" for="form1Example1">Your Name</label>
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form1Example13"
                class="form-control form-control-lg @error('email')is-invalid @enderror"
                name="email" />
            <label class="form-label" for="form1Example13">Email address</label>
        </div>

        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        <div class="form-outline mb-4">
            <textarea id="form1Example1"
                class="form-control form-control-lg @error('desc')is-invalid @enderror"
                name="desc" ></textarea>
            <label class="form-label" for="form1Example13">Description</label>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
    </form>
@endsection