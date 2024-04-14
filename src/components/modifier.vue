<template>
    <div v-if="afficher" class="message">
         <div class="container">
             <div class="form">
                 <p class="tittre_message">Modifier </p>
                 <input type="text" v-model="client.numCompte" placeholder="numero compte" pattern="[0-9]+" maxlength="5" minlength="5"  required ><br>
                 <input type="text" v-model="client.nom" placeholder="Nom" required><br>
                 <input type="number" v-model="client.solde" name="solde placeholder"  required ><br>
                 <button class="btn_confi" @click="modifier"> Modifier </button>           
             </div>    
         </div>
     </div>
 
 </template>
 <script>
 
 import axios from 'axios';
    
    export default{
        props:{
            client_modifier:Object,
        },
    data(){
        return{
            test:[],
                client:{
                    numCompte:this.client_modifier.numCompte,
                    nom:this.client_modifier.nom,    
                    solde:this.client_modifier.solde
                },
            afficher:false
        
    
            }
    },
    methods:{
       modifier(){
            axios.post('http://localhost/gestion_compte_bancaire/backend/Controleur/mise_ajour.php',this.client).then((reponse)=>{
                console.log(reponse)
                this.r()
                this.afficher=false
            }).catch((error)=>{
                console.log(error)
            })
            
            
        },
        async r(){
            var  r = await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php')
            var solde= await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/solde.php')

            this.$emit('c', r.data, solde.data)
                
        },
    }
    }
 
 </script>
 