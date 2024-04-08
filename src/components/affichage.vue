<template>
 
    <ajout @c="a" ref="ajout" ></ajout>
    <main class="table">
        <section class="table_header">
            <h1>The Table</h1>
            <p>{{ t }}</p>
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
                    <tr v-for="(data, i) in test " v-bind:key="data.id" >
                        <td>{{ data.nom }}</td>
                        <td>{{ data.solde }}</td>
                        <td> {{ ops(data.solde)   }}</td>
                        <modifier :id="data.numCompte" :client_modifier="data" ref="modifier"></modifier>
                        <td><button @click="modifier_btn(i)">modifier</button></td>
                        <supprimer @c="a" :id="data.numCompte" :a="t"  :d="test" ref="supprimer"></supprimer>
                        <td><button @click="b(i)">supprimer</button></td>
                    </tr>
                </tbody>
            </table>
    
    </section>
    <div>
        solde Total : {{ solde }} Ar
    </div>
 </main>

</template>
<script>
import Ajout from '@/components/ajout.vue';
import Supprimer from '@/components/supprimer.vue';
import Modifier from '@/components/modifier.vue';
import axios from 'axios';


export default{
  data(){
    return{
      test:[],
      t:70,
      solde:'',
      message: 'Hello world'
    }
  },
  components:{
    Ajout,
    Supprimer,
    Modifier
  },
  computed:{
    ops(){
        return function(s){
            if(s<1000) return 'Insuifissant'
            else if(s>1000&&s<=5000) return 'Moyen'
            else return 'éléve'
      
        }
    },
    afficher(){
       axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php').then((reponse)=>{
        this.$refs.ajout.afficher=false
        this.test=reponse.data
        }).catch((error)=>{
            console.log(error)
        })
        }
    },          
  mounted(){
    // let s = setInterval(()=>{
    //     axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php').then((reponse)=>{
    //     // console.log(reponse.data)
    //     this.$refs.ajout.afficher=false
    //     // console.log(this.$refs.ajout.afficher)
    //     this.test=reponse.data
    // }).catch((error)=>{
    //     console.log(error)
    // })
    
    // axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/solde.php').then((reponse)=>{
    //     this.solde=reponse.data
    // },1000)
    // })
    axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php').then((reponse)=>{
        // console.log(reponse.data)
        this.$refs.ajout.afficher=false
        // console.log(this.$refs.ajout.afficher)
        this.test=reponse.data
    }).catch((error)=>{
        console.log(error)
    })
    
    axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/solde.php').then((reponse)=>{
        this.solde=reponse.data
    })
  },
  methods:{
    ajout(){
        if(!this.$refs.ajout.afficher)this.$refs.ajout.afficher=true

  },
    modifier_btn(i){
        console.log(i)
        console.log(this.$refs.modifier[i])
        this.$refs.modifier[i].afficher=true
    },
    a(value1, value2){
        // alert(value)
        // this.t=value
        console.log("4")
        this.test=value1
        this.solde=value2
        // console.log(this.t)
    },
    b(i){
        console.log(this.$refs.supprimer[0])
        
        this.$refs.supprimer[i].afficher=true
        // this.$refs.supprimer[i].supprimer()
        // this.r()

    },
    async r(){
        var r= await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php')
        this.test=r.data
        console.log(this.test[1])
    },
    m(){
        console.log("Salut")
    }

  }
}
</script>
<style>
.display{
    display: none;
}
main.table{
    width: 750px;
    /* height: 90vh; */
    background-color: #fff5;
    backdrop-filter: blur(7px);
    box-shadow: 0 .4rem .8rem #0005;
    border-radius: .8rem;
    /* overflow: hidden; */
  
    /* visibility: hidden; */
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
    overflow:auto;

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
    position:sticky;
    top: 0;
    left: 0;
    background-color: #d5d1defe;
}

td img{
    width: 25px;
    height: 25px;
}
tbody tr:nth-child(even){
    background-color: #0000000b; 

}
tbody tr:hover{
    background-color: #fff6;
}
.icons{
    width: 25px;
    height: 25px;
}
</style>