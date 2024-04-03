<?php
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:GET, POST, OPTIONS, PUT, DELETE');
    header('Access-Control-Allow-Headers: X-Requested-With,Origin,Content-Type,Cookie,Accept');
    header('Content-Type: application/json');

    require_once(dirname(__FILE__) ."/../Model/Client.php");
    $Clients = new ClientManager();
    if(isset($_GET["id"])){
        $numCompte=$_GET['id'];
        $Clients->suppression($numCompte);
    }
?>