<template>
    <!-- resources/assets/js/components -->
    <div>
        <canvas class="container" id="myChart"></canvas>
    </div>
</template>

<script>
    import {Chart} from 'Chart.js';
    export default {
        data: function(){
            return {

                tp: [],
                dt: []
            }
        },
        props: {
            labels: Array,
            dataProp: Array,
        },
        methods: {
            renderChart() {
                this.dataProp.forEach(element => {
                    this.tp.push(element.total_price)
                    // this.tp = element.clients[address] + parseFloat(element.total_price);
                });
                console.log(this.tp);
                this.labels.forEach(element => {
                    this.dt.push(element.date)
                    // this.dt += element.date;
                    // console.log(dt);
                });
                new Chart(document.getElementById('myChart').getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: this.dt,
                        datasets: [{
                            label: 'Statistiche ordini',
                            data: this.tp,
                            borderColor: 'rgb(75, 192, 192)'                           
                        }]
                        },
                    options: {
                        title: {
                            display: true,
                            fontSize: 22,
                            text: 'Example'
                        }
                    }
                });
            }
        },
        mounted() {
            this.renderChart();
        }
    }
</script>

