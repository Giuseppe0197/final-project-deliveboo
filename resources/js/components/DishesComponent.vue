<template>
    <div class="container-dish">
        
        <h1 class="w-100 text-center mb-4"> Dishes list </h1>
        
        <div class="container-new-dish w-100">
            <a href="">
                Aggiungi un piatto nel tuo ristorante
            </a>
        </div>

        
            <div class="card" style="width: 18rem;">
                <!--  Gesgione immagini (Se la lunghezza del testo dell'immagine è uguale a 21, quindi le immagini che andremo ad inserire, allora mette l'immagine che salviamo, altrimenti mette un'immagine di default) -->
                    <img src="" class="card-img-top" alt="">
                    <img src="https://www.carnisostenibili.it/wp-content/uploads/2014/10/Cibo-spazzatura-alimentazione-spazzatura.jpg" class="card-img-top" alt="image default">
                
                <div class="card-body">
                     <!-- Nome piatto -->
                    <h4 class="card-title"></h4>
                     <!-- Descrizione piatto -->
                    <p class="card-text"></p>
                </div>
                <ul class="list-group list-group-flush">
                     <!-- Prezzo piatto -->
                    <li class="list-group-item">
                        <span>Prezzo:</span>
                        &euro; 
                    </li>
                     <!-- Tipo piatto -->
                    <li class="list-group-item">
                        <span class="fw-bold">Tipo:</span>
                        
                    </li>
                     <!-- Disponibilità (Aggiungere l'icona X e V successivamente) -->
                    <li class="list-group-item">
                        <span>Disponibilità:</span>
                    </li>
                    <li class="container-action-dish list-group-item">
                        <a class="btn btn-primary" href="">MODIFICA</a><!-- Inserire la rotta per MODIFICARE IL PIATTO  -->
                        <a class="btn btn-danger" href="">ELIMINA</a> <!-- Inserire la rotta per ELIMINARE/HIDE IL PIATTO -->
                    </li>
                </ul>
            </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                restaurants: [],
                dishes: []
            }
        },

        props: {
            restaurant_id: String
        },
        
        mounted() {

            axios.get('/restaurant/info/' + this.restaurant_id)
                 .then(r => this.restaurants = r.data)
                 .catch(e => console.error(e));
        },

        methods: {
            dishesList(id){
                axios.get('/dishes/list/' + id)
                 .then(r => this.dishes = r.data)
                 .catch(e => console.error(e));
            }
        },
    }
</script>
