<header>
    {{-- qui andranno i link per la registrazione o login e ci sarà la parte di @auth, else, @endauth --}}
    <nav class="navbar navbar-expand-lg navbar-light position-fixed ">
        <div class="container-fluid d-flex align-items-center">
            <a class="navbar-brand align-items-center" href="{{ route('home') }}">
                <img class="img-logo" src="/storage/images/logo-deliveboo-fullcolor.png" alt="DeliveBoo logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav d-flex align-items-end hamb-menu-clicked">
                    <a class="nav-link" aria-current="page" href="{{route('home')}}">Inizia</a>
                    <a class="nav-link" href="#">I nostri prodotti e servizi</a>
                    <a class="nav-link" href="#">Assistenza</a>
                    
                    <span class="mx-2 my-2 shopping-cart-header">
                        <a href="">
                            <img src="/storage/images/svgexport-2.svg" alt="shopping cart">
                            <span>
                                {{-- TotalPrice cart --}}
                            </span>
                        </a>
                    </span>
                    
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