<template>
    <!-- <ajout></ajout> -->
    <main class="table">
        <section class="table_header">
            <h1>The Table</h1>
            <button @click="ajout">ajouter</button>
        </section>
        <section class="table_body">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Solde</th>
                        <th>Ops</th>
                        <th>Modifier</th>
                        <th>supprimer</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data in test " v-bind:key="data.id" >
                        <td>{{ data.nom }}</td>
                        <td>{{ data.solde }}</td>
                        <td> Kaiza </td>
                        <td><button>modifier</button></td>
                        <td><button>supprimer</button></td>
                    </tr>
                </tbody>
            </table>
    </section>
 </main>   
</template>
<script>

import axios from 'axios';
// import affichage from './components/ajout.vue'

export default{
  data(){
    return{
      test:[]
      

    }
  },
  mounted(){
    axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php').then((reponse)=>{
        console.log(reponse.data)
        this.test=reponse.data
    }).catch((error)=>{
        console.log(error)
    })  
  },
  methods:{
    ajout(){
        console.log("Kaiza")
  }
  }
}
</script>
<style>
main.table{
            width: 82vw;
            height: 90vh;
            background-color: #fff5;
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            overflow: hidden;
            position:  absolute;
            top: 0%;
            right: 0px;

          
        }
        .table_header{
            width: 100%;
            height: 10%;
            background-color: #fff4;
            padding: .8rem;
        }
        .table_body{
            width: 95%;
            height:58vh;
            max-height: calc(89%-.1.6rem);
            background-color: #fffb;
            margin: .8rem auto;
            border-radius: .6rem;
            overflow-y:auto;

        }
        .table_body::-webkit-scrollbar{
            width: 0.5rem;
            height: 0.5rem;            
        }
        .table_body::-webkit-scrollbar-thumb{
            border-radius: .5rem;
            background-color: #0004;
            visibility: hidden;

        }
           .table_body:hover::-webkit-scrollbar-thumb{
            visibility: visible;
            
        }
        table,th,td{
            padding: 1rem;
            border-collapse:collapse ;
            text-align: left;

        }
        table{
            width: 100%;
        }
        thead th{
            position: sticky;
            top: 0;
            left: 0;
            background-color: #d5d1defe;
        }
        tbody tr:nth-child(even){
            background-color: #0000000b; 

        }
        tbody tr:hover{
            background-color: #fff6;
        }
</style>