<template>
 
    <ajout @c=" recuperation_donne_elt_enfant" ref="ajout" ></ajout>
    <main class="table">
        <section class="table_header">
            <h1></h1>
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
                    <tr v-for="(data, i) in client " v-bind:key="data.id" >
                        <td>{{ data.nom }}</td>
                        <td>{{ data.solde }} Ar</td>
                        <td> {{ ops(data.solde)   }}</td>
                        <td><button @click="modifier_btn(i)">modifier</button></td>
                        <td><img @click="b(i)" src="./icons/supprimer.png" alt="supprimer" width="25px" height="25px"></td>
                        <modifier @c="recuperation_donne_elt_enfant" :id="data.numCompte" :client_modifier="data" ref="modifier"></modifier>
                      
                        <supprimer @c="recuperation_donne_elt_enfant" :id="data.numCompte"  :d="client" ref="supprimer"></supprimer>
                       
                    </tr>
                </tbody>
            </table>
    
    
    </section>
    <div>
        solde Total : {{ solde.soldeTotal }} Ar
        solde Min : {{ solde.soldeMin }} Ar
        solde Max : {{ solde.soldeMax }} Ar 
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
        client:[],
        solde:[],
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
                if(s<1000) return 'Insuiffissant'
                else if(s>1000&&s<=5000) return 'Moyen'
                else return 'éléve'
        
            }
        }
        },          
        mounted(){
                this.afficher()
                this.$refs.ajout.afficher=false
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
            recuperation_donne_elt_enfant(value1, value2){

            
                this.client=value1
                this.solde=value2
                // this.$emit('clientData',this.test)
                this.$emit('clientData',this.solde)
                // console.log(this.t)
            },
            b(i){
                
                this.$refs.supprimer[i].afficher=true

            },
            async afficher(){
                var  r = await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/Affichage_donne.php')
                var solde= await axios.get('http://localhost/gestion_compte_bancaire/backend/Controleur/solde.php')
                this.solde =solde.data
                this.client=r.data
                this.$emit('clientData',this.solde)
                    
            },
        }
        }
</script>
<style>

</style>