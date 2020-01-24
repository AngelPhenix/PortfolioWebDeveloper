<?php require_once '../partials/session.php' ?>
<?php require_once '../partials/head.php' ?>
<body>
	<?php require_once '../partials/call.php' ?>
	<?php 
	// Empêche les utilisateurs d'accéder à des articles qui n'existent pas
	$query = $database->query('SELECT COUNT(*) as nb FROM articles')->fetch();
	if($_GET['id'] > $query->nb){
		header('Location: index.php');
	}

	$id_article = $_GET['id'];
	$query = $database->prepare('SELECT titre, article, auteur, date, image_titre, hits FROM articles WHERE id = ?');
	$query->execute([$_GET['id']]);
	$donnees = $query->fetch();
	
	$hits = $donnees->hits;
	$hits++;
	$query2 = $database->prepare('UPDATE articles SET hits = ? WHERE id = ?');
	$query2->execute([$hits, $_GET['id']]);

	$jour = substr($donnees->date, -2);
	$mois = substr($donnees->date, 5, 2);
	$annee = substr($donnees->date, 0, 4);
	
	switch ($mois){
		case 1:
			$mois = "Janvier";
			break;
		case 2:
			$mois = "Février";
			break;
		case 3:
			$mois = "Mars";
			break;
		case 4:
			$mois = "Avril";
			break;
		case 5:
			$mois = "Mai";
			break;
		case 6:
			$mois = "Juin";
			break;
		case 7:
			$mois = "Juillet";
			break;
		case 8:
			$mois = "Août";
			break;
		case 9:
			$mois = "Septembre";
			break;
		case 10:
			$mois = "Octobre";
			break;
		case 11:
			$mois = "Novembre";
			break;
		case 12:
			$mois = "Décembre";
			break;
	}
	
	$nouvelle_date = "$jour $mois $annee";

	if (intval($id_article)){
		require_once '../partials/nav.php' ?>
		<?php require_once '../partials/bar_titre.php' ?>
		<div id="image_principale" style='background: url("../uploads/<?=$donnees->image_titre?>") no-repeat fixed;background-size: 100%;'></div>
		<div id="article_wrapper_main">
			<div id="titre_et_date"><h4>Posté par :  <?=$donnees->auteur?>  </h4> <?=$nouvelle_date?></div>
			<hr>
			<p> <?=$donnees->article?> </p>
			<?php 
			$result = $database->query('SELECT nom, tags.id FROM articles, tags, article_tag WHERE tags.id = article_tag.tags_id AND article_tag.articles_id = articles.id AND articles.id = '.$id_article)->fetchAll();

			$tags = '';
			foreach ($result as $tag) {
				$tags .= '<a href="tag-'. $tag->nom .'">'.$tag->nom.'</a> | ';
			}
			$tags = substr($tags, 0, -3);
			?>
			<p id="tags"> Tags :  <?=$tags?> </p>
		</div>
		<?php
	}
	else {
		header('Location: index.php');
	}?>
		
<?php require_once '../partials/footer.php' ?>
</body>
</html>