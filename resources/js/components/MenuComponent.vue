<template>
    <section class="restaurant">
        <div class="info-restaurant">
            <img :src="restaurant.image" :alt="restaurant.restaurant_name">

            <div class="info-container">
                <h1>{{restaurant.restaurant_name}}</h1>

                <div class="info">
                    <span class="restaurant-category">
                        
                    </span>

                    <span class="restaurant-address">
                        Indirizzo: {{restaurant.address}}
                    </span>

                    <span class="restaurant-p-iva">
                       Partita Iva: {{restaurant.p_iva}}
                    </span>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
    export default {
        data: function () {
            return {
                restaurant: [],
            }
        },

        props: {
            restaurant: Object,
        },

        mounted() {
            console.log(this.restaurant);
        },

        methods: {
            
        }
    }
</script>

<style scoped lang="scss">
.info-restaurant {
    // debug
    height: 100px;
    background-color: bisque;

    .info-container {
        display: inline-block;
        

        span {
            display: block;
        }
    }
}

</style>



