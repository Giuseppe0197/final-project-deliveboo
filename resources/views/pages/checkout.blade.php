@extends('layouts.main-layout')
@section('content')
    <main>
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
    </main>
@endsection