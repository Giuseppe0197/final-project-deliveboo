<header>

    {{-- qui andranno i link per la registrazione o login e ci sarà la parte di @auth, else, @endauth --}}

    @auth

    {{-- <h1>Benvenuto: {{ Auth::user() -> name }}</h1> --}}
    <a class="btn btn-danger" href="{{ route('logout') }}">DISCONNETTITI</a>
    
    
        
    @else

    <a href="{{route('register.form')}}">Registrati o fai il Login</a>

    @endauth
    
</header>