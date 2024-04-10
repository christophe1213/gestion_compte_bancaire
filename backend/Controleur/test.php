<?php
    // header('Access-Control-Allow-Origin:*');
    // header('Access-Control-Allow-Methods:GET, POST, OPTIONS, PUT, DELETE');
    // header('Access-Control-Allow-Headers: X-Requested-With,Origin,Content-Type,Cookie,Accept');
    // header('Content-Type: application/json');

    require_once(dirname(__FILE__) ."/../Model/Client.php");
    $Clients = new ClientManager();
    $data=$Clients->affichage();
    // echo $data[0];
    // foreach($data as $i){
    //     echo $i;
    // }
    $json = json_encode($data[0]->$nom);
    echo $json;


?>