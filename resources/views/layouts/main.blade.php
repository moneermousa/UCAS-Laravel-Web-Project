<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <title>Online Market - @yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark p-3">
        <a class="navbar-brand" href="{{ route('home') }}"><span class="text-danger">Online</span> Market</a>


        <button class="navbar-toggler"
                type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavbar"
                aria-controls="collapsibleNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            @guest
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}"><i class="fa-solid fa-cart-shopping"></i> Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
            </ul>
            @endguest

            @auth
            <ul class="navbar-nav">
                @if(auth()->user()?->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.create') }}"><i class="fa-solid fa-plus"></i> Add Product</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}"><i class="fa-solid fa-cart-shopping"></i> Products</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.index') }}"><i class="fa-solid fa-box"></i> Orders</a>
                </li>

                @if(auth()->user()?->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}"><i class="fa-solid fa-users"></i> Users</a>
                    </li>
                @endif

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">
                            <i class="fas fa-power-off"></i> Logout ({{ Auth::user()->name }})
                        </button>
                    </form>
                </li>
            </ul>
            @endauth
        </div>  
    </nav>


    @yield('main_content')

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('img-preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>