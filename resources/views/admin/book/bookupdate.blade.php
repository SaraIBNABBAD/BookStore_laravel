@extends('layout.adminlayout')
@section('title', 'form')
@section('content')
    <form action="{{ route('books.update',['book'=>$book->id])}}" method="post" enctype="multipart/form-data">
        @method('put')
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
                                    <input class="form-control" id="title" type="text"
                                        name="title" value="{{old('title',$book->title)}}">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="small mb-1" for="authorName">Author Name</label>
                                    <input class="form-control" id="authorName" type="text" name="author" value="{{old('author',$book->author)}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="mb-3">
                                <label class="small mb-1" for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{old('description',$book->description)}}</textarea>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="small mb-1" for="editionDate">Edition Date</label>
                                <input class="form-control" id="editionDate" type="date" name="editionDate" value="{{old('editionDate',$book->editionDate)}}">
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

                <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>

    </div>
    </div>
    </form>
@endsection
