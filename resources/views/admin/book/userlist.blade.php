@extends('layout.adminlayout')
@section('title', 'userList')

@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    {{-- <div class="col-sm-6 col-xl-6"> --}}
        <div class="mt-5 p-5">
            <h4 class="mb-4 text-center">user List</h4>
            {{-- <div class="table-responsive"> --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td><img src="{{ asset($user->picture) }}" alt="{{ $user->title }}" class="w-50"></td>
                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#update{{ $user->id }}"><i class='bx bx-edit-alt'></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="update{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update User</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card shadow-lg border-0 rounded-lg ">
                                                        <div class="card-header justify-content-center">
                                                            <h3 class="fw-light my-4">Create Account</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <form method="POST"
                                                                action="{{ route('users.update', ['user' => $user->id]) }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('put')
                                                                <div class="modal-body">
                                                                    <div class="row gx-3">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="small mb-1"
                                                                                    for="username">First
                                                                                    Name</label>
                                                                                <input
                                                                                    class="form-control @error('name')is-invalid
                                                                            @enderror"
                                                                                    id="username" name="name"
                                                                                    value="{{ old('name', $user->name) }}">
                                                                            </div>
                                                                            @error('name')
                                                                                <div class="alert alert-danger">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="small mb-1"
                                                                                    for="email">Email</label>
                                                                                <input
                                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                                    id="email" type="email"
                                                                                    name="email"
                                                                                    value="{{ old('email', $user->email) }}">
                                                                            </div>
                                                                            @error('email')
                                                                                <div class="alert alert-danger">
                                                                                    {{ $massage }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="row gx-3">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                {{-- <label class="small mb-1" for="password">Password</label> --}}
                                                                                <input class="form-control" id="password"
                                                                                    type="password" name="password"
                                                                                    value="{{ old('password', $user->password) }}"
                                                                                    hidden>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                {{-- <label class="small mb-1" for="passwordCon">Confirm Password</label> --}}
                                                                                <input class="form-control" id="passwordCon"
                                                                                    type="password"
                                                                                    name="password_confirmation" hidden>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row gx-3">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="small mb-1"
                                                                                    for="role">Role</label>
                                                                                <select class="form-control" id="role"
                                                                                    name="role">
                                                                                    <option value="user"
                                                                                        {{ $user->role === 'User' ? 'selected' : '' }}>
                                                                                        User</option>
                                                                                    <option value="admin"
                                                                                        {{ $user->role === 'Admin' ? 'selected' : '' }}>
                                                                                        Admin</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="small mb-1"
                                                                                    for="picture">Picture</label>
                                                                                <input class="form-control" id="picture"
                                                                                    type="file" name="picture"
                                                                                    accept="image/*">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" class="d-inline"
                                        method="POST" id="user{{ $user->id }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="button"
                                            onclick='handleDelete("user{{ $user->id }}")'><i
                                                class='bx bx-trash'></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{$users->links()}}
            </div>
        </div>
    </div>
    <script>
        function handleDelete(idform) {
            let form = document.querySelector('#' + idform);
            if (confirm('Do you want drope this user ?')) {
                form.submit();
            }
        }
    </script>
@endsection
