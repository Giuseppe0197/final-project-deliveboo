@extends('layouts.main-layout')
@section('content')
<main id="main-checkout">
    <div class="container">
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="content-container container">
        <section id="checkout">
            <h1>Pagamento</h1>

            <div class="form-container row g-5 justify-content-around">
    
                <div class="payment-card col-md-6">
                    <form  action="{{ route('payment') }}"  data-cc-on-file="false" data-stripe-publishable-key="pk_test_iS5sLGz5CONWxJ8KHhBzHHvD" name="frmStripe" id="frmstripe" method="post">

                        @method("POST")
                        @csrf
        
                        <input type="text" name="name" placeholder="Nome" required>
                        <input type="text" name="lastname" placeholder="Cognome" required>
                        <input type="text" name="address" placeholder="es. Via Veneto 22, Milano" required>
                        <input type="email" name="email" placeholder="Indirizzo email" required>
                        <input type="text" name="phone" placeholder="Cellulare (0039...)" required>

                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <label>Name on Card</label>
                                <input class="form-control" size="4" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <label>Card Number</label>
                                <input autocomplete="off" class="form-control" size="20" type="text" name="card_no" value="4111 1111 1111 1111">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 form-group">
                                <label>CVC</label>
                                <input autocomplete="off" class="form-control" placeholder="ex. 311" size="3" type="text" name="cvv" value="222">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label>Expiration</label>
                                <input class="form-control" placeholder="MM" size="2" type="text" name="expiry_month" value="03">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label> </label>
                                <input class="form-control" placeholder="YYYY" size="4" type="text" name="expiry_year" value="2023">
                            </div>
                        </div>
                        <div class="row d-none">
                            <div class="col-lg-12 form-group">
                                <label>Total Price</label>
                                <input class="form-control" size="2" type="number" name="total_price" value="{{ $totalPrice }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <button class="form-control btn btn-success submit-button" type="submit" style="margin-top: 10px;">Paga</button>
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
                        <span>Totale: </span>
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

</script>
@endsection