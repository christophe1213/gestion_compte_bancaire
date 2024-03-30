<?php
    // header('Access-Control-Allow-Origin:*');
    // header('Access-Control-Allow-Methods:GET, POST, OPTIONS, PUT, DELETE');
    // header('Access-Control-Allow-Headers: X-Requested-With,Origin,Content-Type,Cookie,Accept');
    // header('Content-Type: application/json');

    require_once(dirname(__FILE__) ."/../Model/Client.php");
    $Clients = new ClientManager();
    $numCompte ="00001";
    $nom="Rabe";
    $solde=1000;
    $Clients->misse_ajour($numCompte, $nom, $solde);
    // $json = json_encode($data);
    // echo $json;


?>