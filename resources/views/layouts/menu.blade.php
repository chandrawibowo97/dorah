@if (!Auth::check())
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{asset('image/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            Dorah
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarControls" aria-controls="navbarControls" aria-expanded="false" aria-label="Buka Navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarControls">
            <ul class="navbar-nav mr-auto">
                @if ($route == 'index')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link" href="{{ route('index') }}">Beranda</a>
                </li>

                @if ($route == 'event.index')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link" href="{{ route('event.index') }}">Event</a>
                </li>

                @if ($route == 'blog.index')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link" href="{{ route('blog.index') }}">Berita</a>
                </li>

                @if ($route == 'help')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link" href="{{ route('help') }}">Bantuan</a>
                </li>
            </ul>
            <div class="form-inline">
                <a href="{{ route('login') }}" class="btn btn-light mr-sm-2">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-danger mr-sm-1">Daftar</a>
            </div>
        </div>
    </div>
</nav>
@else
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{asset('image/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            Dorah
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarControls" aria-controls="navbarControls" aria-expanded="false" aria-label="Buka Navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarControls">
            <ul class="navbar-nav">
                @if ($route == 'home')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>
                
                @if ($route == 'event.index')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link" href="{{ route('event.index') }}">Event</a>
                </li>

                @if ($route == 'blog.index')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link" href="{{ route('blog.index') }}">Berita</a>
                </li>

                @if ($route == 'help')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link" href="{{ route('help') }}">Bantuan</a>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Keluar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endif
