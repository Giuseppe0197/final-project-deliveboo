@extends('layouts.main-layout')
@section('link')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection

@section('content')
<main id="add-dish">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <section id="container-form" class="container">

        <div class="content-wrapper row">
            
            <div class="col">
                <h1>Nuovo piatto</h1>

                <form
                    action="{{ route('dish.store', $restaurant->id) }}" 
                    method="POST"
                    enctype="multipart/form-data"
                    class="form px-3">
        
                    @method("POST")
                    @csrf

                    <input type="text" name="name" class="form-control" placeholder="Inserisci nome del piatto">
                    
                    <textarea name="description" class="form-control" rows="6" placeholder="Descrizione piatto..."></textarea>
                    
                    <div class="form-input">
                         <select name="type" class="form-control">
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
                        </select>
                    </div>
                    
                    <input type="number" name="price" class="form-control" step=".01" placeholder="Inserisci prezzo">
                    
                    <label for="image" class="mr-2">Immagine</label>
                    <input type="file" name="image">
                        
                    <div class="row mb-3 align-items-baseline">
                        <label for="availability" class="col-sm-2 col-form-label">Disponibile</label>

                        <div class="availability">
                            <label for="f-option" class="l-radio">
                              <input type="radio" id="f-option" name="availability" value="1" checked>
                              <span>Sì</span>
                            </label>
                            <label for="s-option" class="l-radio">
                              <input type="radio" id="s-option" name="availability" value="0">
                              <span>No</span>
                            </label>
                        </div>

                    </div>
        
                    <div class="button">
                        <input class="btn" type="submit" value="AGGIUNGI">
                    </div>
                </form>
            </div>

            <div class="img col d-none d-md-block">
                <img class="mySlides" src="/storage/images/new-dish.jpg" alt="img1">
                <img class="mySlides" src="/storage/images/edit-2.jpg" alt="img2">
                <img class="mySlides" src="/storage/images/edt-3.jpg" alt="img3">
            </div>
        </div>
    </section>
</main>
@endsection