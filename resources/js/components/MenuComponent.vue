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
                        <span @click="removeProduct(product)" class="btn-remove">
                            <img src="/storage/images/svgexport-14.svg" alt="btn remove">
                        </span>
                        <span>
                            {{ product.quantity }}
                        </span>
                        <span @click="addProduct(product)" class="btn-add">
                            <img src="/storage/images/svgexport-13.svg" alt="btn add">
                        </span>
                    </div>

                    <!-- Prezzo piatto -->
                    <div>
                        <span>
                            {{ parseFloat(product.price).toFixed(2) }} &euro;
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
                
                <button class="btn-pagamento" @click.prevent="viewCart(cart)"> <!-- viewCart(cart) -->
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
                cart: [],
                quantity: 1,
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
                    let find = false;

                    for (const prod in this.dishes) {

                        for (let i = 0; i < this.cart.length; i++) {

                            // Confornto l'id dei piatti nel carrello con gli id dei piatti dell'array originale
                            // se gli id combaciano, ritorno il carrello presente nel localStorage e setto la variabile FIND in true ed esco dal ciclo con break;
                            // se invece non combaciano setto la variabile FIND in false

                            if (this.cart[i].id == this.dishes[prod].id) {

                                this.cart = JSON.parse(localStorage.getItem('cart'));
                                find = true; break;
                                
                            } else {
                                find = false;
                            }
                        }

                        // Se find risulta TRUE, allora esco dal ciclo con l'utilizzo del break;
                        if (find) {
                            break;
                        } 
                    }

                    // Se FIND invece risulta false appare un alert con conferma.
                    // Se l'utente clicca "OK" eliminerà il carrello precedente.
                    // Se l'utente clicca "Cancel" ritornerà alla pagina dei ristoranti ma senza eliminare il carrello fatto in precedenza.
                    if (find == false) {

                        if (confirm("Attenzione! in questo modo cancellerai il carrello precedente, sei sicuro?")) {
                            localStorage.removeItem('cart');
                            this.cart = [];
                        } else {
                            history.back();
                        }
                    }

                } catch(e) {
                    localStorage.removeItem('cart');
                }
            }

            // Se il carrello è vuoto, il prezzo totale nell'header viene settato a 0
            if (this.cart.length == 0) {
                document.querySelector('.shopping-cart-header a span').innerHTML = 0 + ' &euro;';
            }
        },

        computed: {
            // Prezzo totale carrello
            totalPrice() {
                
                let total = 0;

                for (let i = 0; i < this.cart.length; i++) {
                    
                    total = parseFloat(total) + parseFloat(this.cart[i].price);
                    
                    // Modifica del DOM per inserire il totale anche nel carrello presente nell'header
                    document.querySelector('.shopping-cart-header a span').innerHTML = total.toFixed(2) + ' &euro;';
                }
                return total.toFixed(2);
            }
        },

        methods: {
            // metodo per aggiungere un prodotto/piatto nel carrello
            addToCart(dish) {

                // this.cart['quantity'] = 1;
                dish['quantity'] = 1;

                let find = true;

                for (const products in this.cart) {

                    let id = this.cart[products].id;

                    // Confronto l'id del prodotto con tutti gli id dei prodotti all'interno del carrello
                    if (dish.id !== id) {
                        find = true;
                    } else {
                        this.addProduct(this.cart[products]); // Se il piatto è già stato inserito, aggiunge una quantità direttamente
                        find = false; break;  // Utilizzo del break per uscire dall'iterazione, visto che gli id combaciano!
                    }
                }

                if(find) {
                    // Push del prodotto/piatto all'interno dell'array del carrello
                    this.cart.push(dish);
                    this.saveCart();
                    this.cart = JSON.parse(localStorage.getItem('cart'));

                    // richiamo del metodo che fa scrollare la parte del carrello al click
                    this.scrollToEnd();
                }
            },

            // metodo per eliminare un elemnto dal carrello
            removeToCart(ind) {

                this.cart.splice(ind, 1);
                
                // Se il carrello è vuoto, il prezzo totale nell'header viene settato a 0
                if (this.cart.length == 0) {
                    document.querySelector('.shopping-cart-header a span').innerHTML = 0 + ' &euro;';
                    localStorage.removeItem('cart');
                } else {
                    this.saveCart();
                }
                
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
            addProduct(prod) {

                for (const dish in this.dishes) {
                    if (this.dishes.hasOwnProperty.call(this.dishes, dish)) {

                        const dishOriginal = this.dishes[dish];

                        if (prod.id == dishOriginal.id) {
                            prod.quantity += 1;

                            prod.price = dishOriginal.price * prod.quantity;

                            this.saveCart();
                        }
                    }
                }
            },

            // metodo per rimuovere un prodotto
            removeProduct(prod) {

                // Se la quantità è maggiore di 1, viene scalata di 1. (Esempio: Quantità = 2  -> Dopo: Quantità = 1)
                if (prod.quantity > 1) {

                    for (const dish in this.dishes) {
                        if (this.dishes.hasOwnProperty.call(this.dishes, dish)) {

                            const dishOriginal = this.dishes[dish];

                            if (prod.id == dishOriginal.id) {
                                prod.quantity -= 1;

                                prod.price = dishOriginal.price * prod.quantity;

                                this.saveCart();
                            }
                        }
                    }
                // SE la quantità è minore uguale a 1 rimuoviamo direttamente l'elemento dal carrello (Esempio: Quantità = 1 -> Dopo: Elemento eliminato dal carrello)
                } else {

                    if (confirm("Attenzione! sei sicuro di eliminare questo piatto dal carrello?")) {
                        let ind = this.getIndexById(prod.id);
                        this.removeToCart(ind);
                    } 
                    
                }
            },

            getIndexById(id) {

                for (let x = 0; x < this.cart.length; x++) {

                    const cart = this.cart[x];

                    if (cart.id == id) {
                        
                        return x;
                    }
                }
                
                return -1;
            },

            scrollToEnd() {    	
                var containerCart = this.$el.querySelector(".container-cart");

                setTimeout(() => {
                    containerCart.scrollTop = containerCart.scrollHeight;
                }, 1);
            },

            async viewCart(cart) {  // passare il carrello nel blade

                await axios.post('/view/cart/', cart)
                     .then(function (r) {
                        console.log(r.data)
                     })
                     .catch(e => console.error(e))
                
                // Da sistemare
                window.location.href = `/client/checkout`;
            },

            // Metodo per andare al pagamento
            goToPayment() {
                // window.location.href = `/client/checkout`;
            },
        }
    }
</script>

<style scoped lang="scss">
@import url(//db.onlinewebfonts.com/c/3e0066084d445438ba184bc555c216f5?family=Stratos+LC+Web);

.restaurant {
    min-height: 150px;

    .info-restaurant {
        display: flex;
        flex-wrap: wrap;
        padding: 30px;
        border-top: 1px solid #e2e5e5;
        border-bottom: 1px solid #e2e5e5;
        background-color: #fff;
        box-shadow: 0 2px 4px rgb(0 0 0 / 5%);

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
                    font-size: 40px;
                    font-family: Stratos LC Web ,sans-serif;
                    color: #2e3333;
                    font-weight: 600;
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