<?php 


session_start();
require '../app/Autoloader.php';
App\Autoloader::register();

// Ons isatnce le singleton de de app.php 
$app = App\App::getInstance();
// ont recupere la table post 
$posts = $app->getTable('Posts');


var_dump($posts->all());

//----------------- DEBUT SINGLETON ---------------------------

// Instance la class App qui est dans la  page App.php
//$app = App\App::getInstance();
// $app + la variavle $title devient 'titre de test'
//$app->title = 'Titre de test';


// ---Pour récuperer le 'titre de test' --------
// Je re instance 
//$app2 = App\App::getInstance(); 
// je echo app2 suivie du titre 
//echo $app2->title;

//----------------- FIN SINGLETON ---------------------------

//----------------- Début FACTORY   ---------------------------
// utilise la function getTable+lefichier Posts
// voir le fichier Table.php 
var_dump(App\App::getTable('Posts'));
var_dump(App\App::getTable('Users'));
var_dump(App\App::getTable('Categories'));




//----------------- Fin Factory    ---------------------------



// Instance la class confing qui est dans la  page Config.php
$config = new App\Config();


var_dump(App\Config::getInstance()->get('db_user'));








/*
require '../app/Autoloader.php';

\App\Autoloader::register();


///////////////////////////////////Systéme qui permet de gerer les url sans le . php //////////////////////////////////
// get est url 
if(isset($_GET['p'])){
// $p devient l'url 
    $p = $_GET['p'];
} else {
// si dans url  il y a home 
    $p = 'home';
}

// Initialisation des objets 

//$db = new App\Database('blog');

// Function native qui dit à php que tout se qui sera afficher sera stoker dans une variable 
ob_start();

// si $p est home on vas dans la page home.php 
if($p === 'home'){

    require '../pages/home.php';

// si ont tape article ( Pour les id ) on va a la page single.php 
} else  if ($p === 'article'){
    require '../pages/single.php';
}else  if ($p === 'categorie'){
    require '../pages/categorie.php';
}

//la variable s'appelle content et vaudra le contenu précedament 
// et utiliser ob_get_clean pour return; Voir doc => https://www.php.net/manual/fr/function.ob-get-clean.php"
$content = ob_get_clean();
// on require la pages default car c'est elle qui permetra d'affcihe le html et css aux autres sans pouvoir les mettre sur es autres pages 

require '../pages/templates/default.php';
///////////////////////*/