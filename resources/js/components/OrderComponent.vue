<template>
<div>

    <h1>Ecco gli ordini effettuati presso il tuo ristorante</h1>

    <div class="container">

        <div class="row">

            <!-- <div class="orders">
                <div v-for="order in orders" :key="order.id">
                    <p>{{order.total_price}}</p>
                    <p>{{order.date}}</p>

                </div>
            </div> -->
            
        </div>

    </div>


    <div class="advertisement">

        <div class="container">

            <div class="row">

                <div class="visibility-ad col-md-6 col-sm-12 text-sm-center text-md-left my-2">

                    <h2>Vuoi aumentare la tua visibilit&agrave;?</h2>

                    <p>Guarda Le nostre tariffe di sponsorizzazione: i nostri partner aumentano del 100% la propria visibilit&agrave; con un semplice click!</p>

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

                    <h2>Guarda le interviste dei nostri partner!</h2>

                    <button class="sponsor-button my-2">Interviste</button>

                    <p class="my-2">Clicca sull'immagine per vedere il video di un nostro dipendente che ti spiegher&agrave; come attivare l'abbonamento e aumentare la tua visibilit&agrave;</p>

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
                orders: []
            }
        },
        mounted() {
        this.getOrdersById()
        },
        methods: {
            getOrdersById() {
                axios.get("/order/statistics/page/")
                .then((r) => console.log(r.data))
                .catch((e) => console.error(e));
            }
        },
}
</script>
