<template>
    <div class="restaurant">

        <div class="rastaurant">
            <p>{{restaurants.owner_name}}</p>
            <p>{{restaurants.restaurant_name}}</p>
            <p>{{restaurants.restaurant_phone}}</p>
            <p>{{restaurants.email}}</p>
            <p>{{restaurants.address}}</p>
            <img :src="'/storage/images/' + restaurants.image" alt="">
            <p>{{restaurants.p_iva}}</p>
        </div>
        <div class="container-dishes" v-for="dish in dishes" :key="dish.id">
           <span>
               {{ dish.name }}
            </span>
        </div>

        <div>
            <button class="btn btn-primary" @click="getDishes(user_id)">
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
            // Metodo per ritornare la pagina blade contenente tutti i piatti del ristorante!
            getDishes(id) {
                window.location.href = `/dishes/list/${id}`;
            }
        },
    }
</script>
