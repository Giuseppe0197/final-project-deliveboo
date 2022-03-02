@extends('layouts.main-layout')
@section('content')

<h1 id="edit-title">edit dish</h1>

@if ($errors -> any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $errors }}</li>
        @endforeach
    </ul>
</div>
    
@endif

<form class="edit-form" action="{{ route('dish.update', $dish -> id )}}" method="POST" enctype="multipart/form-data"
    >

    @method("POST")
    @csrf

    <label for="name">Nome:</label>
    <input type="text" name="name" placeholder="nome" value="{{ $dish -> name }}"><br>
    <label for="description">Descrizione:</label>
    <input type="text" name="description" placeholder="descrizione" value="{{ $dish -> description }}"><br>
    <label for="price">Prezzo:</label>
    <input type="text" name="price" placeholder="prezzo" value="{{ $dish -> price }}" step=".01"><br>
    <label for="type">Categoria</label>

    <select name="type">
        <option value="{{ $dish->type }}" selected disabled>{{ $dish->type }}</option>
        <option value="Antipasti">Antipasti</option>
        <option value="Primi">Primi</option>
        <option value="Secondi">Secondi</option>
        <option value="Dolci">Dolci</option>
        <option value="Pizze">Pizze</option>
        <option value="Sushi">Sushi</option>
        <option value="Fritti">Fritti</option>
        <option value="Specialità">Specialità</option>
        <option value="Insalate">Insalate</option>
        <option value="Riso">Riso</option>
        <option value="Hamburger">Hamburger</option>
        <option value="Kebab">Kebab</option>
        <option value="Bibite">Bibite</option>
    </select><br>

    <label for="image">Immagine:</label>
    <input type="file" name="image"><br>
    <input type="submit" class="update-btn" value="UPDATE">

</form>
    
@endsection