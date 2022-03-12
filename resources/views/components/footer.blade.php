<footer>
    <div class="container py-3">
        {{-- footer nav  --}}
        <div class="nav-footer row g-5 justify-content-around">
            <div class="col-md-6 p-2 col-lg-3">
                <div class="footer-card">
                    <h5>Scopri Deliveboo</h5>
                    <ul>
                        <li><a href="">Investitori</a></li>
                        <li><a href="">Chi siamo</a></li>
                        <li><a href="">Ristoranti</a></li>
                        <li><a href="">Altro</a></li>
                        <li><a href="">Pressroom</a></li>
                        <li><a href="">Il nostro blog</a></li>
                        <li><a href="">Programmazione</a></li>
                        <li><a href="">Design</a></li>
                        <li><a href="">Lavora con noi</a></li>
                        <li><a href="">Diventa nostro partner</a></li>
                    </ul>
                </div>
            </div>
    
            <div class="col-md-6 p-2  col-lg-3">
                <div class="footer-card">
                    <h5>Note legali</h5>
                    <ul>
                        <li><a href="">Termini & condizioni</a></li>
                        <li><a href="">Informativa sulla privacy</a></li>
                        <li><a href="">Cookies</a></li>
                    </ul>
                </div>
                
            </div>
    
            <div class="col-md-6 p-2  col-lg-3">
                <div class="footer-card">
                    <h5>Aiuto</h5>
                    <ul>
                        <li><a href="">Contatti</a></li>
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Tipo di cucina</a></li>
                        <li><a href="">Mappa del sito</a></li>
                    </ul>
                </div>
                
            </div>
    
            <div class="col-md-6 p-2 col-lg-3">
                <div class="footer-card">
                    @auth
                        <h5>Porta Deliveboo con te</h5>
                        <img id="app-store" src="/storage/images/app-store-badges-it.svg" alt="">

                    @else
                        <h5>Vuoi il tuo ristorante su Deliveboo?</h5>
                        <ul>
                            <li class="subscribe"><a class="register-btn" href="{{route('register.form')}}">Iscriviti</a></li>
                        </ul>
                    @endauth
                </div>
            </div>
        </div>
        
        {{-- social channels  --}}
        <nav class="social-channels">
            <ul>
                <li>
                    <a href="" ><img class="fb" src="/storage/images/fb-logo.svg" alt="facebook logo"></a>
                </li>
                <li>
                    <a href="" class="twitter"><img src="/storage/images/twitter-logo.svg" alt="twitter logo"></a>
                </li>
                <li>
                    <a href="" class="ig"><img src="/storage/images/ig-logo.svg" alt="instagram logo"></a>
                </li>
            </ul>

            <p>
                &#169; 2022 DeliveBoo
            </p>
        </nav>

    </div>


</footer>