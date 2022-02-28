@extends('layouts.main-layout')
@section('content')

    <section>
        <form 
            action="{{ route('dish.store') }}" 
            method="POST"
            enctype="multipart/form-data">

            @method("POST")
            @csrf

            <label for="name">Nome</label><br>
            <input type="text" name="name" placeholder="Inserisci il nome del piatto"><br>
            <br>

            <label for="description">Descrizione</label><br>
            <input type="text" name="description" placeholder="Inserisci descrizione del piatto"><br>
            <br>

            <label for="type">Tipo di piatto</label><br>
            <select name="dishes-type" id="type-select"><br>
                <option value="">--Scegli una tipologia di piatto--</option>
                <option value="antipasti">Antipasto</option>
                <option value="primi">Primo</option>
                <option value="secondi">Secondo</option>
                <option value="dolci">Dolce</option>
                <option value="pizze">Pizza</option>
                <option value="sushi">Sushi</option>
                <option value="fritti">Fritti</option>
                <option value="specialità">Specialità</option>
                <option value="insalate">Insalata</option>
                <option value="riso">Riso</option>
                <option value="hamburger">Hamburger</option>
                <option value="kebab">Kebab</option>
                <option value="bibite">Bibite</option>
            </select><br>
            <br>

            <label for="price">Prezzo</label><br>
            <input type="number" name="price" placeholder="Inserisci prezzo"><br>
            <br>

            <label for="image">Immagine</label><br>
            <input type="file" name="image"><br>
            <br>

            <label for="availability">Visibile</label><br>
            <input type="radio" name="sì">
            <label for="sì">Sì</label>
            <input type="radio" name="no">
            <label for="no">No</label><br>
            <br>

            <input type="submit" value="AGGIUNGI">
        </form>
    </section>
    
@endsection