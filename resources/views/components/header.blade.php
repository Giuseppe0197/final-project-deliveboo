<header>
    {{-- qui andranno i link per la registrazione o login e ci sarà la parte di @auth, else, @endauth --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid d-flex">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse btn-hamb-menu" id="navbarNavAltMarkup">
                <div class="navbar-nav d-flex align-items-center">
                    <a class="nav-link " aria-current="page" href="#">Inizia</a>
                    <a class="nav-link " href="#">I nostri prodotti e servizi</a>
                    <a class="nav-link " href="#">Assistenza</a>
                    <a href="#" class="nav-link">
                        <span class="shopping-cart-header">
                            <a href="">
                                <img src="/storage/images/svgexport-2.svg" alt="shopping cart">
                                <span>
                                    {{-- TotalPrice cart --}}
                                </span>
                            </a>
                        </span>
                    </a>
                    @auth
                    
                        <a class="btn btn-return-restaurant" href="{{ route('restaurant') }}">Ritorna al tuo ristorante</a>
                        <a class="btn btn-danger exit-btn" href="{{ route('logout') }}">Log out</a>
                        
                        @else

                        <a class="register-btn" href="{{route('register.form')}}">Diventa nostro partner</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>