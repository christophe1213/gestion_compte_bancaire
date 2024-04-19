
<template>
    <head_project></head_project>
      <affichage @clientData="Client_data"></affichage>
    <!-- <Barchart></Barchart> -->

    <Pie_Chart :client="client"></Pie_Chart>
    <foot></foot>
</template>
<script>
    import head_project from '@/components/head_project.vue'
    import affichage from './components/affichage.vue'
    // import graphe from '@/components/graphe.vue'
    import Barchart from '@/components/Barchart.vue'
    import Pie_Chart from '@/components/Pie_Chart.vue'
    import foot from'@/components/foot.vue'

    export default{
        components:{
            head_project ,
            affichage,
            Pie_Chart,
            foot
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
               
            }
        }
    }

</script>


<style scoped>

header{
    grid-area: tete;
}

.table {
    grid-area: donne;
    background-color: black; 
}
.contener_graphe{
  
    
    text-align: center;
    position: relative;
    top: 100px;
    height: 100vh;

}
.histogramme{
    grid-area: graphe;
    /* text-align: center;
    width:100vw;
    height: 100vh; */
    text-align: center;
    position: relative;
   
    background-color: aqua;
    /* top:100px; */
    width: 82vw;
    height:1000vh ;
}
.histogramme h1{
    color: black;
   
}
footer{
    /* background-color: gray;
    color: #ffffff;
    padding: 45px 0; */
    /* position:relative;
    top:18vh;
    right: 0vw; */
    /* width: vw; */

}
  .info_section {
  background-color: #312f2f;;
  color: #ffffff;
  padding: 45px 0;
    position:relative;
    top:30vh;
    /* right: 5vw; */
    /* padding-left: 500px;
    padding-right: 500px; */


}

.info_section .contact_nav {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  padding: 25px 0;
  text-align: center;
}

.info_section .contact_nav a {
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  margin: 0;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  color: #ffffff;
}

.info_section .contact_nav a i {
  font-size: 28px;
}

.info_section .contact_nav a:hover {
  color: #f07b26;
}
/* header, main.table,.contener_graphe{display: none;} */

/* footer section*/



/*# sourceMappingURL=style.css.map */
</style>
