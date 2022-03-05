@extends('layouts.main-layout')

@section('content')

<div class="container-register">
<div class="auth-page">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            {{-- FORM REGISTRAZIONE --}}
    <div class="register-form">
        <form action="{{route('register')}}" method="post" enctype="multipart/form-data"
        >

            @method('post')
            @csrf
                
            <h2>Diventa subito partner di Deliveroo</h2>
            <label class="my-2" for="email">Inserisci la mail:</label><br>
            <input class = "w-100 input-text" type="text" name="email" placeholder="Inserisci la tua mail"><br>

            <label class="my-2" for="password">Inserisci una password:</label><br>
            <input class = "w-100 input-text" type="password" name="password" placeholder="Inserisci una password"><br>

            <label class="my-2" for="password_confirmation">Conferma la password:</label><br>
            <input class = "w-100 input-text" type="password" name="password_confirmation" placeholder="Conferma la password"><br>

            <label class="my-2" for="restaurant_name">Nome attivit&aacute;</label><br>
            <input class = "w-100 input-text" type="text" name="restaurant_name" placeholder="Inserisci il nome dell'attività"><br>

            <label class="my-2" for="owner_name">Nome proprietario</label><br>
            <input class = "w-100 input-text" type="text" name="owner_name" placeholder="Inserisci il tuo nome"><br>

            <label class="my-2" for="restaurant_phone">Telefono dell'attivit&aacute;</label><br>
            <input class = "w-100 input-text" type="text" name="restaurant_phone" placeholder="Inserisci il numero di telefono"><br>

            <label class="my-2" for="address">Inserisci l'indirizzo</label><br>
            <input class = "w-100 input-text" type="text" name="address" placeholder="Inserisci l'indirizzo"><br>

            <label class="my-2" for="p_iva">Inserisci la partita Iva</label><br>
            <input class = "w-100 input-text" type="text" name="p_iva" placeholder="Inserisci la partita Iva"><br>


            <label class="my-2" for="image">Inserisci l'immagine</label><br>
            <input type="file" name="image"><br>

                {{-- CHECKBOX --}}
            <div class="my-2 checkbox-container w-100 mt-4">
                @foreach ($categories as $category)
                    <input type="checkbox" name="categories[]" value="{{$category -> id}}">
                    <span class="mr-1">{{$category-> name }}</span> 
                @endforeach<br>
            </div> 

            <input class="btn mb-5 my-2 register-button" type="submit" value="REGISTER">
            
        </form>
    </div>
    <div class="login-form">
            {{-- FORM LOGIN --}}
        <form action="{{route('login')}}" method="post">

            @method('post')
            @csrf

            <h2>Login</h2>
            <label class="my-2" for="email">Inserisci la tua mail:</label><br>
            <input class="input-text w-100" type="text" name="email" placeholder="Inserisci la tua mail"><br>

            <label class="my-2" for="password">Inserisci la tua password:</label><br>
            <input class="input-text w-100" type="password" name="password" placeholder="Inserisci la tua password"><br>
            <input class="btn mt-3 my-2 register-button" type="submit" value="LOGIN">
        </form>
    </div>    
    
    </div>
</div>

    {{-- sezione publicitaria partner deliveroo --}}

    <div class="cont-partner">

        <h1>Perch&eacute; diventare un partner di Deliveboo?</h1>

        <div class="card-partner">

            <div class="adv-partner-card">
                <h4>Amenta le vendite</h4>
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
        <p>Tantissimi ristoranti si affidano a noi in tutto  il mondo</p>

        <div class="partner-restaurant">

            <div class="partner-description">
                <img src="/storage/images/old-wild-west.png" alt="logo">
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

        <h2> Segli i prodotti e fissa i prezzi secondo le tue esigenze</h2>

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
        <p>Basta qualche per cominciare a ricevere ordini su Deliveboo</p>

        <div class="how-to-card">

            <div class="w-25">
                <h3>Iscriviti</h3>
                <img class="img-class" src="/storage/images/store.png" alt="">
                <p>Inviaci informazioni sul tuo ristorante e diventa nostro partner</p>
            </div>
            <div class="w-25">
                <h3>Prepara l'occorrente</h3>
                <img class="img-calendar" src="/storage/images/calendar.png" alt="">
                <p>Carica il men&ugrave;, prenota il servizio fotografico e ricevi il tablet</p>
            </div>
            <div class="w-25">
                <h3>Consegna</h3>
                <img class="img-class" src="/storage/images/astore.svg" alt="">
                <p>Accendi il tablet e inizia a seguire gli ordini su Restaurant Hub</p>
            </div>

        </div>

    </div>
    
@endsection