<?php 
use App\App;
use \App\Table\Categorie;
use App\Table\Article;


//      $db->query('SELECT * FROM articles', 'App\Table\Article') as $post)
$post = Article::find($_GET['id']);
if ($post === false ){
    App::notFound();
}

App::setTitle($post->titre);




//$db->prepare('SELECT * FROM articles WHERE id = ?', [$_GET['id']], 'App\Table\Article', true);



?>

<h1><?= $post->titre;          ?></h1>

<p><em><?= $post->categorie;  ?></em></p>

<p><?= $post->contenu;          ?></p>
