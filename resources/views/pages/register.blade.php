@extends('layouts.main-layout')

@section('content')

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
        <form action="{{route('register')}}" method="post" enctype="multipart/form-data"
        >

            @method('post')
            @csrf
                
            <h3>Registrati</h3>
            <label class="my-2" for="email">Inserisci la mail:</label><br>
            <input type="text" name="email" placeholder="Inserisci la tua mail"><br>

            <label class="my-2" for="password">Inserisci una password:</label><br>
            <input type="password" name="password" placeholder="Inserisci una password"><br>

            <label class="my-2" for="password_confirmation">Conferma la password:</label><br>
            <input type="password" name="password_confirmation" placeholder="Conferma la password"><br>

            <label class="my-2" for="restaurant_name">Nome attivit&aacute;</label><br>
            <input type="text" name="restaurant_name" placeholder="Inserisci il nome dell'attività"><br>

            <label class="my-2" for="owner_name">Nome proprietario</label><br>
            <input type="text" name="owner_name" placeholder="Inserisci il tuo nome"><br>

            <label class="my-2" for="restaurant_phone">Telefono dell'attivit&aacute;</label><br>
            <input type="text" name="restaurant_phone" placeholder="Inserisci il numero di telefono"><br>

            <label class="my-2" for="address">Inserisci l'indirizzo</label><br>
            <input type="text" name="address" placeholder="Inserisci l'indirizzo"><br>

            <label class="my-2" for="p_iva">Inserisci la partita Iva</label><br>
            <input type="text" name="p_iva" placeholder="Inserisci la partita Iva"><br>

            <label class="my-2" for="image">Inserisci l'immagine</label><br>
            <input type="file" name="image"><br>

                {{-- CHECKBOX --}}
            <div class="my-2 checkbox-container">
                @foreach ($categories as $category)
                    <input type="checkbox" name="categories[]" value="{{$category -> id}}">
                    {{$category-> name}} 
                @endforeach<br>
            </div> 

            <input class="btn btn-success my-2" type="submit" value="REGISTER">
            
        </form>

            {{-- FORM LOGIN --}}
        <form action="{{route('login')}}" method="post">

            @method('post')
            @csrf

            <h3>Login</h3>
            <label class="my-2" for="email">Inserisci la tua mail:</label><br>
            <input type="text" name="email" placeholder="Inserisci la tua mail"><br>

            <label class="my-2" for="password">Inserisci la tua password:</label><br>
            <input type="password" name="password" placeholder="Inserisci la tua password"><br>
            <input class="btn btn-success my-2" type="submit" value="LOGIN">
        </form>

    
    </div>
    
@endsection