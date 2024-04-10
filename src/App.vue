
<template>
    <affichage @clientData="Client_data"></affichage>
    <!-- <Barchart></Barchart> -->
    <PieChart :client="client"></PieChart>
</template>
<script>
    import { RouterLink, RouterView } from 'vue-router'
    import HelloWorld from './components/HelloWorld.vue'
    import affichage from './components/affichage.vue'
    // import graphe from '@/components/graphe.vue'
    import Barchart from '@/components/Barchart.vue'
    import PieChart from '@/components/PieChart.vue'


    export default{
        components:{
            affichage,
            PieChart
        },
        data(){
            return {
                client:[]
            }
        },
        methods:{
            Client_data(value){
                this.client=value
                console.log("This.Client="+this.client)
            }
        }
    }

</script>


<style scoped>

</style>
