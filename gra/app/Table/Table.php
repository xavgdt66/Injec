<?php
namespace App\Table;


class Table {
    protected  $db;
    protected $table;


 // Explication de la fucntion https://chat.openai.com/chat/1394576c-b59d-4a6c-bb63-e62ccee050f4 
    public function __construct(\App\Database $db){

    $this->db = $db;

if(is_null($this->table)){
// la méthode explode() est appelée pour diviser le nom complet de la classe en parties à chaque fois qu'il rencontre le caractère \. 
// Cela signifie que si le nom complet de la classe est App\Table\MyTable,
  // la méthode explode() va renvoyer un tableau contenant les éléments suivants : ['App', 'Table', 'MyTable'].
  $parts =  explode('\\', get_class($this));
  //Ensuite, la fonction end() est appelée sur ce tableau pour récupérer le dernier élément, qui dans cet exemple est MyTable
         $class_name = end($parts);
  //Ensuite, la chaîne "Table" est supprimée de la fin de la chaîne à l'aide de la fonction str_replace(), de sorte que la variable $table contient simplement "my" dans cet exemple
  // Enfin, la chaîne est mise en minuscules à l'aide de la fonction strtolower().         
         $this->table = strtolower(str_replace('Table', '', $class_name));
}
}

 public function all(){
   
    return $this->db->query('SELECT * FROM articles');

 }







}














////////////////////////////////////////////////SANS LES FACTORY //////////////////////////////////////////////////////////////////////////////

/*
namespace App\Table;

use App\App;

// video arretr a 20:23
class Table {


    protected static $table;


    public static function find($id){
        return static::query(
            "SELECT * FROM " . static::$table . " WHERE id = ?", [$id], true);
    }
    


// Permet de faire une requete sql et de lui passer des attributs 
    public static function query($statement, $attributes = null, $one = false ){
        if($attributes){
                return App::getDB()->prepare($statement, $attributes, get_called_class(), $one);
        } else  {
                return App::getDB()->query($statement, get_called_class(), $one);
        }
       
    
        

    }






    public static  function all(){
        //get db est la function qui est la bdd dans App.php 
       return App::getDB()->query( " SELECT * FROM " . static::$table . " 
       ", get_called_class());
   
       

   }





//méthode magique appelée __get(). Elle est appelée automatiquement lorsqu'une propriété inaccessible est appelée sur une instance d'objet.
public function __get($key){
// Il définit une variable $method en utilisant la valeur de $key et en concaténant le préfixe "get" et en utilisant ucfirst() pour mettre en majuscule le premier caractère du nom de la propriété.
    $method = 'get' . ucfirst($key);
// Il affecte la valeur retournée par l'appel de la méthode définie par $method à la propriété $key de l'objet courant.
    $this->$key = $this->$method();
//  La valeur de la propriété $key est retournée en fin de méthode.
    return $this->$key;
}








}

*/