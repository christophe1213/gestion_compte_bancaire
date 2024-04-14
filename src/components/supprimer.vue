<template>
   <div v-if="afficher" class="message">
    <!-- <h3 v-for="(d, i) in d " v-bind:key="data.id"></h3> -->
        <div class="box_message">
    
                <p class="tittre_message">Vous voulez le supprimer</p>
                    <button class="btn_confi" @click="s">OUI</button>
                    <button class="btn_confi" @click="non_supprimer" >NON</button>     
        </div>

    </div>

 </template>
 <script>
 
 import axios from 'axios';
 
 
 export default{
    props:{
        id:'',
        a:'',
        d:''
    },      
   data(){
     return{
       test:[],
      
       afficher:false
       
 
     }
   },
   methods:{
        s(){
            axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/suppression.php?id='+this.id).then((reponse)=>{
                console.log(reponse)
                this.r()
            }).catch((error)=>{
                console.log(error)
            })
            
            // console.log(this.id)
            // console.log( "data ="+ this.d[1])

        },  
        non_supprimer(){
            this.afficher=false
            // console.log(this.d)
        },
        async r(){
            var  r = await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php')
            var solde= await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/solde.php')

                this.$emit('c', r.data, solde.data)
            
            },
   }
   }
 
 </script>
