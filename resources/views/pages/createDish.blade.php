@extends('layouts.main-layout')
@section('content')

    <section id="container-form" class="container py-4">
        <div class="content-wrapper">
            <div class="img-container"></div>

            <h1>Nuovo piatto</h1>
    
            <form
                action="{{ route('dish.store', $restaurant->id) }}" 
                method="POST"
                enctype="multipart/form-data"
                class="form">
    
                @method("POST")
                @csrf
    
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label offset-2">Nome</label>

                    <div class="form-input">
                        <input type="text" name="name" class="form-control" placeholder="Inserisci nome">
                    </div>
                </div>
    
                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label offset-2">Descrizione</label>

                    <div class="form-input">
                        <textarea name="description" class="form-control" rows="6" placeholder="Descrizione piatto..."></textarea>
                    </div>
                </div>
    
                <div class="row mb-3">
                    <label for="type" class="col-sm-2 col-form-label offset-2">Categoria</label>

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
                </div>
    
                <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label offset-2">Prezzo</label>

                    <div class="form-input">
                        <input type="number" name="price" class="form-control" step=".01" placeholder="Inserisci prezzo">
                    </div>
                </div>
    
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label offset-2">Immagine</label>

                    <div class="form-input">
                        <input type="file" name="image">
                    </div>
                </div>
    
                <div class="row mb-3">
                    <label for="availability" class="col-sm-2 col-form-label offset-2">Visibile</label>

                    <div class="col-sm-8 form-input availability">
                        <div class="input-radio">
                            <input type="radio" name="availability" value="1" checked>
                            <label for="sì" class="mr-3">Sì</label>
                        </div>

                        <div class="input-radio">
                            <input type="radio" name="availability" value="0">
                            <label for="no">No</label>
                        </div>
                    </div>
                </div>
    
                <div class="button">
                    <input class="btn btn-primary" type="submit" value="AGGIUNGI">
                </div>
            </form>
        </div>
    </section>
    
@endsection