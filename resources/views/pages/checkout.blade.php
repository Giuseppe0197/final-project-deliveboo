@extends('layouts.main-layout')
@section('content')
    <main>
        <div class="content-contaiiner">
            
            <div class="vawe">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#006d68" fill-opacity="1" d="M0,192L1440,32L1440,0L0,0Z"></path>
                </svg>
            </div>
            <section id="checkout">
                <div class="client-info">
                    <h1>Pagamento</h1>
                    <form action="#" id="payment-form">
                        <input type="text" name="name" placeholder="Nome" required>
                        <input type="text" name="lastname" placeholder="Cognome" required>
                        <input type="text" name="address" placeholder="es. Via Veneto 22, Milano" required>
                        <input type="email" name="email" placeholder="Indirizzo email" required>
                        <input type="text" name="phone" placeholder="Cellulare (0039...)" required>
                        <label for="total-price">Totale</label>
                        {{-- inerire totale ordine  --}}
                    </form>
                </div>
    
                <div class="payment-card"> 
                    
                </div>

                {{-- AGGIUNGERE PULSANTE CHE TI RIPORTA INDIETRO, vediamo se si può --}}
                
                {{-- Riepilogo carrello --}}
                <div class="container-cart">

                    <h3 id="title-shopping-cart-checkout">Carrello</h3>

                    @foreach ($cart as $product)  

                    <div class="container-card-cart">

                        <div class="container-quantity">
                            {{-- Quantità piatto --}}
                            <span>
                                {{ $product["quantity"] }}x
                            </span>
                        </div>
    
                        <div class="container-info-dish-cart">
    
                            <!-- Nome piatto -->
                            <span class="container-name-dish">
                                {{ $product["name"] }}
                            </span>
    
                            <!-- Descrizione piatto -->
                            <div class="container-description">
                                {{ $product["description"] }}
                            </div>
                        </div>
    
                        <div class="container-price">
    
                            {{-- Prezzo piatto --}}
                            <span>
                                {{ number_format($product["price"], 2) }} &euro;
                            </span>
                        </div>
                    </div>

                    @endforeach

                    <div class="container-totalPrice d-flex justify-content-between">

                        <span>
                            Totale:
                        </span>

                        {{-- Prezzo totale carrello --}}
                        <span>
                            {{ $totalPrice }} &euro;
                        </span>
                    </div>
                </div>
    
            </section>
        </div>
    </main>
    <script type="application/javascript">
        var cartbtn = document.querySelector('.shopping-cart-header a span');
        cartbtn.innerHTML = ({{ $totalPrice }}).toFixed(2) + ' &euro;';
    </script>
@endsection