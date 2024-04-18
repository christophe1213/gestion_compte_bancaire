<template>
    <div v-show="afficher" class="message" >
          <div class="container">
             <!-- <div class="form"> -->
                <!-- <div class="fermer">
                    <svg @click="fermer" viewBox="0 0 24 24" width="24" height="24" >
                        <path fill="#FF2525" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12"/>
                    </svg>
                </div> 
                 <p class="tittre_message">Modifier </p>
                 <input type="text" v-model="client.numCompte" placeholder="numero compte" pattern="[0-9]+" maxlength="5" minlength="5"  required ><br>
                 <input type="text" v-model="client.nom" placeholder="Nom" required><br>
                 <input type="number" v-model="client.solde" name="solde" placeholder="solde"  required ><br>
                 <button class="btn_confi" @click="modifier"> Modifier </button>            -->
             <!-- </div>    
         </div> -->
         <form class="form" :onSubmit="modifier">
            <div class="fermer">
                    <svg @click="fermer" viewBox="0 0 24 24" width="24" height="24" >
                        <path fill="#FF2525" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12"/>
                    </svg>
                </div> 
                 <p class="tittre_message">Modifier </p>
                 <input type="text" v-model="client.numCompte" placeholder="numero compte" pattern="[0-9]+" maxlength="5" minlength="5"  required ><br>
                 <input type="text" v-model="client.nom" placeholder="Nom" required><br>
                 <input type="number" v-model="client.solde" name="solde" placeholder="solde"  required ><br>
                 <button class="btn_confi" type="submit"> Modifier </button>       
         </form>
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
            c:{
                numCompte:'',
                    nom:'',    
                    solde:''
            },
                client:{},
            afficher:false,
            a:4
        
    
            }
    },
    watch:{
        client_modifier:{
            handler(newItem){
                this.client={...newItem}
            },
            deep:true
        }
    },
    computded:{
        x(){
            return function(s){
                return s
            }
        }
    },
//    mounted(){
//     alert('kk')
//       if(this.afficher){
//         this.client=this.client_modifier
//       }  
//    },


//   beforeUpdate(){
//         console.log(this.client_modifier.nom)


//         // console.log('Modifier'+this.client_modifier.nom)
 
//         // console.log("a="+a.nom)
//         // console.log("this.client="+this.client.nom)
//     },
//     updated(){
//         // this.client=this.client_modifier
//         console.log(this.client.nom)
//         // this.client=this.client_modifier
//     },
    // Update(){
    //         var a = {
    //                 numCompte:this.client_modifier.numCompte,
    //                 nom:this.client_modifier.nom,    
    //                 solde:this.client_modifier.solde
    //     }
    //     this.client=a
    //     console.log("a="+a.nom)
    //     console.log("this.client="+this.client.nom)
    // },
    // beforeUpdate(){
    //     this.client=this.client_modifier
    // },
    // beforeUpdate(){
    //     if(this.afficher){
    //         this.client=this.client_modifier
    //     }else{
    //         this.client.numCompte='' 
    //     }
    //     console.log(this.client.numCompte)
    // //    console.log("a="+this.a)
    // //    alert('Kaez')
    ///},
    methods:{
       modifier(e){
        e.preventDefault()
            axios.post('http://localhost/gestion_compte_bancaire/backend/Controleur/mise_ajour.php',this.client).then((reponse)=>{
                console.log(reponse)
                this.r()
                this.afficher=false
            }).catch((error)=>{
                console.log(error)
                alertt("Il y a une error lors de l'ajout de client")
            })
        },
        async r(){
            var  r = await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php')
            var solde= await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/solde.php')

            this.$emit('c', r.data, solde.data)
                
        },
        fermer(){
      this.afficher=false
    },
    h(a){
        this.a=a
    }
    }
    }
 
 </script>
 