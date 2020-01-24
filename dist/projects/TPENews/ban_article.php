	<?php session_start();
	// If not connected : Redirected to index.php.
	if(!isset($_SESSION["auth"])){
		header("Location: index.php");
	}
	// If connected :
	else {
		$member = $_SESSION["auth"];
		require_once "controllers/db.php";

		$req = $pdo->prepare("SELECT title FROM articles WHERE id = ?");
		$req->execute([$_GET['id']]);
		$data = $req->fetch();
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<title>Bannissement - PMENEWS</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<?php require_once 'partials/head.php'?>
</head>
<body>
	<div id="member_page_container">
		<?php require_once "partials/member_nav.php"?>

		<div id="member_body">
			<?php 
				if($member->rank == "Administrateur" && $_GET['id']){ ?>
					<div id="ban_user">
						<p>Êtes vous sûr de vouloir supprimer l'article suivant: </p>
						<ul>
							<li>Titre: <?=$data->title?></li>
						</ul>
						<a class="choice" href="controllers/delete_article.php?id=<?=$_GET['id']?>">Oui</a><a class="choice" href="articles.php">Non</a>
					</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>