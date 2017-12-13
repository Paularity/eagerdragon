<template>
  <div class="col-md-12 chart-wrapper">
    <div >
        <bar-chart :options="{responsive: false, maintainAspectRatio: false}"
        :chart-data="datacollection"></bar-chart>
    </div>
  </div>
</template>

<script>
  import BarChart from './barChart.js'

  export default {
    components: {
      BarChart
    },
    data () {
      return {
        datacollection: null
      }
    },
    mounted () {
      this.fillData()
    },
    methods: {
      fillData () {
        this.datacollection = {
          labels: [
            this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
          ],
          datasets: [
            {
              label: 'Data One',
              backgroundColor: '#f87979',
              data: [
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                this.getRandomInt(),
                ]
            }
          ]
        }
      },
      getRandomInt () {
        return Math.floor(Math.random() * (50 - 5 + 1)) + 5
      }
    }
  }
</script>
