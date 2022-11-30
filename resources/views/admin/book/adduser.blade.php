@extends('layout.adminlayout')
@section('title', 'add user')

@section('content')
    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-7">
            <!-- Basic registration form-->
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header justify-content-center">
                    <h3 class="fw-light my-4">Create Account</h3>
                </div>
                <div class="card-body">
                    <!-- Registration form-->
                    <form>
                        <!-- Form Row-->
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <!-- Form Group (first name)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="username">First Name</label>
                                    <input class="form-control @error('name')
                                        is-invalid
                                    @enderror" id="username" name="name">
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input class="form-control" id="email" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <!-- Form Group (email address)            -->
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <!-- Form Group (password)-->
                                <div class="mb-3">
                                    {{-- <label class="small mb-1" for="password">Password</label> --}}
                                    <input class="form-control" id="password" type="password" name="password" hidden>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Form Group (confirm password)-->
                                <div class="mb-3">
                                    {{-- <label class="small mb-1" for="passwordCon">Confirm Password</label> --}}
                                    <input class="form-control" id="passwordCon" type="password"
                                        name="password_confirmation" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="role">Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="small mb-1" for="picture">Picture</label>
                                    <input class="form-control" id="picture" type="file" name="picture" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <!-- Form Group (create account submit)-->
                        <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                    </form>
                </div>
            </div>
        </div>
    </form>
@endsection
