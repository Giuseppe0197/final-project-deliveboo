<template>
    <div class="restaurant-search">

        <!-- searchbar per nome ristorante -->
        <input type="search" v-model="searchRestaurant" @keyup.enter="search" placeholder="Ricerca ristorante">

        <!-- bottone per cercare il ristorante tramite nome -->

        <button class="btn btn-secondary" @click="search">Cerca il nome del ristorante</button>

        <!-- ristoranti trovati tramite nome -->

        <div v-for="restaurant, i in restaurants" :key="i" class="restaurant-found">
            <img :src="'/storage/images/' + restaurant.image" alt="">
            <p>{{restaurant.restaurant_name}}</p>
            <p>{{restaurant.restaurant_phone}}</p>
            <p>{{restaurant.email}}</p>
            <p>{{restaurant.address}}</p>

            <!-- bottone per accedere al menu del singolo ristorante -->
            <button class="btn btn-success" @click="showMenu(restaurant.id)">Visualizza il menu del ristorante</button>
        </div>

        <div v-for="category in categories" :key="category.id" class="checkboxesSearch">
            <input type="checkbox" :value="category.id" v-model="checkbox">{{category.name}}
        </div>



        <!-- <div v-for="restCat in restaurantsCat" :key="restCat.name">
            {{ restCat.name }}
        </div> -->



        <button class="btn btn-primary" >Cerca la categoria</button>
    </div>

</template>

<script>
    export default {
        data: function () {
            return {
                restaurants: [],
                restaurantsCat: [],
                searchRestaurant: '',
                checkbox: []
            }
        },

        props: {
            categories: Array
        },

        methods: {
            search() {
                axios.get('/find/restaurant?q=' + this.searchRestaurant)
                     .then(r => this.restaurants = r.data.data)
                     .catch(e => console.error(e))
            },

            showMenu(id) {

                window.location.href= `/show/restaurant/${id}`;
            }

        }
    }
</script>
