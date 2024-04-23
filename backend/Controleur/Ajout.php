<?php
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:GET, POST, OPTIONS, PUT, DELETE');
    header('Access-Control-Allow-Headers: X-Requested-With,Origin,Content-Type,Cookie,Accept');
    header('Content-Type: application/json');

    require_once(dirname(__FILE__) ."/../Model/Client.php");
    $Clients = new ClientManager();
    $data= json_decode(file_get_contents("php://input"),true);
    if(isset($data["numCompte"])&&isset($data['nom'])){
        $primary_key=false;
        $d=$Clients->affichage();
        // echo $d[1]['numCompte'];
        foreach($d as $d){
            if($d['numCompte']==$data['numCompte'])
                $primary_key=true;     
        }
        if($primary_key)echo "Verifier votre numero de compte, pour vous aidez le dernier numero de compte est ".$d['numCompte'];
        else{
            $numCompte =$data['numCompte'];
            $nom=$data['nom'];
            $solde=$data['solde'];
            $Clients->insertion($numCompte, $nom, $solde);
            echo "Succès";
        }
    
    }
    // $d=$Clients->affichage();
    // // echo $d[1]['numCompte'];
    // $primary_key=false;
    // foreach($d as $d){
    //     echo $d['numCompte'];
    //     if($d['numCompte']=='0001')
    //         $primary_key=true;   
        
    // }
  
    // if($primary_key)echo "trouvé".count($d).$d['numCompte'];
    // else echo "nom";

?>