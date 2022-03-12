@extends('layouts.main-layout')
@section('content')

    <div class="jumbotron-deliveboo">
        <div class="container">
            <div class="d-flex row-cols-2">
                <div class="col">
                    <div class="d-flex flex-column">
                        <span class="title-jumbo">
                            I piatti che ami, a domicilio.
                        </span>
                    </div>
                </div>
                <div class="col text-center pt-3">
                    <img src="/storage/images/jumbotron.svg" alt="jumbo-img2">
                    <div class="container-hashtag">
                        <div>
                            <span class="text-center">
                                #aCasaTuaConDeliveboo
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('error'))
        <div class="alert alert-danger alert-payment-danger">
            {{ session()->get('error') }}
            <a class="btn btn-danger" href="{{ route('home') }}">OK</a>
        </div>
    @endif
    
    @if(session()->has('success'))
        <div class="alert alert-success alert-payment-success">
            {{ session()->get('success') }}
            <span>
                Ti abbiamo inviato una mail con il riepilogo del tuo ordine!
            </span>
            <a class="btn btn-success" href="{{ route('home') }}">OK</a>
        </div>
    @endif

    <search-component :restaurants_default = "{{ json_encode($restaurantDef) }}"
    ></search-component>

    <div class="favourite-plates">

        <div class="container px-4 container-restaurants-homepage">

            <div class="title-home-section">
                <h2>I tuoi piatti preferiti, consegnati da noi.</h2>
            </div>

            <div class="plates-add-container row gx-5 text-center">
                <div class="col-md-4 col-sm-6">
                    <img class="img-home-restaurants" src="/storage/images/mcdonald.png" alt="img mcdonald">
                    <span>McDonald's</span>
                </div>

                <div class="plates-add col-md-4 col-sm-6 text-center">
                    <img class="img-home-restaurants" src="/storage/images/kfc.png" alt="img kfc">
                    <span>KFC</span>
                </div>

                <div class="plates-add col-md-4 col-sm-6 text-center">
                    <img class="img-home-restaurants" src="/storage/images/burgerking.png" alt="img burgerking">
                    <span>Burger King</span>
                </div>

                <div class="plates-add col-md-4 col-sm-6 text-center">
                    <img class="img-home-restaurants" src="/storage/images/sushi.png" alt="img sushi">
                    <span>Sushi House</span>
                </div>
                
                <div class="plates-add col-md-4 col-sm-6">
                    <img class="img-home-restaurants" src="/storage/images/bakery.png" alt="img bakery">
                    <span>Bakery</span>
                </div>

                <div class="plates-add col-md-4 col-sm-6 text-center">
                    <img class="img-home-restaurants" src="/storage/images/piadineria.png" alt="img piadineria">
                    <span>Piadineria</span>
                </div>
            </div>
        </div>
    </div>

    <div class="download-app-deliveroo">

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-sm-12 app-download text-center">

                    <h2>Ordina direttamente dal tuo telefono!</h2>
                    <p>Scarica la nostra applicazione per Smartphone</p>

                    <button class="android"><img src="/storage/images/google-play.png" alt=""> Google Play</button>

                    <button class="apple"><img src="/storage/images/apple.png" alt=""> App Store</button>

                </div>

                <div class="col-md-6 col-sm-12 app-download text-center">

                    <img class="deliveroo-image" src="/storage/images/app-image.png" alt="image app">

                </div>
            </div>
        </div>

    </div>

    <div class="work-with-us">

        <div class="container text-center">

            <h3>Lavora Con Deliveboo</h3>

            <div class="row">

                <div class="col-md-4">
                    <div class="work work-1">
                        <div class="ms-container-img-work">
                            <img class="img-def" src="/storage/images/riders.jpg" alt="riders">

                            <div>
                                <img class="img-polygon" src="/storage/images/svgexport-6.svg" alt="polygon">
                            </div>
                        </div>


                        <div class="container-info-work">
                            <h2>Rider</h2>
                            <p>
                                Diventa un rider: flessibilità, ottimi guadagni e un mondo di vantaggi per te.
                            </p>
                            <button class="work-button">Unisciti a noi</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="work work-2">
                        <div class="ms-container-img-work">
                            <img class="img-def" src="/storage/images/ciambella.jpg" alt="ristoranti">

                            <div>
                                <img class="img-polygon" src="/storage/images/svgexport-7.svg" alt="polygon2">
                            </div>
                        </div>


                        <div class="container-info-work">
                            <h2>Ristoranti</h2>
                            <p>
                                Diventa partner di Deliveroo e raggiungi sempre più clienti. Ci occupiamo noi della consegna, così che la tua unica preoccupazione sia continuare a preparare il miglior cibo.
                            </p>
                            <a href="#restaurants" class="btn work-button">Scopri di pi&ugrave;</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="work work-3">

                        <div class="ms-container-img-work">
                            <img class="img-def" src="/storage/images/lavora-img-3.jpg" alt="lavora con noi">

                            <div>
                                <img class="img-polygon" src="/storage/images/svgexport-8.svg" alt="polygon3">
                            </div>
                        </div>


                        <div class="container-info-work">
                            <h2>Lavora con noi</h2>
                            <p>
                                La nostra missione è trasformare il modo in cui le persone mangiano. È un obiettivo ambizioso, come noi, e ci servono persone che ci aiutino a raggiungerlo.
                            </p>
                            <a href="{{route('register.form')}}" class="btn work-button">Diventa nostro partner</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection