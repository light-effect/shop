<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ '/category' }}">All products</a>
                    @foreach(\App\Category::all() as $category)
                        <a class="dropdown-item" href="{{ '/category/' . $category->id }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        @if (\Illuminate\Support\Facades\Auth::guest() === true)
            <ul class="navbar-nav mr-auto float-right">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/sign-in') }}">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/sign-up') }}">Sign up</a>
                </li>
            </ul>
        @else
            <ul class="navbar-nav mr-auto float-right">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Hello, {{ \Illuminate\Support\Facades\Auth::user()->first_name }}.</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                </li>
            </ul>
        @endif
    </div>
</nav>
