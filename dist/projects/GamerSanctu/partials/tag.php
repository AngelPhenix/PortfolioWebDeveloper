<!-- PAGINATION -->
<?php 
require_once '../partials/session.php';
require_once '../partials/call.php';

if(isset($_GET['tag'])){
	$query = $database->prepare("SELECT count(*) as 'number' FROM articles, tags, article_tag WHERE tags.id = article_tag.tags_id AND article_tag.articles_id = articles.id AND tags.nom = ?");
	$query->execute([$_GET['tag']]);
	$numberOfArticle = $query->fetch()->number;
}

$articlePerPage = 5;
$pagesTotales = ceil ($numberOfArticle / $articlePerPage);

// If a param is in the url as "page", check if empty, if > 0 or if < $pagesTotales then display the right page
if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotales) {
	$_GET['page'] = intval($_GET['page']);
	$actualPage = $_GET['page'];
}
else {
	$actualPage = 1;
}

$depart = ($actualPage - 1) * $articlePerPage;
$query = $database->prepare("SELECT * FROM article_tag, articles, tags WHERE article_tag.articles_id = articles.id AND article_tag.tags_id = tags.id AND tags.nom = ? ORDER BY articles.id DESC LIMIT ".$depart.",".$articlePerPage);
$query->execute([$_GET['tag']]);
$reponse = $query->fetchAll() ?>

<div id="wrapper_main">
	<h1> Derniers articles sur GamerSanctuary :  </h1>
	<hr>
	<div class="article_milieu">
			<?php 
			foreach ($reponse as $data) {
				$desc = mb_substr($data->article, 0, 200);?>
				<div class="divise1">
						<img src="../uploads/<?=$data->image_titre?>" alt="Image Article Accueil">
				</div>
				<div class="divise2"><h2> <?=$data->titre?> </h2>
					<p> <?= $desc ?>... <a id="more" href="./article-<?=$data->articles_id?>">[Lire Plus]</a> </p>
					<?php 
					$tagFound = $database->query('SELECT nom FROM articles, tags, article_tag WHERE tags.id = article_tag.tags_id AND article_tag.articles_id = articles.id AND articles.id = '.$data->articles_id); ?>
					<p id="tags"> 
						<?php foreach ($tagFound as $tag) { ?>
							<a href="./tag-<?=$tag->nom?>"><?=$tag->nom?></a> 
						<?php } ?> 
					</p>
				</div>
				<hr>
			<?php } ?>
	</div>
	<?php require_once '../partials/pagination.php' ?>
</div>