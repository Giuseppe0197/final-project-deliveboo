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
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                restaurants: []
            }
        },

        props: {
            restaurant_id: String
        },
        
        mounted() {

            axios.get('/restaurant/info/' + this.restaurant_id)
                 .then(r => this.restaurants = r.data)
                 .catch(e => console.error(e));
        }
    }
</script>
