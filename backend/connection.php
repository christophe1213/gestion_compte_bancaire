<?php
    
    // header('Access-Control-Allow-Origin:*');
    // header('Access-Control-Allow-Methods:GET, POST, OPTIONS, PUT, DELETE');
    // header('Access-Control-Allow-Headers: X-Requested-With,Origin,Content-Type,Cookie,Accept');
    // header('Content-Type: application/json');
    $server="localhost";
    $user="root";
    $mot_passe="";
    $dbName= "compte_bancaire";

    $conn= new mysqli($server, $user, $mot_passe, $dbName);

    if($conn->connect_error){
        die ("Echec de connection".$conn->error);
    }
  

?>