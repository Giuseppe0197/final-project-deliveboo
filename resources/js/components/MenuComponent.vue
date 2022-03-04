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

        <!-- container container-dishes-shopping-cart -->
        <div class="container-dishes-shopping-cart">

            <div class="container-card-dishes">

            <!-- Cat. Antipasti -->
            <div class="container-dishes">
                <h2 v-if="getTitleDish('Antipasti')" class="w-100">Antipasti</h2>
                <div v-for="dish, i in dishes" @click="addToCart(dish)" :class="dish.type == 'Antipasti' ? 'card-dish' : '' " :key="'A' + i">
                    <div v-if="dish.type == 'Antipasti'" class="w-100">
                        <h3>
                            {{ dish.name }}
                        </h3>
                        <p>
                            {{ dish.description }}
                        </p>
                        <span>
                            {{ dish.price }} &euro;
                        </span>
                    </div>
                    <div v-if="dish.type == 'Antipasti'" class="container-dish-img">
                        <img :src="`/storage/images/` + dish.image" alt="dish.name">
                    </div>
                </div>
            </div>

            <!-- Cat. Primi -->
            <div class="container-dishes">
                <h2 v-if="getTitleDish('Primi')" class="w-100">Primi</h2>
                <div v-for="dish, i in dishes" @click="addToCart(dish)" :class="dish.type == 'Primi' ? 'card-dish' : '' " :key="'A' + i">
                    <div v-if="dish.type == 'Primi'" class="w-100">
                        <h3>
                            {{ dish.name }}
                        </h3>
                        <p>
                            {{ dish.description }}
                        </p>
                        <span>
                            {{ dish.price }} &euro;
                        </span>
                    </div>
                    <div v-if="dish.type == 'Primi'" class="container-dish-img">
                        <img :src="`/storage/images/` + dish.image" alt="dish.name">
                    </div>
                </div>
            </div>

            <!-- Cat. Secondi -->
            <div class="container-dishes">
                <h2 v-if="getTitleDish('Secondi')" class="w-100">Secondi</h2>
                <div v-for="dish, i in dishes" @click="addToCart(dish)" :class="dish.type == 'Secondi' ? 'card-dish' : '' " :key="'A' + i">
                    <div v-if="dish.type == 'Secondi'" class="w-100">
                        <h3>
                            {{ dish.name }}
                        </h3>
                        <p>
                            {{ dish.description }}
                        </p>
                        <span>
                            {{ dish.price }} &euro;
                        </span>
                    </div>
                    <div v-if="dish.type == 'Secondi'" class="container-dish-img">
                        <img :src="`/storage/images/` + dish.image" alt="dish.name">
                    </div>
                </div>
            </div>

            <!-- Cat. Pizze -->
            <div class="container-dishes">
                <h2 v-if="getTitleDish('Pizze')" class="w-100">Pizze</h2>
                <div v-for="dish, i in dishes" @click="addToCart(dish)" :class="dish.type == 'Pizze' ? 'card-dish' : '' " :key="i">
                    <div v-if="dish.type == 'Pizze'" class="w-100">
                        <h3>
                            {{ dish.name }}
                        </h3>
                        <p>
                            {{ dish.description }}
                        </p>
                        <span>
                            {{ dish.price }} &euro;
                        </span>
                    </div>
                    <div v-if="dish.type == 'Pizze'" class="container-dish-img">
                        <img :src="`/storage/images/` + dish.image" alt="dish.name">
                    </div>
                </div>
            </div>

            <!-- Cat. Sushi -->
            <div class="container-dishes">
                <h2 v-if="getTitleDish('Sushi')" class="w-100">Sushi</h2>
                <div v-for="dish, i in dishes" @click="addToCart(dish)" :class="dish.type == 'Sushi' ? 'card-dish' : '' " :key="'A' + i">
                    <div v-if="dish.type == 'Sushi'" class="w-100">
                        <h3>
                            {{ dish.name }}
                        </h3>
                        <p>
                            {{ dish.description }}
                        </p>
                        <span>
                            {{ dish.price }} &euro;
                        </span>
                    </div>
                    <div v-if="dish.type == 'Sushi'" class="container-dish-img">
                        <img :src="`/storage/images/` + dish.image" alt="dish.name">
                    </div>
                </div>
            </div>

            <!-- Cat. Specialità -->
            <div class="container-dishes">
                <h2 v-if="getTitleDish('Specialità')" class="w-100">Specialità</h2>
                <div v-for="dish, i in dishes" @click="addToCart(dish)" :class="dish.type == 'Specialità' ? 'card-dish' : '' " :key="'A' + i">
                    <div v-if="dish.type == 'Specialità'" class="w-100">
                        <h3>
                            {{ dish.name }}
                        </h3>
                        <p>
                            {{ dish.description }}
                        </p>
                        <span>
                            {{ dish.price }} &euro;
                        </span>
                    </div>
                    <div v-if="dish.type == 'Specialità'" class="container-dish-img">
                        <img :src="`/storage/images/` + dish.image" alt="dish.name">
                    </div>
                </div>
            </div>

            <!-- Cat. Riso -->
            <div class="container-dishes">
                <h2 v-if="getTitleDish('Riso')" class="w-100">Riso</h2>
                <div v-for="dish, i in dishes" @click="addToCart(dish)" :class="dish.type == 'Riso' ? 'card-dish' : '' " :key="'A' + i">
                    <div v-if="dish.type == 'Riso'" class="w-100">
                        <h3>
                            {{ dish.name }}
                        </h3>
                        <p>
                            {{ dish.description }}
                        </p>
                        <span>
                            {{ dish.price }} &euro;
                        </span>
                    </div>
                    <div v-if="dish.type == 'Riso'" class="container-dish-img">
                        <img :src="`/storage/images/` + dish.image" alt="dish.name">
                    </div>
                </div>
            </div>

            <!-- Cat. Insalate -->
            <div class="container-dishes">
                <h2 v-if="getTitleDish('Insalate')" class="w-100">Insalate</h2>
                <div v-for="dish, i in dishes" @click="addToCart(dish)" :class="dish.type == 'Insalate' ? 'card-dish' : '' " :key="'A' + i">
                    <div v-if="dish.type == 'Insalate'" class="w-100">
                        <h3>
                            {{ dish.name }}
                        </h3>
                        <p>
                            {{ dish.description }}
                        </p>
                        <span>
                            {{ dish.price }} &euro;
                        </span>
                    </div>
                    <div v-if="dish.type == 'Insalate'" class="container-dish-img">
                        <img :src="`/storage/images/` + dish.image" alt="dish.name">
                    </div>
                </div>
            </div>

            <!-- Cat. Fritti -->
            <div class="container-dishes">
                <h2 v-if="getTitleDish('Fritti')" class="w-100">Fritti</h2>
                <div v-for="dish, j in dishes" @click="addToCart(dish)" :class="dish.type == 'Fritti' ? 'card-dish' : '' " :key="j">
                    <div v-if="dish.type == 'Fritti'" class="w-100">
                        <h3>
                            {{ dish.name }}
                        </h3>
                        <p>
                            {{ dish.description }}
                        </p>
                        <span>
                            {{ dish.price }} &euro;
                        </span>
                    </div>
                    <div v-if="dish.type == 'Fritti'" class="container-dish-img">
                        <img :src="`/storage/images/` + dish.image" alt="dish.name">
                    </div>
                </div>
            </div>

            <!-- Cat. Hamburger -->
            <div class="container-dishes">
                <h2 v-if="getTitleDish('Hamburger')" class="w-100">Hamburger</h2>
                <div v-for="dish, j in dishes" @click="addToCart(dish)" :class="dish.type == 'Hamburger' ? 'card-dish' : '' " :key="j">
                    <div v-if="dish.type == 'Hamburger'" class="w-100">
                        <h3>
                            {{ dish.name }}
                        </h3>
                        <p>
                            {{ dish.description }}
                        </p>
                        <span>
                            {{ dish.price }} &euro;
                        </span>
                    </div>
                    <div v-if="dish.type == 'Hamburger'" class="container-dish-img">
                        <img :src="`/storage/images/` + dish.image" alt="dish.name">
                    </div>
                </div>
            </div>

            <!-- Cat. Kebab -->
            <div class="container-dishes">
                <h2 v-if="getTitleDish('Kebab')" class="w-100">Kebab</h2>
                <div v-for="dish, j in dishes" @click="addToCart(dish)" :class="dish.type == 'Kebab' ? 'card-dish' : '' " :key="j">
                    <div v-if="dish.type == 'Kebab'" class="w-100">
                        <h3>
                            {{ dish.name }}
                        </h3>
                        <p>
                            {{ dish.description }}
                        </p>
                        <span>
                            {{ dish.price }} &euro;
                        </span>
                    </div>
                    <div v-if="dish.type == 'Kebab'" class="container-dish-img">
                        <img :src="`/storage/images/` + dish.image" alt="dish.name">
                    </div>
                </div>
            </div>

            <!-- Cat.Dolci -->
            <div class="container-dishes">
                <h2 v-if="getTitleDish('Dolci')" class="w-100">Dolci</h2>
                <div v-for="dish, a in dishes" @click="addToCart(dish)" :class="dish.type == 'Dolci' ? 'card-dish' : '' " :key="a">
                    <div v-if="dish.type == 'Dolci'" class="w-100">
                        <h3>
                            {{ dish.name }}
                        </h3>
                        <p>
                            {{ dish.description }}
                        </p>
                        <span>
                            {{ dish.price }} &euro;
                        </span>
                    </div>
                    <div v-if="dish.type == 'Dolci'" class="container-dish-img">
                        <img :src="`/storage/images/` + dish.image" alt="dish.name">
                    </div>
                </div>
            </div>

            <!-- Cat. Bibite -->
            <div class="container-dishes">
                <h2 v-if="getTitleDish('Bibite')" class="w-100">Bibite</h2>
                <div v-for="dish, j in dishes" @click="addToCart(dish)" :class="dish.type == 'Bibite' ? 'card-dish' : '' " :key="j">
                    <div v-if="dish.type == 'Bibite'" class="w-100">
                        <h3>
                            {{ dish.name }}
                        </h3>
                        <p>
                            {{ dish.description }}
                        </p>
                        <span>
                            {{ dish.price }} &euro;
                        </span>
                    </div>
                    <div v-if="dish.type == 'Bibite'" class="container-dish-img">
                        <img :src="`/storage/images/` + dish.image" alt="dish.name">
                    </div>
                </div>
            </div>

        </div>

        <!-- Carrello -->
        <div class="container-cart">

            <h3 v-if="cart.length > 0">
                Il tuo ordine
            </h3>

            <!-- Ciclo nell'array del carrello -->
            <div v-for="product, i in cart" class="card-product" :key="i">

                <!-- Nome piatto -->
                <span class="name-dish">
                    {{ product.name }}
                </span>

                <div class="button-shoppingcart">
                    <div>
                        <span @click="addProduct()" class="btn-add">
                            <img src="/storage/images/svgexport-13.svg" alt="btn add">
                        </span>
                        <span>
                            1
                        </span>
                        <span @click="removeProduct()" class="btn-remove">
                            <img src="/storage/images/svgexport-14.svg" alt="btn remove">
                        </span>
                    </div>

                    <!-- Prezzo piatto -->
                    <div>
                        <span>
                            {{ product.price }} &euro;
                        </span>
                    </div>
                </div>

                <!-- Descrizione piatto -->
                <div class="description-dish">
                    {{ product.description }}
                </div>

                <!-- Remove to cart -->
                <div class="container-remove-product">
                    <span @click.prevent="removeToCart(i)">
                        Rimuovi
                    </span>
                </div>
                
            </div>

            <div v-if="cart.length > 0" class="container-totalprice">
                <span>
                    Totale
                </span>
                <span>
                    {{ totalPrice }} &euro;
                </span>
            </div>

            <div v-if="cart.length > 0" class="cont-bord-pag text-center">
                <button class="btn-pagamento">
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

    </div>

    </section>

</template>

<script>
    export default {
        data: function () {
            return {
                cart: []
            }
        },

        props: {
            restaurant: Object,
            dishes: Object,
            categories_restaurant: Array
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

        computed: {
            // Prezzo totale carrello
            totalPrice() {
                
                let total = 0;

                for (let i = 0; i < this.cart.length; i++) {
                    total = parseFloat(total) + parseFloat(this.cart[i].price);
                }

                return total.toFixed(2);
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
            },

            // metodo per controllare la lunghezza dell'array/object, in modo da gestire i titoli delle categorie
            getTitleDish(dishes) {
                
                for (const product in this.dishes) {
                
                    if (this.dishes[product].type == dishes) {
                        return true;
                    }
                }

                return false;
            },

            // metodo per aggiungere un prodotto
            addProduct() {

            },

            // metodo per rimuovere un prodotto
            removeProduct() {

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



