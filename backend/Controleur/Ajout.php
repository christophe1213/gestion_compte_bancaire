<?php
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:GET, POST, OPTIONS, PUT, DELETE');
    header('Access-Control-Allow-Headers: X-Requested-With,Origin,Content-Type,Cookie,Accept');
    header('Content-Type: application/json');

    require_once(dirname(__FILE__) ."/../Model/Client.php");
    $Clients = new ClientManager();
    $data= json_decode(file_get_contents("php://input"),true);
    if(isset($data["numCompte"])&&isset($data['nom'])){
        $numCompte =$data['numCompte'];
        $nom=$data['nom'];
        $solde=$data['solde'];
        $Clients->insertion($numCompte, $nom, $solde);
    }

?>