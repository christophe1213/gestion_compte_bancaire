<template>

   <div v-if="afficher" class="message">
        <div class="container">
            <div class="form">
                <p class="tittre_message">Ajout </p>
                <input type="text" v-model="client.numCompte" placeholder="numero compte" pattern="[0-9]+" maxlength="5" minlength="5"  required ><br>
                <input type="text" v-model="client.nom" placeholder="Nom" required><br>
                <input type="number" v-model="client.solde" name="solde placeholder"  required ><br>
                <button class="btn_confi" @click="ajout"> Ajouter </button>
            </div>    
        </div>
    </div>

</template>
<script>

import axios from 'axios';

export default{

  data(){
    return{
      test:[],
        client:{
            numCompte:'',
            nom:'',
            solde:''
        },
      afficher:true
      

    }
  },
//   components:{
//     Affichage
//   },
  methods:{
    ajout(){
        
        if(this.client.numCompte!=''&&this.client.nom!=''&&this.client.solde!=''){
            axios.post('http://localhost/gestion_compte_bancaire/backend/Controleur/ajout.php',this.client).then((reponse)=>{
            console.log(reponse)
                this.r()  
            })
          
    
                this.client.numCompte=''
                this.client.nom=''
                this.client.solde=''
                this.afficher=false
                // console.log(this.$emit('m'))
                // console.log("Jja")
                //   this.r()
                // console.log(a)
                // this.$emit('c')

        }
        else{
            alert('Remplire le champs')
        }
     
    },
    c(){
        
        axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php').then((reponse)=>{

       
        
        console.log(t)
        this.$emit('c',t)
    }).catch((error)=>{
        console.log(error)
    })
        // let t=2;
        // this.$emit('c',t)
        // // console.log(this.$emit('c',3))
        // // console.log(t)
        // console.log('G')
        // // console.log(t)
    },
    async r(){
      var  r = await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php')
      var solde= await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/solde.php')

        // this.test= r
        console.log(r.data)
                this.$emit('c', r.data, solde.data)
            
            },
  }
  }

</script>
<style>


</style>