@extends('layout.userlayout')
@section('title', 'logIn')

@section('content')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="POST" action="{{ route('login')}}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="form1Example13" class="form-control form-control-lg @error('email')is-invalid
                                
                            @enderror" name="email" />
                            <label class="form-label" for="form1Example13">Email address</label>
                        </div>
                        @error('email')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="form1Example23" class="form-control form-control-lg @error('password')
                                is-invalid
                            @enderror"
                                name="password" />
                            <label class="form-label" for="form1Example23">Password</label>
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <a href="#!">Forgot password?</a>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="log">Log in</button>

                    </form>
                    <div class="mt-3">
                        <p class="mb-0  text-center">Don't have an account? <a href="{{ route('view.signUp') }}"
                                class="text-primary fw-bold">Sign
                                Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
