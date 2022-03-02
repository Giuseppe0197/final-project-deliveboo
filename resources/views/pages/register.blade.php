@extends('layouts.main-layout')

@section('content')

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


    <form action="{{route('register')}}" method="post" enctype="multipart/form-data"
    >

        @method('post')
        @csrf

        <label for="email">Inserisci la mail:</label>
        <input type="text" name="email" placeholder="Inserisci la tua mail"><br>

        <label for="password">Inserisci una password:</label>
        <input type="password" name="password" placeholder="Inserisci una password"><br>

        <label for="password_confirmation">Conferma la password:</label>
        <input type="password" name="password_confirmation" placeholder="Conferma la password"><br>

        <label for="restaurant_name">Nome attivit&aacute;</label>
        <input type="text" name="restaurant_name" placeholder="Inserisci il nome dell'attività"><br>

        <label for="owner_name">Nome proprietario</label>
        <input type="text" name="owner_name" placeholder="Inserisci il tuo nome"><br>

        <label for="restaurant_phone">Telefono dell'attivit&aacute;</label>
        <input type="text" name="restaurant_phone" placeholder="Inserisci il numero di telefono"><br>

        <label for="address">Inserisci l'indirizzo</label>
        <input type="text" name="address" placeholder="Inserisci l'indirizzo"><br>

        <label for="p_iva">Inserisci la partita Iva</label>
        <input type="text" name="p_iva" placeholder="Inserisci la partita Iva"><br>
 
        <label for="image">Inserisci l'immagine</label>
        <input type="file" name="image"><br>

        @foreach ($categories as $category)
            <input type="checkbox" name="categories[]" value="{{$category -> id}}">
            {{$category-> name}} 
        @endforeach<br>

        <input class="btn btn-success" type="submit" value="REGISTER">

    </form>

    <form action="{{route('login')}}" method="post">

        @method('post')
        @csrf

        <label for="email">Inserisci la tua mail:</label>
        <input type="text" name="email" placeholder="Inserisci la tua mail"><br>

        <label for="password">Inserisci la tua password:</label>
        <input type="password" name="password" placeholder="Inserisci la tua password"><br>
        <input class="btn btn-success" type="submit" value="LOGIN">
    </form>

</div>
    
@endsection