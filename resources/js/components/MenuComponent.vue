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
            dishes: Object
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



