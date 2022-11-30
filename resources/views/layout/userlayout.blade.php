<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset("css/style.min.css")}}">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <img src="{{asset("img/booklogo.jpg")}}" alt="" class="rounded-circle me-5" id="logo">
            <a class="navbar-brand" href="{{ route('cardbook') }}">BookStore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest
                       <li class="nav-item">
                        <a class="nav-link navbar-brand" aria-current="page" href="{{route('view.signUp')}}">SingUp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-brand" href="{{route('view.login')}}">LogIn</a>
                    </li> 
                    @endguest
                    @auth
                    <li class="nav-item">
                        <a class="nav-link navbar-brand" aria-current="page" href="#">LogIn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-brand" href="{{ route('logout')}}">LogOut</a>
                    </li> 
                    <li class="nav-item">
                        
                        <span class=" nav-link navbar-brand d-none d-lg-inline-flex active">{{Auth::user()->name}}<i class='bx bxs-circle text-success'></i></span>
                    </li> 
                    
                    @endauth
                </ul>

            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>