<section>
    <nav class="navbar navbar-expand-lg bg-body-secondary">
      <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-3" id="navbarNavDropdown">
          <ul class="navbar-nav mx-3">
            <li class="nav-item mx-3">
              <a class="nav-link btn btn-warning" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link btn btn-warning" href="#">About</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link btn btn-warning" href="#">Research</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link btn btn-warning" href="#">Project</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle btn btn-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                People
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('frontend.almuni')}}">Faculty</a></li>
                <li><a class="dropdown-item" href="{{route('frontend.current')}}">Current Student</a></li>
                <li><a class="dropdown-item" href="{{route('frontend.almuni')}}">Alumni Student</a></li>
              </ul>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link btn btn-warning" href="{{route('frontend.publication')}}">Publication</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link btn btn-warning" href="#">Endowment</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link btn btn-warning" href="#">Contact</a>
            </li>
            @if(auth()->check())
            <!-- User is logged in -->
            <li class="nav-item mx-3">
                <a class="btn btn-warning nav-link" href="#">Dashboard</a>
            </li>
            <li class="nav-item mx-3">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline-flex;">
                    @csrf
                    <button type="submit" class=" btn btn-warning nav-link">Logout</button>
                </form>
            </li>

        @else
            <!-- User is not logged in -->
            <li class="nav-item mx-3">
                <!-- Button trigger modal -->
                <button type="button" class="nav-link btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Login/Register
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Login Page</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="remember_me">
                                        <label class="form-check-label" for="remember_me">Remember Me</label>
                                        <a class="forgot " style="margin-left:20px;" href="">Forgotten Password?</a>
                                    </div>
                                    <center><button type="submit" class="btn btn-primary btn-block">Sign In</button></center>
                                </form>
                                <br>
                                <div class="text-center">
                                    <p>Don't Have an Account? <a href="{{ route('auth.register') }}" style="color:blue;">Register</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endif




          </ul>
        </div>
      </div>
    </nav>
  </section>
