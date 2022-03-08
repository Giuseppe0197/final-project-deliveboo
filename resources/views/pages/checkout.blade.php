@extends('layouts.main-layout')
@section('content')
    <main>
        <div class="content-container container">
            <section id="checkout">
                <h1>Pagamento</h1>

                <div class="form-container row g-5 justify-content-around">
                    {{-- <div class="client-info col-md-6">
                        
                    </div> --}}
        
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
                            <label for="total-price">Totale</label>
                            {{-- inerire totale ordine  --}}
                        
                            <div>
                                <div id="dropin-container"></div>
                                <div class="ms-button">
                                    <button id="submit-button">Procedi con il pagamento</button>
                                </div>
                            </div>
                        </form>

                        
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script type="application/javascript">
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