<?php 

namespace App;

use \PDO;

class Database {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '' ,$db_host = 'localhost'){

        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

// function private qui connecte la bdd 
    public function getPdo(){
   if($this->pdo === null) {

        // connecte la bdd de blog 
        $pdo = new \PDO('mysql:dbname=blog;host=localhost', 'root', ''); 
        // pour faire apparaite les msg d'erreur de la bdd 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->pdo = $pdo;
        var_dump('PDO initialise');

   }
       var_dump('getPDO called');
       return $this->pdo;

    }

/////////////////////////////////////////////////////////////////////////////////////////
    public function query($statement, $class_name = null, $one = false){
        // Étape 1: exécute la requête SQL en utilisant getPDO()
       $req = $this->getPdo()->query($statement);
    if($class_name === null){
        $req->setFetchMode(PDO::FETCH_OBJ);
    }else {
        // Étape 2: configure le mode de récupération des résultats en utilisant le nom de la classe spécifié dans $class_name
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
    }
        
       // Étape 3: récupère tous les résultats ou seulement le premier selon la valeur de $one
       if($one){
           $datas = $req->fetch();
       } else {
          $datas = $req->fetchAll();
       }
    
        // Étape 4: renvoie les résultats sous forme de tableau associatif
        return $datas;
    }



    
/////////////////////////////////////////////////////////////////////////////////////////

    public function prepare($statement,$attributes, $class_name, $one = false){
        $req = $this->getPdo()->prepare($statement);
       $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one){
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
       
      
      
    }
}