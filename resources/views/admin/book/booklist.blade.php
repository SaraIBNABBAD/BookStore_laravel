@extends('layout.adminlayout')
@section('title', 'Book Liste')
@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    {{-- <div class="col-sm-12 col-xl-6"> --}}
        <div class="mt-5 p-5">
            <h4 class="mb-4 text-center">Book List</h4>
            <table class="table w-100">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Edition Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{$book->editionDate}}</td>
                            <td>{{Str::limit($book->description,50) }}</td>
                            <td><img src="{{ asset($book->picture) }}" alt="{{ $book->title }}" class="w-50"></td>
                            <td><a class="btn btn-success " href="{{ route('books.edit', ['book' => $book->id]) }}"><i
                                        class='bx bx-edit-alt'></i></a>
                                <form action="{{ route('books.destroy', ['book' => $book->id]) }}" class="d-inline"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit"><i class='bx bx-trash'></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{$books->links()}}
        </div>
    </div>
@endsection
