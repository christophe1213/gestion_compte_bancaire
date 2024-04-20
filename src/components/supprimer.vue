<template>
   <div v-if="afficher" class="message">
        <div class="container">
            <div class="box_message">
            <div class="fermer">
                <svg @click="fermer" viewBox="0 0 24 24" width="24" height="24" >
                        <path fill="#FF2525" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12"/>
                    </svg>
                </div>
                <p class="tittre_message">Vous voulez le supprimer</p>
                    <button class="btn_confi" @click="s">OUI</button>
                    <button class="btn_confi" @click="non_supprimer" >NON</button>     
        </div>        
        </div>
   

    </div>

 </template>
 <script>
 
 import axios from 'axios';
 
 
 export default{
    props:{
        id:'',
  
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
                this.afficher=false
            }).catch((error)=>{
                console.log(error)
            })
            

        },  
        non_supprimer(){
            this.afficher=false
     
        },
        async r(){
            var  r = await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php')
            var solde= await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/solde.php')

                this.$emit('c', r.data, solde.data)
            
            },

            fermer(){
                this.afficher=false
            }
   }
   }
 
 </script>
