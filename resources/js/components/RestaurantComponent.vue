<template>
    <div class="restaurant">

        <div class="rastaurant">
            <p>{{restaurants.owner_name}}</p>
            <p>{{restaurants.restaurant_name}}</p>
            <p>{{restaurants.restaurant_phone}}</p>
            <p>{{restaurants.email}}</p><br>
            <p>{{restaurants.address}}</p>
            <img :src="'/storage/images/' + restaurants.image" alt="">
            <p>{{restaurants.p_iva}}</p>
            <button class="btn btn-primary" @click="dishesList(user_id)">Vai alla pagina con i tuoi piatti</button>
        </div>
        <div class="container-dishes" v-for="dish in dishes" :key="dish.id">
           <span>
               {{ dish.name }}
            </span>
        </div>

        <div>
            <button @click="getDishes(user_id)">
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
