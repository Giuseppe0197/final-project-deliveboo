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

        <!-- Carrello -->
        <div class="container-cart">

            <!-- Ciclo nell'array del carrello -->
            <div v-for="product, i in cart" class="card-product d-flex" :key="i">
                <span>
                    {{ product.name }}
                </span>
                <span>
                    {{ product.description }}
                </span>    
                <span>
                    &euro;{{ product.price }}
                </span>
                <span>
                    <!-- Remove to cart -->
                    <button class="btn btn-danger" @click.prevent="removeToCart(i)">
                        Rimuovi
                    </button>
                </span>
                
            </div>

            <div v-if="cart.length > 0" class="text-center">
                <button class="btn btn-pagamento">
                    Vai al pagamento
                </button>
            </div>

            <div v-else class="text-cart-empty text-center">
                <img src="/storage/images/svgexport-15.svg" alt="shopping_cart_image">
                <span>
                    il carrello &egrave; vuoto
                </span>
                <div class="container-btn-pagamento">
                    <button class="btn-pagamento-disabled" disabled>
                        <span>
                            Vai al pagamento
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
    export default {
        data: function () {
            return {
                cart: [],
            }
        },

        props: {
            restaurant: Object,
            dishes: Object,
            categories_restaurant: Array,
        },

        mounted() {
            // Gestione carrello (salvataggio dati in locale, quindi al caricamento della pagina o al cambio, i dati rimangono)
            if (localStorage.getItem('cart')) {
                try {
                    this.cart = JSON.parse(localStorage.getItem('cart'));
                } catch(e) {
                    localStorage.removeItem('cart');
                }
            }
        },

        methods: {
            // metodo per aggiungere un prodotto/piatto nel carrello
            addToCart(product) {

                this.cart.push(product);
                this.saveCart();

                // for(let i = 0; i < this.cart.length; i++) {

                //     if(this.cart.indexOf(product.id) == -1) {
                        
                //         console.log(this.cart);
                //         return this.cart.push(product)
                //     }

                // }
            },

            // metodo per eliminare un elemnto dal carrello
            removeToCart(ind) {

                this.cart.splice(ind, 1);
                this.saveCart();
            },
            
            // metodo per gestire il salvataggio dei dati in locale
            saveCart() {

                const parsed = JSON.stringify(this.cart);
                localStorage.setItem('cart', parsed);
            }
        }
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



