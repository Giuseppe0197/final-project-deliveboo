<template>
<div>

    <div class="advertisement">

        <h1 class="text-center pt-5 pb-4">Ecco gli ordini effettuati presso il tuo ristorante</h1>

        <div class="container">
            
            <div class="container-table">
                <table class="table table-hover ms-table">
                    <thead>
                        <tr>
                            <th scope="col">Numero ordine</th>
                            <th scope="col">Prezzo totale</th>
                            <th scope="col">Stato ordine</th>
                            <th scope="col">Data</th>
                            <th scope="col">Info Cliente</th>
                            <th scope="col">Dettagli ordine</th>
                        </tr>
                    </thead>
                    <tbody v-for="order, i in ordersRestaurant" :key="i">

                        <tr>
                            <td>{{ order.id }}</td>
                            <td>{{ order.total_price }} &euro;</td>
                            <td>
                                <p v-if="order.payment_status" class="d-inline-block text-success font-weight-bold">
                                    &#10004;
                                </p>
                                <p v-else class="d-inline-block text-danger font-weight-bold">
                                    &#10060;
                                </p>
                            </td>
                            <td>{{ order.date }}</td>
                            <td>
                                <!-- Info client -->
                                <div>
                                    <span class="d-block">
                                        Nome: <span class="text-muted"> {{ order.name }} </span>
                                    </span>
                                    <span class="d-block">
                                        Cognome: <span class="text-muted"> {{ order.lastname }} </span>
                                    </span>
                                    <span class="d-block">
                                        Email: <span class="text-muted"> {{ order.email }} </span>
                                    </span>
                                    <span class="d-block">
                                        Telefono: <span class="text-muted"> {{ order.phone }} </span>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-dishes" @click.prevent="getDishes(order.id)">
                                    Visualizza dettaglio ordine
                                </button>
                            </td>
                        </tr>
                        <tr v-if="selectedOrder == order.id" class="container-dishes-order">
                            <td class="p-0" colspan="12">
                                <table class="table table-hover ms-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Descrizione</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Quantità</th>
                                            <th scope="col">Prezzo</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr v-for="dish, j in orderDishes" :key="'B' + j">
                                            <td>{{ dish.name }}</td>
                                            <td>{{ dish.description }}</td>
                                            <td>{{ dish.type }}</td>
                                            <td>{{ dish.dish_quantity }}</td>
                                            <td>{{ dish.price }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="visibility-ad col-md-6 col-sm-12 text-sm-center text-md-left my-2">

                    <h2>Vuoi aumentare la tua visibilit&agrave;?</h2>
                    <p>
                        Guarda Le nostre tariffe di sponsorizzazione: i nostri partner aumentano del 100% la propria visibilit&agrave; con un semplice click!
                    </p>
                    <button class="sponsor-button">Offerte!</button>
                </div>

                <div class="col-md-6 col-sm-12 image-ad text-md-right text-sm-center my-2">
                    <img src="/storage/images/visibility.png" alt="">
                </div>
            </div>

            <hr>

            <div class="row my-2">

                <div class="interview-image col-md-6 col-sm-12 text-md-left text-sm-center my-2">
                    <img src="/storage/images/interview-2.jpg" alt="">
                </div>

                <div class="interview-read col-md-6 col-sm-12 text-md-right text-sm-center my-2">

                    <h2>
                        Guarda le interviste dei nostri partner!
                    </h2>
                    <button class="sponsor-button my-2">Interviste</button>
                    <p class="my-2">
                        Clicca sull'immagine per vedere il video di un nostro dipendente che ti spiegher&agrave; come attivare l'abbonamento e aumentare la tua visibilit&agrave;
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
    export default {

        data: function () {
            return {
                selectedOrder: -1,
                orderDishes: [],
                ordersRestaurant: []
            }
        },

        props: {
            restaurant_id: String,
            orders: Array
        },

        mounted() {

            this.ordersRestaurant = this.orders;
            console.log(this.ordersRestaurant);
        },

        methods: {
            
            // Funzione per ritornare le informazioni di ogni singolo ordine
            async getDishes(id) {

                // Assegno l'id dell'ordine alla variale -> selectedOrder (in modo che posso visualizzare ogni singolo ordine)
                this.selectedOrder = this.selectedOrder == id ? -1 : id;

                // Chiamata axios per ritornare tutte le info dei piatti di ogni singolo ordine
                await axios.get(`/order/statistics/page/` + id)
                    .then((r) => {
                        this.orderDishes = r.data
                    })
                    .catch((e) => console.error(e));

                this.scrollToEnd()
            },

            // Autoscroll container dishes order
            scrollToEnd() {    	
                var containerdishes = this.$el.querySelector(".container-dishes-order");

                containerdishes.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
            },
        },
}
</script>

<style scoped lang="scss">

.container-table {
    max-height: 520px;
    overflow: auto;
    border: 1px solid #dee2e6;
    margin-bottom: 100px;
    box-shadow: 0 6px 20px rgb(0 0 0 / 8%);

    &::-webkit-scrollbar {
        width: 7px;
    }

    &::-webkit-scrollbar-thumb {
        border-radius: 6px;
        background-color: #00ccbc;
    }

    button.btn-dishes {
        max-width: 65%;
        background-color: #00ccbc;
        border: 0;
        color: #fff;
    }

    .table-td {
        font-size: 15px;
    }

    .table th, .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        text-align: center;
    }

    .container-dishes-order {
        border-bottom: 3px solid #00ccbc;
        border-top: 3px solid #00ccbc;
    }
}


</style>
