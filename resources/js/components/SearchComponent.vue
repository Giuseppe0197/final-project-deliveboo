<template>
    <div class="restaurant-search d-flex">

        <!-- container per la ricerca tramite barra e checkbox -->

        <div class="search-bar-checkbox container-fluid">

            <div class="row">

                <!-- searchbar per nome ristorante -->
                <input class="col-md-7 col-sm-12 my-2" type="search" v-model="searchRestaurant" @keyup.enter="search" placeholder="Ricerca ristorante">

                <!-- bottone per cercare il ristorante tramite nome -->

                <button class="btn btn-secondary col-md-7 col-sm-12 my-2" @click="search">Cerca il nome del ristorante</button>

            </div>

            <div class="checkboxes-container row d-flex flex-column">

                <div v-for="category in categories" :key="category.id" class="checkboxesSearch">
                    <input type="checkbox" :value="category.id" v-model="checkbox">{{category.name}}
                </div>

            </div>
        </div>
        <!--container ristoranti trovati tramite nome -->

        <div class="container-restaurants container-fluid">

            <div class="row">

                <div class="text-center col-md-6 col-sm-12" v-if="restaurants.length === 0">
                    <h1>Cerca i tuoi ristoranti preferiti!</h1>
                </div>

                <div v-else class="d-flex flex-wrap">
                    <div v-for="restaurant, i in restaurants" :key="i" class="restaurant-found restaurant-card" style="width: 18rem;">
                        
                        <div class="card-body text-center">

                            <!-- contenitore delle informazioni dei ristoranti trovati -->

                            <div class="container-image">
                                <img class="card-img-top" :src="'/storage/images/' + restaurant.image" alt="">
                            </div>
                            <h5 class="card-title my-1">{{restaurant.restaurant_name}}</h5>
                            <p class="card-text my-1">{{restaurant.restaurant_phone}}</p>
                            <p class="card-text my-1">{{restaurant.email}}</p>
                            <p class="card-text my-1">{{restaurant.address}}</p>
                        </div>

                            <!-- bottone per accedere al menu del singolo ristorante -->
                        <div class="container-button text-center">
                            <button class="button-show-restaurant" @click="showMenu(restaurant.id)">Ordina subito!</button>
                        </div>
                    </div>
                </div>
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
            },

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
                     .then(r => {

                         this.restaurants = r.data.data
                         console.log(this.restaurants);

                        for (let i = 0; i < this.restaurants.length; i++) {

                            if (this.restaurants[i].user_id) {
                                this.restaurants[i].id = this.restaurants[i].user_id;
                            }

                        }
                        })
                     
                     .catch(e => console.error(e))
            },

            showMenu(id) {

                window.location.href= `/show/restaurant/${id}`;
            }
        }
    }
</script>
