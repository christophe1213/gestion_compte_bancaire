
<template>
    <affichage @clientData="Client_data"></affichage>
    <!-- <Barchart></Barchart> -->
    <Pie_Chart :client="client"></Pie_Chart>
</template>
<script>
    import { RouterLink, RouterView } from 'vue-router'
    import HelloWorld from './components/HelloWorld.vue'
    import affichage from './components/affichage.vue'
    // import graphe from '@/components/graphe.vue'
    import Barchart from '@/components/Barchart.vue'
    import Pie_Chart from '@/components/Pie_Chart.vue'


    export default{
        components:{
            affichage,
            Pie_Chart
        },
        data(){
            return {
                client:[]
            }
        },

        methods:{
            Client_data(value){
                this.client=value
                // console.log("This.Client="+this.client)
                console.log("This.client"+this.client.soldeMax)
            }
        }
    }

</script>


<style scoped>

</style>
