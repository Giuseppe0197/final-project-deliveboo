@extends('layouts.main-layout')
@section('content')
    <main id="main-checkout">
        <div class="content-container container">
            <section id="checkout">
                <h1>Pagamento</h1>

                <div class="form-container row g-5 justify-content-around">
        
                    <div class="payment-card col-md-6">
                        <form id="payment-form"
                        action="{{ route('store.client.info')}}"
                        method="POST">

                            @method("POST")
                            @csrf
            
                            <input type="text" name="name" placeholder="Nome" required>
                            <input type="text" name="lastname" placeholder="Cognome" required>
                            <input type="text" name="address" placeholder="es. Via Veneto 22, Milano" required>
                            <input type="email" name="email" placeholder="Indirizzo email" required>
                            <input type="text" name="phone" placeholder="Cellulare (0039...)" required>
                            {{-- inerire totale ordine  --}}
                        
                            <div>
                                <div id="dropin-container"></div>
                                <div class="ms-button">
                                    <button id="submit-button">Procedi con il pagamento</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- AGGIUNGERE PULSANTE CHE TI RIPORTA INDIETRO, vediamo se si può --}}
                    {{-- Riepilogo carrello --}}

                    <div class="container-cart col-md-5">

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
                </div>
            </section>
        </div>
    </main>
    <script type="application/javascript">
        var cartbtn = document.querySelector('.shopping-cart-header a span');
        cartbtn.innerHTML = ({{ $totalPrice }}).toFixed(2) + ' &euro;';

        var button = document.querySelector('#submit-button');
        
        braintree.dropin.create({
          authorization: "{{ Braintree\ClientToken::generate() }}",
          container: '#dropin-container'
        }, function (createErr, instance) {
          button.addEventListener('click', function () {
            instance.requestPaymentMethod(function (err, payload) {
              $.get('{{ route('payment.process') }}', {payload}, function (response) {
                if (response.success) {
                  alert('Payment successfull!');
                } else {
                  alert('Payment failed');
                }
              }, 'json');
            });
          });
        });
     </script>
@endsection