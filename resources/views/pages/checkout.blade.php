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
    
            </section>
        </div>
    </main>
@endsection