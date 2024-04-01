<template>
   <div class="message">
        <div class="container">
            <form action="insertion_intineraire.php" method = "POST">
                <a href="interface_intineraire.php"><img src="../../Style/icons/delete.png" class="fermer" alt="fermer" title="fermer"></a>
                <p class="tittre_message">Ajout </p>
                <input type="text" id="codeit" name="codeit" placeholder="Code intineraire" pattern="[Ii][0-9]+" title="le format pour le code intineraire est I suivi d'un nombre" required ><br>
                <input type="text" id="villedep" name="villedep" placeholder="Ville départ" required><br>
                <input type="text" id="villearriv" name="villearriv" placeholder="Ville d'arrivée"  required ><br>
                <input  type="submit"value ="Ajouter" id="Ajout" >
            </form>
        </div>
    </div>
</template>
<script>

// import axios from 'axios';


// export default{
//   data(){
//     return{
//       test:[]
      

//     }
//   },
//   methods:{
//     ajout(){
//         console.log("Kaiza")
//   }
//   }
// }
</script>
<style>

</style>