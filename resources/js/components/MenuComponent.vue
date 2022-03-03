<template>
    <section class="restaurant">
        <div class="info-restaurant">
            <img src="" alt="">

            <div class="info-container">
                <h1>Restaurant name</h1>

                <div class="info">
                    <span class="restaurant-category">

                    </span>

                    <span class="restaurant-address">

                    </span>

                    <span class="restaurant-p-iva">

                    </span>
                </div>
            </div>

            <ul>
                <li>
                    <!-- v-for per stampare le tipologie di piatti del ristorante -->
                </li>
            </ul>

            <div class="restaurant-menu">

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
            restaurant: Array,
        },

        methods: {
            
        }
    }
</script>
