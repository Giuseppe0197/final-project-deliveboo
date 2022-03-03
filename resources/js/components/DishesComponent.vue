<template>
    <div class="container-dish">
        
        <h1 class="w-100 text-center mb-4"> Dishes list </h1>
        
        <div class="container-new-dish w-100">
            <button class="btn btn-primary" @click.prevent="insertDish(restaurant_id)">
                Aggiungi un piatto nel tuo ristorante
            </button>
        </div>

        <div class="w-100 text-center mt-2">
            <button class="btn btn-secondary" @click.prevent="homeRestaurant()">
                Ritorna al ristorante
            </button>
        </div>

        
        <div class="card" v-for="dish in dishes" :key="dish.id" style="width: 18rem;">
             <!-- Gesgione immagini (Se la lunghezza del testo dell'immagine è uguale a 21, quindi le immagini che andremo ad inserire, allora mette l'immagine che salviamo, altrimenti mette un'immagine di default) -->
            <img :src="showImage(dish.image)" :alt="dish.name">

            <!-- <img v-else src="https://www.carnisostenibili.it/wp-content/uploads/2014/10/Cibo-spazzatura-alimentazione-spazzatura.jpg" class="card-img-top" alt="image default"> -->
            
            <div class="card-body">
                    <!-- Nome piatto -->
                <h4 class="card-title">
                    {{ dish.name }}
                </h4>
                    <!-- Descrizione piatto -->
                <p class="card-text">
                    {{ dish.description }}
                </p>
            </div>
            <ul class="list-group list-group-flush">
                    <!-- Prezzo piatto -->
                <li class="list-group-item">
                    <span>Prezzo:</span>
                    &euro;{{ dish.price }} 
                </li>
                    <!-- Tipo piatto -->
                <li class="list-group-item">
                    <span class="fw-bold">Tipo:</span>
                    {{ dish.type }}
                </li>                    
                <!-- Disponibilità (Aggiungere l'icona X e V successivamente) -->
                <li class="list-group-item">
                    <span>Disponibilità:</span>
                    <p v-if="dish.availability" class="d-inline-block">Disponibile</p>
                    <p v-else class="d-inline-block">Non Disponibile</p>
                </li>

                <li class="container-action-dish list-group-item">
                    <!-- Button per modificare il piatto -->
                    <button class="btn btn-primary" @click.prevent="editDish(dish.id)">MODIFICA</button>
                    <!-- Button per modificare l'availability del piatto -->
                    <a class="btn btn-danger" href="#">RIMUOVI</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                test: []
            }
        },

        props: {
            dishes: Object,
            restaurant_id: Number
        },

        mounted() {
            console.log(this.restaurant_id);
        },

        methods: {
            // Metodo per inserire un piatto
            insertDish(id) {
                window.location.href = `/dish/create/${id}`;
            },

            // Metodo per modificare un piatto
            editDish(id) {
                window.location.href = `/dish/edit/${id}`;
            },

            // Metodo per ritornare indietro alla home del ristorante
            homeRestaurant() {
                window.location.href = `/restaurant`;
            },

            showImage(img) {

                let defaultImage = "https://www.carnisostenibili.it/wp-content/uploads/2014/10/Cibo-spazzatura-alimentazione-spazzatura.jpg";
                let path = `/storage/images/` + img

                if (img.length > 18 && img.length < 24) {
                    return path
                } else {
                    return defaultImage
                }
            }
        },
    }
</script>
