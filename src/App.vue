
<template>
     <header>
    
        <h1 class="logo"> Application vuecli </h1>
    </header>

      <affichage @clientData="Client_data"></affichage>
    <!-- <Barchart></Barchart> -->

    <Pie_Chart :client="client"></Pie_Chart>

   
       <section class="info_section ">

        <div class=".foot">
          <div class="contact_nav">
            <a href="https://www.facebook.com/profile.php?id=100072182053162">
              
              <span>
                Thierry Christophe
              </span>
            </a>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBE4DE" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              
              <span>
                Email : demo@gmail.com
              </span>
            </a>
            <a href="https://github.com/christophe1213/gestion_compte_bancaire">
                <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBE4DE" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                </svg>
              <span>
                github:c
              </span>
            </a>
          </div>
    
       
              </div>
 

      </section>
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
    background-color: gray;
    color: #ffffff;
    padding: 45px 0;
    position:relative;
    top:18vh;
    right: 0vw;
    width: vw;

}
  .info_section {
  background-color: #252525;
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
</style>
