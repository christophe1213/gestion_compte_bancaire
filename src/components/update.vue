<template>

    <div v-if="afficher" class="message">
         <div class="container">
             <div class="form">
                 <p class="tittre_message">Ajout </p>
                 <input type="text" v-model="client.numCompte" placeholder="numero compte" pattern="[0-9]+" maxlength="5" minlength="5"  required ><br>
                 <input type="text" v-model="client.nom" placeholder="Nom" required><br>
                 <input type="number" v-model="client.solde" name="solde placeholder"  required ><br>
                 <button class="btn_confi" @click="ajout"> Ajouter </button>
                 <button @click="c"></button>
             </div>    
         </div>
     </div>
 
 </template>
 <script>
 
 import axios from 'axios';
 
 export default{
    props:{
        numCompte:''
    },
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
    mounted(){
        axios.get('')
    }
   ,
   methods:{
     ajout(){
         if(this.client.numCompte!=''&&this.client.nom!=''&&this.client.solde!=''){
             axios.post('http://localhost/gestion_compte_bancaire/backend/Controleur/ajout.php',this.client).then((reponse)=>{
           console.log(reponse)
             })
                 axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php').then((reponse)=>{
         console.log(reponse.data)
          t=reponse.data[0]
         console.log(6)
         console.log(t)
       
         this.$emit('c',t)
     }).catch((error)=>{
         console.log(error)
     })
     
                 // this.client.numCompte=''
                 // this.client.nom=''
                 // this.client.solde=''
                 // this.afficher=false
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
         let t
         axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php').then((reponse)=>{
         // console.log(reponse.data)
                     
         // console.log(this.$refs.ajout.afficher)
         t=reponse.data[0]
         
         console.log(t)
         this.$emit('c',t)
     }).catch((error)=>{
         console.log(error)
     })
     
         this.$emit('c',t)
         // console.log(this.$emit('c',3))
         // console.log(t)
         console.log('G')
         // console.log(t)
     },
     async r(){
                 var r= await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php')
                 let t =r.data
                 console.log(t)
                 this.$emit('c', t)
                 // return t
             },
   }
   }
 
 </script>
 <style>
 .message{
     background-color: #1115;
     display: flex;
     width: 100vw;
     height: 100vh;
     justify-content: center;
     align-items: center;
     font-family: Arial, Helvetica, sans-serif;
     position: absolute;
     top: 0;
     left:0;
     z-index: 200;
 }
 #insertion_envoyer{
     height: 150vh;
 }
 .container{
     position: relative;
     
 }
 .form{
     position: relative;
     top:0px;
     width: 300px;
     background-color: rgb(255, 255, 255);
     padding: 3rem;
     height: auto;
     border-radius: 20px;
     border-left: 1px rgba(255, 255, 255,.3);
     border-top: 1px rgba(255, 255, 255,.3) ;
     box-shadow: 20px 20px 40px -6px rgba(0,0,0,.3) ;
     text-align: center;
     backdrop-filter: blur(10px);
     -webkit-backdrop-filter: blur(10px);
 
 }
 .tittre_message{
     color:black ;
     font-weight: 500;
     opacity: .7;
     font-size: 1.4rem;
     margin-bottom: 60px;
     text-shadow: 2px 2px 4px rgba(255, 255, 255,.3) ;
 }
 
 input{
     background: transparent;
     border: none;
 
     border-left: 1px solid rgba(255,255,255 ,.3);
     border-top: 1px solid rgba(255,255,255 ,.3); 
     padding: 0.3rem;
     backdrop-filter: blur(10px);
     -webkit-backdrop-filter: blur(10px);
     box-shadow: 4px  4px 60px rgba(0,0,0,.3);
     color: black;
     font-weight: 500;
     text-shadow: 2px 2px 4px rgba(0,0,0,.2);
     /* width: 20px; */
     border-radius: 20px;
     transition: all 0.3s;
     margin-bottom: 2em;
 
 }
 
 input:hover, input[type="text"]:focus{
     background-color: rgba(255,255,255 ,.1);
     box-shadow: 4px  4px 60px 8px rgba(0,0,0,.3);
 }
 input[type="submit"]{
     cursor: pointer;
     margin-top: 10px;
     font-size: 1rem;
     width: 150px;
 
 }
 .selection{
     margin: 10px;
     padding-top: 7px;
     padding-bottom: 7px;
     padding-left: 10px;
     border-radius: 20px;
     text-align: center;
 }
 .selection:optional{
     border-radius: 15px;
 }
 .fermer{
     width: 25px;
     height: 25px ;
     float: right;
     position: relative;
     bottom: 25px;
     left:25px;
 }
 .box_message{
     position: relative;
     top: -80px;
     background-color: white;
     padding: 2rem;
     height: auto;
     border-radius: 20px;
     border-left: 1px rgba(255, 255, 255,.3);
     border-top: 1px rgba(255, 255, 255,.3) ;
     box-shadow: 20px 20px 40px -6px rgba(0,0,0,.3) ;
     text-align: center;
     backdrop-filter: blur(10px);
     -webkit-backdrop-filter: blur(10px);
 
 }
 .tittre_message{
     color:black ;
     font-weight: 500;
     opacity: .7;
     font-size: 1.4rem;
     margin-bottom: 60px;
     text-shadow: 2px 2px 4px rgba(255, 255, 255,.3) ;
 }
 .btn_confi{
     text-align: center;
     width: 100px;
     height: 40px;
     border-radius: 20px;
     border: solid 0.1px white;
     margin-top:-25px;
     margin-left:10px ;
     margin-right:10px ;
     Background-color: white;
     box-shadow: 20px 20px 40px -6px rgba(0,0,0,.3) ;
 }
 
 
 .btn_confi:hover{
     background-color: #47d365;
 }
 
 .btn_confi_lien{
     color: black;
     text-decoration: none;
 }
 .btn_confi_lien:hover{
     color: white;
 }
 .cherche{
     /* display: none; */
     border: none;
 }
 .pdf{
     border-radius:50px ;
     width: 150px;
     height: 50px;
     color: #fff;
     margin: 20px;
     margin-top: -50px;
     background-color: rgba(228, 59, 53, 0.966);
 
   } 
 
 </style>