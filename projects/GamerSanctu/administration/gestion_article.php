<?php 
require_once '../partials/session.php';
require_once '../partials/call.php';

if(isset($_SESSION['auth']) && $_SESSION['auth']->rank >= 90){ 
	require_once '../partials/head.php' ?>
	<body>
		<div id="big_container">
			<?php require_once '../partials/admin_menu.php' ?>
			<div id="container">
				<?php $query = $database->query('SELECT * FROM articles')->fetchAll() ?>
				<select id="select_article">
					<option>Aucun article choisi</option>
					<?php foreach ($query as $article): ?>
					<option value=<?=$article->id?>><?=$article->titre?></option>
					<?php endforeach ?>
				</select>

				<form method="post" action="../controllers/traitement_article.php" enctype="multipart/form-data">
			      <label for="article_name">Titre de l'article</label>
			      <input type="text" id="article_name" name="article_title">

			      <label id="image_titre">Image de l'article</label>
			      <input type="file" id="image_titre" name="image_titre">

			      <input type="hidden" id="image" name="image">
			      <input type="hidden" id="article_id" name="article_id">

			      <label for="categorie">Catégorie</label>
			      <select id="categorie" name="categorie">
			      	<option>Aucune catégorie choisie</option>
			        <option value="review">Review</option>
			        <option value="lol">League Of Legends</option>
			      </select>

			      <label for="article_text">Article en question</label>
			      <textarea id="article_text" name="article_text"></textarea>

			      <p title="Formatage à connaitre :
			      <br> : Saut de ligne.
			      <img class='image_darticle' src='liendelimage' title='titre_image'> : Placer une image bien formatée.
			      <span class='legende'></span>: A mettre directement sous une image"> Survoler pour info. formatage </p>
			      <input type="submit" value="Modifier" name="modif">
			    </form>
			</div>
		</div>
	</body>
<?php } else {
	header('Location: ../index.php');
} ?>
</html>