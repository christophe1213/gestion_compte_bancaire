<template>
  <Bar/>
    
</template>
<script>
  import { Bar } from 'vue-chartjs'
//   import { chart as ChartJS, Title, Legend, BarElement, CategoryScale, LinearScale} from 'chart.js'
//   ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale )
  export default {
    components:{ Bar }, 
    data() {
        return {
            ChartData:{
                labels:['January','January','January'],
                datasets:[{data:[40,20,12]}]
            },
            chartOptions:{
                responsive:true
            }
        } 
    }
  }
</script>
