@extends('layouts.main-layout')
@section('content')

    <section id="container-form" class="container py-4">
        <div class="content-wrapper">
            <div class="img-container"></div>

            <h1>Modifica piatto</h1>

            <form 
                action="{{ route('dish.update', $dish -> id )}}" 
                method="POST" 
                enctype="multipart/form-data"
                class="form">
            
                @method("POST")
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label offset-2">Nome</label>

                    <div class="form-input">
                        <input type="text" name="name" class="form-control" placeholder="nome" value="{{ $dish -> name }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label offset-2">Descrizione</label>

                    <div class="form-input">
                        {{-- <input type="text" name="description" class="form-control" placeholder="descrizione" value="{{ $dish -> description }}"> --}}
                        <textarea name="description" class="form-control" rows="6">{{ $dish -> description }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label offset-2">Prezzo</label>

                    <div class="form-input">
                        <input type="text" name="price" class="form-control" placeholder="prezzo" value="{{ $dish -> price }}" step=".01">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="type" class="col-sm-2 col-form-label offset-2">Categoria</label>

                    <div class="form-input">
                        <select name="type" class="form-control">
                            <option value="{{ $dish -> type }}" selected disabled hidden>{{ $dish -> type }}</option>
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
                        </select>
                    </div>
                </div>
            
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label offset-2">Immagine</label>

                    <div class="form-input">
                        <input type="file" name="image">
                    </div>
                </div>

                <div class="button">
                    <input type="submit" class="update-btn" value="UPDATE">
                </div>
            </form>
        </div>
    </section>

@endsection