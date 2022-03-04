<template>
    <section class="restaurant">
        <div class="info-restaurant">
            <div class="restaurant-image">
                <img :src="`/storage/images/` + restaurant.image" :alt="restaurant.restaurant_name">
            </div>

            <div class="details-container">
                <div class="left">
                    <h1>{{ restaurant.restaurant_name }}</h1>

                    <div class="info">
                        <div class="restaurant-categories">
                            <span v-for="category, i in categories_restaurant" :key="i">
                                &#8226; {{ category.name }} 
                            </span>
                        </div>

                        <span class="restaurant-phone">
                            &#128222; {{ restaurant.restaurant_phone }}
                        </span>

                        <span class="restaurant-address">
                            &#128205; {{ restaurant.address }}
                        </span>

                        <span class="restaurant-p-iva">
                        Partita Iva: {{ restaurant.p_iva }}
                        </span>
                    </div>
                </div>

                <div class="right">
                    <div class="delivery-info">
                        <img src="/storage/images/svgexport-11.svg" alt="rider image">
                        <span>Scegli la consegna a domicilio</span>
                    </div>

                    <div class="text">
                        <span>Il tuo ordine sarà consegnato in 20 - 30 minuti</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
    export default {
        data: function () {
            return {
                // restaurant: [],
                // categories: [],
            }
        },

        props: {
            restaurant: Object,
            categories_restaurant: Array,
        },

        mounted() {
            console.log(this.restaurant);
            console.log(this.categories_restaurant);
        },
    }
</script>

<style scoped lang="scss">
.restaurant {
    min-height: 150px;

    .info-restaurant {
        display: flex;
        flex-wrap: wrap;
        padding: 30px;
        border-top: 1px solid #e2e5e5;
        border-bottom: 1px solid #e2e5e5;

        .restaurant-image {
            width: 20%;

            img {
                width: 100%;
                border-radius: 4%;
                box-shadow: 10px 5px 5px grey;
            }
        }

        .details-container {
            width: 80%;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;

            .left {
                padding-left: 15px;

                h1 {
                    text-transform: uppercase;
                    margin-bottom: 20px;
                }

                .info {
                    .restaurant-categories {
                        span {
                            font-size: 18px;
                            font-weight: 600;
                            color: rgb(0, 126, 138);
                            margin-right: 5px;
                            display: inline;
                        }
                    }

                    span {
                        font-size: 15px;
                        display: block;
                    }
                    .restaurant-categories, span {
                        margin-bottom: 15px;
                    }
                }

            }

            .right {
                .delivery-info {
                    text-align: center;

                    img {
                        margin-right: 10px;
                    }
                }
            }
        }
    }
}

// mediaquery 
// versione lg 
@media all and (max-width:1024px){
    .restaurant .info-restaurant {
        align-items: center;
    }

    .restaurant .info-restaurant .restaurant-image {
        width: 40%;
    }


    .restaurant .info-restaurant .details-container {
        width: 60%;
        padding: 0;
        display: block;

        .left, .right {
            padding-left: 25px;
        }

        .right .delivery-info {
            text-align: left;
        }
    }
}

// versione tablet 
@media all and (min-width:568px) and (max-width:768px) {
    .restaurant .info-restaurant .details-container .left{
        h1 {
            margin-bottom: 5px;
        }

        .info span {
            margin-bottom: 8px;
        }
        
    }
}

// versione mobile 
@media all and (max-width: 568px) {
    .restaurant .info-restaurant {
        padding: 5px 0;
        border-top: 0;

        .restaurant-image, .details-container {
            width: 100%;

            img {
                border-radius: 0;
                box-shadow: none;
            }
        }

        .details-container {
            .left, .right {
                padding: 10px 0px 10px 30px;
            }

            .left {
                .info span{
                    margin-bottom: 5px;
                }
            }

            .right .delivery-info {
                text-align: left;
            }
        }
    }
}
</style>



