<template>
    <div class="restaurant-search">
        <input type="search" v-model="searchRestaurant" @keyup.enter="search" placeholder="Ricerca ristorante">

        <button class="btn btn-secondary" @click="search">Cerca</button>

        <div v-if="restaurants.length === 0" class="noresult">
            Cerca i tuoi ristoranti preferiti
        </div>

        <div v-else v-for="restaurant, i in restaurants" :key="i" class="restaurant-found">
            <img :src="'/storage/images/' + restaurant.image" alt="">
            <p>{{restaurant.restaurant_name}}</p>
            <p>{{restaurant.restaurant_phone}}</p>
            <p>{{restaurant.email}}</p>
            <p>{{restaurant.address}}</p>
            <a class="btn btn-success" href="#">Visualizza il menu del ristorante</a>
        </div>
    </div>

</template>

<script>
    export default {
        data: function () {
            return {
                restaurants: [],
                searchRestaurant: ''
            }
        },

        methods: {
            search() {
                axios.get('/find/restaurant?q=' + this.searchRestaurant)
                     .then(r => this.restaurants = r.data.data)
                     .catch(e => console.error(e))
            }
        }
    }
</script>
