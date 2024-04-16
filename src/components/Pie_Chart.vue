<template>
<div class="histogramme">
  <h1>Camembert</h1>
  <Pie
      :options="chartOptions"
      :data="chartData"
      :id="chartId"
      :dataset-id-key="datasetIdKey"
      :plugins="plugins"
      :css-classes="cssClasses"
      :styles="styles"
      :width="width"
      :height="height"
    />
</div>

  </template>
  
  <script>
  import { Pie } from 'vue-chartjs'
  
  import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    ArcElement,
    CategoryScale
  } from 'chart.js'
  
  ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale)
  
  export default {
    name: 'PieChart',
    components: {
      Pie
    },
    props: {
      chartId: {
        type: String,
        default: 'pie-chart'
      },
      datasetIdKey: {
        type: String,
        default: 'label'
      },
      width: {
        type: Number,
        default: 100
      },
      height: {
        type: Number,
        default: 100
      },
      cssClasses: {
        default: '',
        type: String
      },
      styles: {
        type: Object,
        default: () => {}
      },
      plugins: {
        type: Array,
        default: () => []
      },
      client:Object
    },
    data() {
      return {
        // chartData:null,
        chartData: {
          // labels: this.client.map(item=>item.nom),
              labels:['solde Total', 'solde maximal', 'solde mininmal'],
          datasets: [
            {
              backgroundColor: ['#41B883', '#E46651', '#00D8FF',],
              // data: this.client.map(item=>item.solde)
              data:[this.client.soldeTotal,this.client.soldeMax,this.client.soldeMin]
            }
          ]
        },
        // chartData: {
        // labels: ['VueJs', 'EmberJs', 'ReactJs', 'AngularJs'],
        // datasets: [
        //   {
        //     backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#DD1B16'],
        //     data: [40, 20, 80, 10]
        //   }
        // ]

        // },
        chartOptions: {
    
        }
      }
    },
 
  beforeUpdate(){
    // console.log('Monté : '+this.client.map(item => item.nom))
           var    c= {
              
            // labels: this.client.map(item=>item.nom),
            labels:['solde Total', 'solde maximal', 'solde mininmal'],
          datasets: [
            {
              backgroundColor: ['#41B883', '#E46651', '#00D8FF',],
              // data: this.client.map(item=>item.solde)
                data:[this.client.soldeTotal,this.client.soldeMax,this.client.soldeMin]

            }]
              }
        this.chartData=c
  },
    updated(){
      // console.log("Data chartjs : "+this.client.map(item => item.nom))
        //   var    c= {
              
        //     labels: this.client.map(item=>item.nom),
        //   datasets: [
        //     {
        //       backgroundColor: ['#54823', '#E4551'],
        //       data: this.client.map(item=>item.solde)
        //     }]
        //       }
        // this.chartData=c
      
    },  
    methods:{
      x(){
        console.log(this.client)
      }
    },
    
  }
  </script>
<style>


</style>
