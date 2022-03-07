<template>
    <div class="restaurant-search">

        <!-- searchbar per nome ristorante -->
        <input type="search" v-model="searchRestaurant" @keyup.enter="search" placeholder="Ricerca ristorante">

        <!-- bottone per cercare il ristorante tramite nome -->

        <button class="btn btn-secondary" @click="search">Cerca il nome del ristorante</button>

        <div v-for="category in categories" :key="category.id" class="checkboxesSearch d-inline-flex">
            <input type="checkbox" :value="category.id" v-model="checkbox">{{category.name}}
        </div>

<!--         <button @click="findByResataurantCategoryId">cerca la categoria</button>-->

        <!-- ristoranti trovati tramite nome -->

        <div class="d-flex flex-wrap justify-content-center my-2">
            <div v-for="restaurant, i in restaurants" :key="i" class="my-2 card restaurant-found restaurant-card" style="width: 18rem;">
                
                <div class="card-body">
                    <img class="card-img-top" :src="'/storage/images/' + restaurant.image" alt="">
                    <h5 class="card-title text-center my-1">{{restaurant.restaurant_name}}</h5>
                    <p class="card-text text-center">{{restaurant.restaurant_phone}}</p>
                    <p class="card-text text-center">{{restaurant.email}}</p>
                    <p class="card-text text-center">{{restaurant.address}}</p>
                </div>
                <!-- bottone per accedere al menu del singolo ristorante -->
                <button class="btn btn-success" @click="showMenu(restaurant.id)">Visualizza il menu del ristorante</button>
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        data: function () {
            return {
                restaurants: [],
                restaurantsCat: [],
                searchRestaurant: '',
                checkbox: [],
                categories: []
            }
        },

        props: {
            // categories: Array,
            // categories_restaurant: Array
        },

        mounted() {

            axios.get('/find/categories')
            .then(r => this.categories = r.data)
            .catch(e => console.error(e))
        },

        //uso il watch perche sfrutta la reattività di Vue
        watch: {
            checkbox(newVal, oldVal) {
                console.log(newVal, oldVal)
                this.findByResataurantCategoryId(newVal)
            }
        },


        methods: {
            search() {
                this.findByResataurantCategoryId()
                // axios.get('/find/restaurant?q=' + this.searchRestaurant)
                //      .then(r => this.restaurants = r.data.data)
                //      .catch(e => console.error(e))
            },

            /* async findByResataurantCategoryId() {
                console.log("this.checkbox")    
                console.log(this.checkbox) 
                let r = await axios.get('/find/restaurant_by_cat?ids=' + this.checkbox)
                this.restaurants = r.data
                console.log(r)    
            }, */

            findByResataurantCategoryId() {
                let queryParam = '/find/restaurant_by_cat';
                if(this.checkbox.length > 0 && this.searchRestaurant.length > 0){
                    queryParam += '?ids=' + `${this.checkbox}&q=` +this.searchRestaurant;
                }
                else if(this.checkbox.length ==0 && this.searchRestaurant.length == 0 ){
                    
                }
                else if(this.checkbox.length > 0 ){
                    queryParam += '?ids=' + `${this.checkbox}`
                }
                else{
                    queryParam += '?q=' +this.searchRestaurant
                }
                    
                axios.get(queryParam)
                     .then(r => this.restaurants = r.data.data)
                     .catch(e => console.error(e))
            },


            showMenu(id) {

                window.location.href= `/show/restaurant/${id}`;
            }

        }
    }
</script>
