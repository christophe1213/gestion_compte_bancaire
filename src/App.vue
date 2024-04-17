
<template>
     <header>
    
        <h1 class="logo"> Application vuecli </h1>
    </header>
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
 #app{
    background-color: black;
    display: none;
    display: grid;
    grid-template-areas: "tete"
                         "donne "
                        " graphe";
 }
header{
    grid-area: tete;
}
 
.table {
    grid-area: donne;
    background-color: black; 
}
.histogramme{
    grid-area: graphe;
    /* text-align: center;
    width:100vw;
    height: 100vh; */
    position: relative;
    top:100px;
}
.histogramme h1{
    text-align: ce;
}

</style>
