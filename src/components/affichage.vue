<template>
 
    <ajout @c=" recuperation_donne_elt_enfant" ref="ajout" ></ajout>
    <modifier @c="recuperation_donne_elt_enfant" :client_modifier="client_traite" ref="modifier"></modifier>
    <supprimer @c="recuperation_donne_elt_enfant" :id="client_traite.numCompte" ref="supprimer"></supprimer>
    <main class="table">
        <section class="table_header">
            <h1></h1>
            <!-- <button @click="ajout">ajouter</button> -->
        
            <div class="btn_ajout" title="ajouter">
                <svg @click="ajout" viewBox="0 0 24 24" width="30" height="30">
                    <path d="M12 2c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zm4 11h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2z"/>
                </svg>
            </div>
            
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
                        <!-- <td><button @click="modifier_btn(i)">modifier</button></td> -->
                        <td class="modifier" title="modifier">
                            <svg  @click="modifier_btn(i,data)" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#399913" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </td>
                        <td class="supprimer" title="supprimer">
                            <svg @click="b(data.numCompte)" x="0px" y="0px" width="24" height="24" viewBox="0 0 30 30">
                                    <path fill="red" d="M 14.984375 2.4863281 A 1.0001 1.0001 0 0 0 14 3.5 L 14 4 L 8.5 4 A 1.0001 1.0001 0 0 0 7.4863281 5 L 6 5 A 1.0001 1.0001 0 1 0 6 7 L 24 7 A 1.0001 1.0001 0 1 0 24 5 L 22.513672 5 A 1.0001 1.0001 0 0 0 21.5 4 L 16 4 L 16 3.5 A 1.0001 1.0001 0 0 0 14.984375 2.4863281 z M 6 9 L 7.7929688 24.234375 C 7.9109687 25.241375 8.7633438 26 9.7773438 26 L 20.222656 26 C 21.236656 26 22.088031 25.241375 22.207031 24.234375 L 24 9 L 6 9 z"></path>
                            </svg>
                        </td>
                        <!-- <modifier @c="recuperation_donne_elt_enfant" :id="data.numCompte" :client_modifier="data" ref="modifier"></modifier> -->
                 
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
        client_traite:[],
   
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
        },
        traitemnt(){
           return function(s){
            return s
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
            modifier_btn(i,c){
                this.$refs.modifier.afficher=true
                console.log(i)
                console.log(c)
                this.client_traite=c
                // this.traitemnt(c)
                console.log(this.client_traite)
                
           
           
            },
            recuperation_donne_elt_enfant(value1, value2){

            
                this.client=value1
                this.solde=value2
                // this.$emit('clientData',this.test)
                this.$emit('clientData',this.solde)
                // console.log(this.t)
            },
            b(i){
                this.client_traite.numCompte=i
                this.$refs.supprimer.afficher=true

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
svg{
    cursor: pointer;
}
.btn_ajout svg:hover,.modifier svg:hover {
    stroke: beige;
}
.modifier svg:hover {
    background-color: rgb(33, 192, 33);
  
    
}
.supprimer svg:hover{ 
    background-color: red;
}

.supprimer svg:hover path, .fermer svg:hover path{  
    fill: beige;
}

</style>