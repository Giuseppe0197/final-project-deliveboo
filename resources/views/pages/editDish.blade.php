@extends('layouts.main-layout')
@section('content')
<main id="edit-dish">
    <section id="container-form" class="container">

        <div class="content-wrapper row">
            
            <div class="col">

                <h1>Modifica piatto</h1>

                <form 
                    action="{{ route('dish.update', $dish -> id )}}" 
                    method="POST" 
                    enctype="multipart/form-data"
                    class="form px-3">
                
                    @method("POST")
                    @csrf
        
                    
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control" placeholder="nome" value="{{ $dish -> name }}">
                    
                    <label for="description">Descrizione</label>
                    <textarea name="description" class="form-control" rows="6">{{ $dish -> description }}</textarea>
                    
                    <label for="price">Prezzo</label>
                    <input type="text" name="price" class="form-control" placeholder="prezzo" value="{{ $dish -> price }}" step=".01">
                    
                    <label for="type">Categoria</label>
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
    
                    <div class="button">
                        <input class="btn" type="submit" value="MODIFICA">
                    </div>
                </form>
            </div>
    
            <div class="img col d-none d-md-block">
                <img src="/storage/images/{{ $dish -> image }}" alt="no-img">
            </div>
        </div>
    </section>
</main>

@endsection