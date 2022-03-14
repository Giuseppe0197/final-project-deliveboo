@extends('layouts.main-layout')

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <main id="main-register">
        <div class="container-register">
            <div class="container auth-page d-flex flex-wrap row-cols-lg-2 row-cols-md-1">
    
                {{-- FORM REGISTRAZIONE --}}
                <div class="register-form px-2">
                    <form action="{{route('register')}}" method="post" enctype="multipart/form-data"
                    >
    
                        @method('post')
                        @csrf
                            
                        <h2 class="text-center">Diventa subito partner di Deliveroo</h2>
    
                        <div class="d-flex">
                            <input class="mt-2 w-50 mr-2 input-text" type="text" name="restaurant_name" placeholder="Inserisci il nome dell'attività">
                            <input class="mt-2 w-50 input-text" type="text" name="p_iva" placeholder="Inserisci la partita Iva">
                        </div>
    
                        <input class="mt-2 w-100 input-text" type="text" name="address" placeholder="Inserisci l'indirizzo">
    
                        {{-- CHECKBOX --}} 
                        <div class="my-2 checkbox-container w-100">
                            <p class="text-center">Spunta la tipologia del tuo ristorante</p>
                            @foreach ($categories as $category)
                                <label for="category" class="checkboxesSearch"> {{$category-> name }}
                                    {{-- <div class="container-checkbox d-inline-block"> --}}
                                        <input type="checkbox" name="categories[]" value="{{$category -> id}}" class="category-check">
                                        <span class="checkmark"></span>
                                        {{-- <span class="mr-1">{{$category-> name }}</span>  --}}
                                    {{-- </div> --}}
                                </label>
                            @endforeach
                        </div> 
                        
                        <label class="mt-2" for="image">Inserisci l'immagine</label>
                        <input type="file" name="image">
    
                        <div class="d-flex">
                            <input class="mt-2 mr-2 w-50 input-text" type="text" name="restaurant_phone" placeholder="Inserisci il numero di telefono">
                            <input class="mt-2 w-50 input-text" type="text" name="owner_name" placeholder="Inserisci il tuo nome">
                        </div>
    
    
                        <input class="mt-2 w-100 input-text" type="text" name="email" placeholder="Inserisci la tua mail">
    
                        <input class="mt-2 w-100 input-text" type="password" name="password" placeholder="Inserisci una password">
                        <input class="mt-2 w-100 input-text" type="password" name="password_confirmation" placeholder="Conferma la password">
    
                        <div class="text-center"> 
                            <input class="btn mb-5 my-2 register-button" type="submit" value="REGISTER">
                        </div>
                    </form>
                </div>
                
                <div class="login-form text-center px-2">
                        {{-- FORM LOGIN --}}
                    <form action="{{route('login')}}" method="post">
    
                        @method('post')
                        @csrf
    
                        <h2 class="text-center">Login</h2>
                        <input class="mt-2 input-text w-50" type="text" name="email" placeholder="Inserisci la tua mail">
    
                        <input class="mt-2 input-text w-50" type="password" name="password" placeholder="Inserisci la tua password">
                        <div class="text-center"> 
                            <input class="btn mt-3 my-2 register-button" type="submit" value="LOGIN">
                        </div>
                        
                    </form>
                    <div class="img col d-none d-lg-block">
                        <img class="mySlides fade" src="/storage/images/1tramonto.jpg" alt="img1">
                        <img class="mySlides fade" src="/storage/images/2rest.jpg" alt="img2">
                        <img class="mySlides fade" src="/storage/images/3rest.jpg" alt="img3">
                        <img class="mySlides fade" src="/storage/images/4rest.jpg" alt="img4">
                        <img class="mySlides fade" src="/storage/images/5rest.jpg" alt="img5">
                        <img class="mySlides fade" src="/storage/images/6rest.jpg" alt="img6">
                    </div>
                </div>    

            </div>
        </div>
    
        {{-- sezione publicitaria partner deliveroo --}}
        <div class="cont-partner">
            <h1>Perch&eacute; diventare un partner di Deliveboo?</h1>
    
            <div class="card-partner">
                <div class="adv-partner-card">
                    <h4>Aumenta le vendite</h4>
                    <img src="/storage/images/card.png" alt="">
                    <p>Affidati a strumenti di marketing efficaci per ricevere pi&ugrave; ordini.</p>
                </div>
    
                <div class="adv-partner-card">
                    <h4>Espandi la tua clientela</h4>
                    <img src="/storage/images/hands.png" alt="">
                    <p>Attira nuovi clienti in zona e falli tornare a ordinare.</p>
                </div>
    
                <div class="adv-partner-card">
                    <h4>Approfitta dei nostri servizi</h4>
                    <img src="/storage/images/statistic.png" alt="">
                    <p>Abbiamo gli strumenti di crescita, assistenza e risparmio giusti per la tua attivit&agrave;</p>
                </div>
            </div>
    
            <hr class="line">
        </div>
    
    
        {{-- partner section --}}
        <div class="partner-section">
            <h1>Il Partner per le consegne a domicilio pi&ugrave; apprezzato in Italia</h1>
            
            <p><i>Tantissimi ristoranti si affidano a noi in tutto  il mondo</i></p>
    
            <div class="partner-restaurant">
                <div class="partner-description">
                    <div class="image">
                        <img src="/storage/images/old-wild-west.png" alt="logo">
                    </div>
                    <p>La partnership con Deliveboo è decisamente positiva e divenuta nel tempo molto collaborativa.
                        Propositività, reattività, disponibilità alle richieste ed esigenze del Gruppo e dei Brands.
                        Mindset e vision di mercato aperte e vincenti.</p>
                </div>
    
                <div class="partner-image">
                    <img src="/storage/images/partner-pic.jpg" alt="">
                </div>
            </div>
    
            <hr class="line">
        </div>
    
    
        {{-- sezione prezzi --}}
        <div class="prize-container">
            <h1> Scegli i prodotti e fissa i prezzi secondo le tue esigenze</h1>
    
            <h3>Carica il men&ugrave; e potrai ricevere ordini in soli 7 giorni</h3>
    
            <p>Ti invieremo tutto il necessario per cominciare: una stampante multifunzionale, un tablet e materiali brandizzati Deliveboo per promuovere la tua attivit&agrave;.</p>
    
            <ul>
                <li>Pagamenti facili e veloci</li>
                <li>Assistenza per tablet 24 ore su 24</li>
                <li>Risparmia su foto, siti web e scorte</li>
                <li>Marketing e promozione del tuo ristorante</li>
                <li>Usa la rete di rider Deliveboo o consegna autonomamente</li>
                <li>Sconti sul packaging: confezioni create su misura per ogni piatto o tipo di cucina</li>
                <li>Su <strong>Restaurant Hub</strong> trovi informazioni e dati utili a trovare nuovi clienti e fidelizzarli</li>
            </ul>
        </div>
    
        {{-- sezione come funziona deliveroo --}}
        <div class="how-to-section">
            <h1>Come funziona Deliveboo?</h1>
    
            <p><i>Basta qualche per cominciare a ricevere ordini su Deliveboo</i></p>
    
            <div class="how-to-card">
                <div class="ms-card">
                    <h3>Iscriviti</h3>
                    <img class="img-class" src="/storage/images/store.png" alt="">
                    <p>Inviaci informazioni sul tuo ristorante e diventa nostro partner</p>
                </div>
    
                <div class="ms-card">
                    <h3>Prepara l'occorrente</h3>
                    <img class="img-calendar" src="/storage/images/calendar.png" alt="">
                    <p>Carica il men&ugrave;, prenota il servizio fotografico e ricevi il tablet</p>
                </div>
    
                <div class="ms-card">
                    <h3>Consegna</h3>
                    <img class="img-class" src="/storage/images/astore.svg" alt="">
                    <p>Accendi il tablet e inizia a seguire gli ordini su Restaurant Hub</p>
                </div>
            </div>
        </div>

    </main>
@endsection