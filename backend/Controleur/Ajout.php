<?php
    // header('Access-Control-Allow-Origin:*');
    // header('Access-Control-Allow-Methods:GET, POST, OPTIONS, PUT, DELETE');
    // header('Access-Control-Allow-Headers: X-Requested-With,Origin,Content-Type,Cookie,Accept');
    // header('Content-Type: application/json');

    require_once(dirname(__FILE__) ."/../Model/Client.php");
    $Clients = new ClientManager();
    $numCompte ="00005";
    $nom="Rabe";
    $solde=1000;
    $data= json_decode(file_get_contents("php://input"),true);
    if(isset($data["numCompte"]) && $data["nom"]&&$data['solde']){
        $Clients = new ClientManager();
        $numCompte =$data['numCompte'];
        $nom=$data['nom'];
        $solde=$data['solde'];
    }
    $Clients->insertion($numCompte, $nom, $solde);
    // $json = json_encode($data);
    // echo $json;


?>