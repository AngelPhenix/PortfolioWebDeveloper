<!-- PAGINATION -->
<?php require_once '../partials/session.php' ?>
<?php
require_once '../partials/call.php';

$pageName = basename($_SESSION['url'], '.php');
$url = explode('.',$pageName);
$newURL = $url[0];

if($newURL == 'index'){
	$numberOfArticle = $database->query("SELECT count(*) as 'number' FROM articles")->fetch()->number;
} else {
	$query = $database->prepare("SELECT count(*) as 'number' FROM articles WHERE categorie = ?");
	$query->execute([$newURL]);
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
if($newURL == 'index'){
	$reponse = $database->query("SELECT id, titre, article, image_titre, date FROM articles ORDER BY id DESC LIMIT ".$depart.",".$articlePerPage)->fetchAll();
} else {
	$reponse = $database->query("SELECT id, titre, article, image_titre, date FROM articles WHERE categorie = '$newURL' ORDER BY id DESC LIMIT ".$depart.",".$articlePerPage)->fetchAll();
}
?>

<div id="wrapper_main">
	<h1> Derniers articles sur GamerSanctuary :  </h1>
	<hr>
	<div class="article_milieu">
			<?php 
			// query called in index.php
			// Being : SELECT id, titre, article, image_titre, date FROM articles ORDER BY id DESC LIMIT ".$depart.",".$articlePerPage
			foreach ($reponse as $data) {
				$desc = mb_substr($data->article, 0, 200);?>
				<div class="divise1">
						<img src="../uploads/<?=$data->image_titre?>" alt="Image Article Accueil">
				</div>
				<div class="divise2"><h2> <?=$data->titre?> </h2>
					<p> <?= $desc ?>... <a id="more" href="./article-<?=$data->id?>">[Lire Plus]</a> </p>
					<?php 
					$tagFound = $database->query('SELECT nom FROM articles, tags, article_tag WHERE tags.id = article_tag.tags_id AND article_tag.articles_id = articles.id AND articles.id = '.$data->id); ?>
					<p id="tags">
						<?php foreach ($tagFound as $tag) { ?>
							<a href="./tag-<?=$tag->nom?>"><?=$tag->nom?></a> 
						<?php } ?> 
					</p>
				</div>
				<hr>
			<?php } ?>
	</div>
	<?php include '../partials/pagination.php' ?>
</div>