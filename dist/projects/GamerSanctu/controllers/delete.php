<?php 
	require_once '../partials/call.php';
	if(isset($_GET['tag']) && isset($_GET['article'])){
		$id_article = $_GET['article'];
		$nom_tag = $_GET['tag'];

		// On récupère l'ID du tag cliqué grâce à son nom
		$query = $database->prepare('SELECT id FROM tags WHERE nom = ?');
		$query->execute([$nom_tag]);
		$id_tag = $query->fetch();

		// On supprime le tag en fonction de l'ID de l'article et de l'ID du tag.
		$query = $database->prepare('DELETE FROM article_tag WHERE articles_id = ? AND tags_id = ?');
		$query->execute([$id_article,$id_tag->id]);

		// On fait de nouveau une recherche pour savoir quels tags sont présent en fonction de l'article selectionné.
		$query = $database->prepare("SELECT nom, tags.id FROM tags, article_tag WHERE article_tag.articles_id = ? AND article_tag.tags_id = tags.id");
		$query->execute([$id_article]);
		$data = $query->fetchAll()?>

		<?php foreach ($data as $tag): ?>
			<span class="article_tagged"><?=$tag->nom?></span>
		<?php endforeach ?>
	<?php } 
?>