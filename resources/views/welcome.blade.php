@extends('layout.userlayout')
@section('title', 'Home')

@section('content')
    <h1>Welcome to BookStore</h1>
    <div class="container text-center m-5">

        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-4 h-100">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($book->picture) }}" class="card-img-top" alt="{{ $book->title }}">
                        <div class="card-body">
                            <h3 class="card-title">{{ $book->title }}</h3>
                            <h5 class="card-title">{{ $book->author }}</h5>
                            <p class="card-text">{{ $book->description }}</p>
                            <a href="{{ route('onebook', ['book'=>$book->id]) }}" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
