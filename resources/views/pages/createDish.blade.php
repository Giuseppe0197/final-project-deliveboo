@extends('layouts.main-layout')
@section('content')

    <section class="container py-4">
        <h1>
            Inserisci nuovo piatto
        </h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form
            action="{{ route('dish.store') }}" 
            method="POST"
            enctype="multipart/form-data">

            @method("POST")
            @csrf

            <label for="name">Nome</label><br>
            <input type="text" name="name" placeholder="Inserisci nome"><br>
            <br>

            <label for="description">Descrizione</label><br>
            <textarea name="description" cols="50" rows="10"></textarea><br>
            <br>

            <label for="type">Tipo di piatto</label><br>
            <select name="type" id="type-select"><br>
                <option value="">--Scegli una tipologia di piatto--</option>
                <option value="Antipasti">Antipasto</option>
                <option value="Primi">Primo</option>
                <option value="Secondi">Secondo</option>
                <option value="Dolci">Dolce</option>
                <option value="Pizze">Pizza</option>
                <option value="Sushi">Sushi</option>
                <option value="Fritti">Fritti</option>
                <option value="Specialità">Specialità</option>
                <option value="Insalate">Insalata</option>
                <option value="Riso">Riso</option>
                <option value="Hamburger">Hamburger</option>
                <option value="Kebab">Kebab</option>
                <option value="Bibite">Bibite</option>
            </select><br>
            <br>

            <label for="price">Prezzo</label><br>
            <input type="number" name="price" step=".01" placeholder="Inserisci prezzo"><br>
            <br>

            <label for="image">Immagine</label><br>
            <input type="file" name="image"><br>
            <br>

            <label for="availability">Visibile</label><br>
            <input type="radio" name="availability" value="1" checked>
            <label for="sì">Sì</label>
            <input type="radio" name="availability" value="0">
            <label for="no">No</label><br>
            <br>

            <input class="btn btn-primary p-2 m-1"  type="submit" value="AGGIUNGI">
        </form>
    </section>
    
@endsection