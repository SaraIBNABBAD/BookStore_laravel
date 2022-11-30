@extends('layout.userlayout')
@section('title', 'signUp')

@section('content')
    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
                            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                            alt="Sample photo">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

                            <form class="px-md-2" method="POST" action="{{ route('signup') }}" enctype="multipart/form-data">
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
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="form1Example23"
                                        class="form-control form-control-lg @error('password')is-invalid @enderror"
                                        name="password" />
                                    <label class="form-label" for="form1Example23">Password</label>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <!-- Confirm Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="form1Example4" class="form-control form-control-lg "
                                        name="password_confirmation" />
                                    <label class="form-label" for="form1Example4">Repeat your password</label>
                                </div>

                                <!-- Picture input -->
                                <div class="form-outline mb-4">
                                    <input type="file" id="form1Example3" class="form-control form-control-lg"
                                        name="picture" accept="image/*" />
                                    <label class="form-label" for="form1Example3">Picture</label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Log in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
