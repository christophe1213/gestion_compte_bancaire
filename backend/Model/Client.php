<?php
    Class ClientManager{
        private $connection;
        public function __construct(){
        
        }
        private function connect()
        {   
            
            
            $server="localhost";
            $user="root";
            $mot_passe="";
            $dbName= "compte_bancaire";
        
            $conn= new mysqli($server, $user, $mot_passe, $dbName);
        
            if($conn->connect_error){
                die ("Echec de connection".$conn->error);
            }
          
            return $conn;
        }
        public function affichage()
        {
            $this->connection=$this->connect();   
            $query="SELECT * FROM Client;";
            $result = $this->connection->query($query);
            if( $result->num_rows > 0){
                while($row = $result->fetch_assoc() ){
                    $data[]=$row;
                }
            }
            else {
                $data=0;
            }
            $this->connection->close();
            return $data;

        }

        public function insertion($numCompte,$nom,$solde)
        {
            $this->connection=$this->connect();
            $query= "INSERT INTO Client VALUES('$numCompte','$nom','$solde')";
            $result=$this->connection->query($query);
            if(!$result){
                die("Error ");
            }
        }
        public function misse_ajour($numCompte,$nomCompte,$solde)
        {
            $this->connection=$this->connect();
            $query= "UPDATE Client set nom='$nomCompte', solde='$solde' where numCompte='$numCompte' ;";
            $result = $this->connection->query($query);
            if($result!=true){
                die ("Error sql");
            }
        }

    }
?>