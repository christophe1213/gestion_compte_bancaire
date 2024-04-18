<template>

   <div v-if="afficher" class="message ">
        <div class="container">
           
            <!-- <div class="form"> -->
              <!-- <div class="fermer">
                <svg @click="fermer" viewBox="0 0 24 24" width="24" height="24" >
                        <path fill="#FF2525" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12"/>
                    </svg>
            </div>
                <p class="tittre_message">Ajout </p>
                <input type="text" v-model="client.numCompte" placeholder="numero compte" pattern="[0-9]+" maxlength="5" minlength="5"  required ><br>
                <input type="text" v-model="client.nom" placeholder="Nom" required><br>
                <input type="number" v-model="client.solde" name="solde placeholder"  required ><br>
                <button class="btn_confi" @click="ajout"> Ajouter </button> -->
            <!-- </div>     -->
            <form class="form" :onSubmit="ajout" >
              <div class="fermer">
                <svg @click="fermer" viewBox="0 0 24 24" width="24" height="24" >
                        <path fill="#FF2525" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12"/>
                    </svg>
              </div>
                <p class="tittre_message">Ajout </p>
                <input type="text" v-model="client.numCompte" placeholder="numero compte" pattern="[0-9]+" maxlength="5" minlength="5"  required ><br>
                <input type="text" v-model="client.nom" placeholder="Nom" pattern="[a-z]+"required><br>
                <input type="number" v-model="client.solde" name="solde "placeholder="solde"  required ><br>
                <button class="btn_confi" type="submit"> Ajouter </button>
            </form>
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
      afficher:false
      

    }
  },
//   components:{
//     Affichage
//   },
  methods:{
    ajout(e){
      e.preventDefault()
        if(this.client.numCompte!=''&&this.client.nom!=''&&this.client.solde!=''){
            axios.post('http://localhost/gestion_compte_bancaire/backend/Controleur/ajout.php',this.client).then((reponse)=>{
            console.log(reponse.data)
            if(reponse.data!=='Succès')alert('Erreur veuillez vérifier le formulaire')
            else{
          
                this.client.numCompte=''
                this.client.nom=''
                this.client.solde=''
                this.afficher=false
                this.r()  
            }
      
            })
          
    
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
    fermer(){
      this.afficher=false
    }
  }
  }

</script>
<style>


</style>