<header>

    {{-- qui andranno i link per la registrazione o login e ci sarà la parte di @auth, else, @endauth --}}

    @auth

    {{-- <h1>Benvenuto: {{ Auth::user() -> name }}</h1> --}}
    <div class="nav-section">

        {{-- logo + lingua --}}
        <div>

            <img src="" alt="">
            <img src="" alt="">

        </div>

        {{-- nav --}}
        <div>

            <a href="">Inizia</a>
            <a href="">I nostri prodotti e servizi</a>
            <a href="">Assistenza</a>
            <a class="btn btn-danger exit-btn" href="{{ route('logout') }}">Log out</a>

        </div>

    </div>
    
    
    
        
    @else

    {{-- nav menù --}}
    <div class="nav-section">

        {{-- logo + lingua --}}
        <div>

            <img src="" alt="">
            <img src="" alt="">

        </div>

        {{-- nav --}}
        <div>

            <a href="">Inizia</a>
            <a href="">I nostri prodotti e servizi</a>
            <a href="">Assistenza</a>
            <a class="register-btn" href="{{route('register.form')}}">Diventa nostro partner</a>

        </div>

    </div>  
    

    @endauth
    
</header>