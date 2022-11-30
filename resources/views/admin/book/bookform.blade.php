@extends('layout.adminlayout')
@section('title', 'form')
@section('content')
    <form action="{{ route('books.store')}}" method="post" enctype="multipart/form-data">
        <div class="col-lg-7">
            <!-- Basic registration form-->
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header justify-content-center">
                    <h3 class="fw-light my-4">Create Book</h3>
                </div>
                <div class="card-body">
                    <!-- Registration form-->
                    <form>
                        @csrf
                        <div class="row gx-3 ">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="small mb-1" for="title">Title</label>
                                    <input class="form-control @error('title')
                                        is-invalid
                                    @enderror" id="title" type="text"
                                        name="title">
                                </div>
                                @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="small mb-1" for="authorName">Author Name</label>
                                    <input class="form-control @error('author')
                                        is-invalid
                                    @enderror" id="authorName" type="text" name="author">
                                </div>
                                @error('author')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="mb-3">
                                <label class="small mb-1" for="description">Description</label>
                                <textarea class="form-control @error('description')is-invalid
                                    
                                @enderror" id="description" name="description"></textarea>
                            </div>
                            @error('description')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>



                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="small mb-1" for="editionDate">Edition Date</label>
                                <input class="form-control" id="editionDate" type="date" name="editionDate">
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="small mb-1" for="picture">Picture</label>
                                    <input class="form-control" id="picture" type="file" name="picture">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Form Group (confirm password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="filepath">FilePath</label>
                                <input class="form-control" id="filepath" type="file" name="filepath">
                            </div>
                        </div>
                </div>

                <button type="submit" class="btn btn-primary">Create Book</button>
    </form>
    </div>

    </div>
    </div>
    </form>
@endsection
