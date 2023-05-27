<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="{{route('index')}}" aria-current="page">Laravel <span class="visually-hidden">(current)</span></a>
        <a class="nav-item nav-link" href="{{route('index')}}">Home</a>
        <a class="nav-item nav-link" href="{{route('posts.index')}}">Posts</a>
        @if (null !== Auth::user())
        <a class="nav-item nav-link disabled" href="{{route('posts.index')}}">{{Auth::user()->name}}</a>
        @endif
        <a class="nav-item nav-link" href="{{route('login')}}">Login</a>
        <a class="nav-item nav-link" href="#">Logout</a>  
    </div>
</nav>