<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('home')}}">Home</a>
                </li>
                @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('product/create')}}">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('category/create')}}">Add Category</a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <form class="d-flex m-auto">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0 mx-5">
                @auth()
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(isset(auth()->user()->is_admin) && auth()->user()->is_admin == 1)
                                <li>
                                    <a class="dropdown-item" href="{{ route('product.dashboard', auth()->user()->username) }}">Dashboard</a>
                                </li>
                            {{--                        <li><a class="dropdown-item" href="#">Another action</a></li>--}}
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="dropdown-item" href="{{route('logout')}}"
                                       onclick="event.preventDefault();
                            this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest()
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('register')}}">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
