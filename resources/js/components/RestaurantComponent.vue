<template>
    <div class="restaurant">

        <div class="title">

            <h1>Benvenuto nella tua sezione privata del ristorante: da qui puoi accedere alla lista dei piatti, crearne di nuovi e modificarli!</h1>

        </div>

        <div class="restaurant-info-log container">

            <div class="image-restaurant">

                <img class="restaurant-image" :src="'/storage/images/' + restaurants.image" alt="">

            </div>

            <div class="info">

                <p class="owner">Nome del prorietario: {{restaurants.owner_name}}</p>
                <p class="restaurant-name">Nome ristorante: {{restaurants.restaurant_name}}</p>
                <p class="restaurant-phone">Numero di telefono: {{restaurants.restaurant_phone}}</p>
                <p class="restaurant-email">Indirizzo email: {{restaurants.email}}</p>
                <p class="restaurant-address">Indirizzo del ristorante: {{restaurants.address}}</p>
                <p class="restaurant-p-iva">Numero della partita IVA: {{restaurants.p_iva}}</p>

            </div>

        </div>

        <div id="dishes-button">
            <button class="dishes-list-button" @click="getDishes(user_id)">
                Lista piatti
            </button>
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
            user_id: String
        },
        
        mounted() {

            axios.get('/restaurant/info/' + this.user_id)
                 .then(r => this.restaurants = r.data)
                 .catch(e => console.error(e));
        },

        methods: {
            dishesList(id){
                axios.get('/dishes/list/' + id)
                 .then(r => this.dishes = r.data)
                 .catch(e => console.error(e));
            },

            getDishes(id) {
                window.location.href = `/dishes/list/${id}`;
            }
        },
    }
</script>
