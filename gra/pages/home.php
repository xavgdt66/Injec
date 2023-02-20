<?php 
// bien mettre cette url => http://localhost/gra/public/index.php?p=home

//?>


<!------------------------------------------------------------------------------------------------------------------------>
<div class="row">
   <div class="col-sm-8">

<?php foreach(App\Table\Article::getLast() as $post): ?>
<?php //var_dump($post)   ?>
      <h2>  
      <!----getUrl retourn la function getURL qui permet de faire l'id  à la palce de la faire en procedural et ajouter id -------->
      <a href="<?=  $post->url ?>"><?= $post->titre ?>  </a>
      </h2>

      <p><?= $post->categorie ?></p>
      <!-----Affcihe le texte de contenu en bdd avec la page Article.php ------->
      <p><?= $post->extrait; ?></p>
<?php endforeach ?>
</div>

<div class="col-sm-4">

<ul> 
<?php foreach(App\Table\Categorie::all() as $categorie): ?>
<li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a>  </li>

   <?php endforeach ?>
   </ul>
</div>



</div>











