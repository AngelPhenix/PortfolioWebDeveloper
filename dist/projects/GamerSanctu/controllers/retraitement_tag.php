<?php 
	require_once '../partials/call.php';
	if(isset($_GET['article']) && isset($_GET['tag'])){
		$article = $_GET['article'];
		$tag = $_GET['tag'];
		$query = $database->prepare("INSERT INTO article_tag SET articles_id = ?, tags_id = ?");
		$query->execute([$article, $tag]);

		$query = $database->prepare("SELECT nom, tags.id FROM tags, article_tag WHERE article_tag.articles_id = ? AND article_tag.tags_id = tags.id");
		$query->execute([$article]);
		$data = $query->fetchAll();?>

		<?php foreach ($data as $tag): ?>
			<span class="article_tagged"><?=$tag->nom?></span>
		<?php endforeach ?><?php
	}
	if(isset($_GET['nom'])){
		$id_article = $_GET['nom'];
		$query = $database->prepare("SELECT nom, tags.id FROM tags, article_tag WHERE article_tag.articles_id = ? AND article_tag.tags_id = tags.id");
		$query->execute([$id_article]);
		$data = $query->fetchAll();?>
		
		<?php foreach ($data as $tag): ?>
			<span class="article_tagged"><?=$tag->nom?></span>
		<?php endforeach ?>
	<?php }
?>
