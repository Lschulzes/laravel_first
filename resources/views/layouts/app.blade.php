<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{ asset('js/app.js')}}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Laravel App - @yield('title')</title>
</head>
<body>
  <header>
    <nav class="d-flex flex-column flex-md-row align-items-center justify-content-between p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">
      <a href="{{route('home.index')}}" class="text-decoration-none text-dark">
        <h5 class="my-0 mr-md-auto font-weight-normal">Laravel App</h5>
      </a>
      <div class="links my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark text-decoration-none " href="{{route('home.index')}}">{{__("Home")}}</a>
        <a class="p-2 text-dark text-decoration-none " href="{{route('home.contact')}}">{{__("Contact")}}</a>
        <a class="p-2 text-dark text-decoration-none " href="{{route('posts.index')}}">{{__("Blog Posts")}}</a>
        @guest
        @if (Route::has('register.index'))
        <a class="p-2 text-dark text-decoration-none " href="{{route('register.index')}}">{{__("Register")}}</a>
        @endif
        <a class="p-2 text-dark text-decoration-none " href="{{route('login.index')}}">{{__("Login")}}</a>
        @else
        <a class="p-2 text-dark text-decoration-none " href="{{route('posts.create')}}">{{__("Add")}}</a>
        <a class="p-2 text-dark text-decoration-none " href="{{route("users.edit", ["user"=>Auth::user()])}}">{{__("Edit Profile")}}</a>
        <a class="p-2 text-dark text-decoration-none " href="{{route("users.show", ["user"=>Auth::user()])}}">{{__("Profile")}}</a>
        <form action="{{route('login.logout')}}" method="POST" id="logout-form" class="d-inline">
          @csrf
          <a class="p-2 text-dark text-decoration-none " href="#"
          onclick="event.preventDefault();document.getElementById('logout-form').submit()">Logout ({{Auth::user()->name}})</a>
        </form>
        @endguest
      </div>
    </nav>
  </header>
  <div class="container">
    @if (session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
    @elseif (session('error'))
    <div class="alert alert-danger">
      {{session('error')}}
    </div>
    @endif
      @yield('content')
  </div>
  <footer class="bg-dark text-center text-white mt-5">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-facebook-f"></i
        ></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-twitter"></i
        ></a>

        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-google"></i
        ></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-instagram"></i
        ></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-linkedin-in"></i
        ></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-github"></i
        ></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © {{date('Y')}} Copyright:
      <a class="text-white" href="https://lschulzes.com/">lschulzes.com</a>
    </div>
    <!-- Copyright -->
  </footer>
</body>
</html>
