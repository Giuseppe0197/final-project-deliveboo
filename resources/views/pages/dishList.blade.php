@extends('layouts.main-layout')
@section('content')
    

    <div class="container-dish">
        
        <h1 class="w-100 text-center mb-4"> Dishes list </h1>
        
        <div class="container-new-dish w-100">
            <a href="{{ route('dish.create', $restaurant->id) }}">
                Aggiungi un piatto nel tuo ristorante
            </a>
        </div>

        @foreach ($dishes as $dish)
            <div class="card" style="width: 18rem;">
                {{-- Gesgione immagini (Se la lunghezza del testo dell'immagine è uguale a 21, quindi le immagini che andremo ad inserire, allora mette l'immagine che salviamo, altrimenti mette un'immagine di default) --}}
                @if (strlen($dish->image) > 18 && strlen($dish->image) < 24 )
                    <img src="/storage/images/{{ $dish->image }}" class="card-img-top" alt="{{ $dish->name }}">
                @else
                    <img src="https://www.carnisostenibili.it/wp-content/uploads/2014/10/Cibo-spazzatura-alimentazione-spazzatura.jpg" class="card-img-top" alt="image default">
                @endif
                
                <div class="card-body">
                    {{-- Nome piatto --}}
                    <h4 class="card-title">{{ $dish->name }}</h4>
                    {{-- Descrizione piatto --}}
                    <p class="card-text">{{ $dish->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    {{-- Prezzo piatto --}}
                    <li class="list-group-item">
                        <span>Prezzo:</span>
                        &euro;{{ $dish->price }} 
                    </li>
                    {{-- Tipo piatto --}}
                    <li class="list-group-item">
                        <span class="fw-bold">Tipo:</span>
                        {{ $dish->type }}
                    </li>
                    {{-- Disponibilità (Aggiungere l'icona X e V successivamente) --}}
                    <li class="list-group-item">
                        <span>Disponibilità:</span>
                        @if ($dish->availability)
                            Disponibile
                        @else 
                            Non Disponibile
                        @endif
                    </li>
                    <li class="container-action-dish list-group-item">
                        <a class="btn btn-primary" href="{{ route('dish.edit', $dish->id) }}">MODIFICA</a> {{-- Inserire la rotta per MODIFICARE IL PIATTO --}}
                        <a class="btn btn-danger" href="{{ route('dish.hide', $dish->id) }}">ELIMINA</a> {{-- Inserire la rotta per ELIMINARE/HIDE IL PIATTO --}}
                    </li>
                </ul>
            </div>
        @endforeach
    </div>

@endsection 