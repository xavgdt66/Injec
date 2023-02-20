<?php 
use App\App;
use App\Table\Article;
use App\Table\Categorie;



//charge la catégorie avec l'identifiant (ID) 1 à partir de la base de données à l'aide de la méthode statique finds() 
//de la classe Categorie située dans le dossier Table de l'application. Le résultat est stocké dans la variable $categorie.
$categorie = Categorie::find($_GET['id']);
if ($categorie === false){
   App::notFound();
}
// je récupere les artciles 
$articles = Article::lastbyCategory($_GET['id']);

// la liste des categories sur le coté à droite de la page 
$categories= Categorie::all();

?>

<h1><?= $categorie->titre ?></h1>


<!--------(http://localhost/gra/public/index.php?p=categorie&id=2)---->


<div class="row">
   <div class="col-sm-8">

<?php foreach($articles as $post): ?>

      <h2>  
     
      <a href="<?=  $post->url ?>"><?= $post->titre ?>  </a>
      </h2>

      <p><?= $post->categorie ?></p>
    
      <p><?= $post->extrait; ?></p>
<?php endforeach ?>
</div>

<div class="col-sm-4">

<ul> 
<?php foreach(\App\Table\Categorie::all() as $categorie): ?>
<li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a>  </li>

   <?php endforeach ?>
   </ul>
</div>



</div>
