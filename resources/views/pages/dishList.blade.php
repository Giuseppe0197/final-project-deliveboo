@extends('layouts.main-layout')
@section('content')
    
    <div class="container-dish">
        <h2 class="w-100 text-center mb-4"> Dish list </h2>

        @foreach ($dishes as $dish)
            <div class="card" style="width: 18rem;">
                <img src="https://www.nonsprecare.it/wp-content/uploads/2016/10/ricetta-pizza-con-pasta-madre.jpg" alt="test">
                {{-- <img src="images/{{ $dish->image }}" class="card-img-top" alt="{{ $dish->name }}"> --}}
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
                        <a class="btn btn-primary" href="#">MODIFICA</a> {{-- Inserire la rotta per MODIFICARE IL PIATTO --}}
                        <a class="btn btn-danger" href="{{ route('dish.hide', $dish->id) }}">ELIMINA</a> {{-- Inserire la rotta per ELIMINARE/HIDE IL PIATTO --}}
                    </li>
                </ul>
            </div>
        @endforeach
    </div>

@endsection 