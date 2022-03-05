<template>

<div class="ms-container container-fluid">
    <div class="container-dish">
        
        <h1 class="w-100 text-center mb-4"> I tuoi piatti </h1>
        
        <div class="container-new-dish w-100">
            <button class="btn btn-primary" @click.prevent="insertDish(restaurant_id)">
                Aggiungi un piatto
            </button>
        </div>

        <div class="w-100 text-center mt-2">
            <button class="btn btn-secondary" @click.prevent="homeRestaurant()">
                Ritorna al ristorante
            </button>
        </div>

        
        <div class="card" v-for="dish in dishesArr" :key="dish.id">
             <!-- Gestione immagini (Se la lunghezza del testo dell'immagine è uguale a 21, quindi le immagini che andremo ad inserire, allora mette l'immagine che salviamo, altrimenti mette un'immagine di default) -->
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
                    <p v-if="dish.availability" class="d-inline-block text-success">&#10004; Disponibile</p>
                    <p v-else class="d-inline-block text-danger">&#10060; Non Disponibile</p>
                </li>

                <li class="container-action-dish list-group-item">
                    <!-- Button per modificare il piatto -->
                    <button class="btn btn-primary" @click.prevent="editDish(dish.id)">MODIFICA</button>

                    <!-- Button per modificare l'availability del piatto -->
                    <button 
                        @click="toggleDishAvailability(dish.id)" 
                        class="btn" 
                        :class="dish.availability ? 'btn-danger' : 'btn-success' "> 
                        {{ dish.availability ? 'RIMUOVI': 'AGGIUNGI'}}
                        </button>
                </li>
            </ul>
        </div>
    </div>
</div>

</template>

<script>
    export default {
        data: function () {
            return {
                dishesArr: {},
            }
        },

        props: {
            dishes: Object,
            restaurant_id: Number
        },

        created() {

            this.dishesArr = this.dishes;
            console.log(this.dishesArr);
        },

        // mounted() {
        //     console.log(this.dishes);

        //     this.dishesArr = this.dishes;

        //     console.log('DishArr', this.dishesArr);
        // },

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
            },

            // Mtodo per disponibilità del piatto 
            toggleDishAvailability(id) {
                // console.log('dish-availability toggle: ' + id);

                axios.get(`/api/dish/toggle/availability/${id}`)
                     .then(r => {
                         const index = this.getDishIndexById(id);
                            this.$set(this.dishesArr, index - 1, r.data);
                            console.log(this.dishesArr);
                        //  Vue.set(this.dishesArr, index, r.data);
                     })
                     .catch(e => console.error(e));
            },

            // Metodo per recuperare l'indice del singolo piatto
            getDishIndexById(id) {

                for (const dish in this.dishesArr) {

                    const ind = this.dishesArr[dish].id;
                    if (ind == id) {
                        return ind;
                    }
                    
                }
                return -1;
            }
        },
    }
</script>
