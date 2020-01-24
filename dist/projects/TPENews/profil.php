<?php session_start();
	// If not connected : Redirected to index.php.
	if(!isset($_SESSION["auth"])){
		header("Location: index.php");
	}
	// If connected :
	else {
		$member = $_SESSION["auth"];
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mon profil - PMENEWS</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<?php require_once 'partials/head.php'?>
</head>
<body>
	<div id="member_page_container">
		<?php require_once "partials/member_nav.php"?>

		<div id="member_body">
			<?php 
				if(isset($_SESSION['article_validated'])){ ?>
					<div class="valid_message">
						<p> Votre article à bien été posté. </p> 
					</div>
				<?php
				unset($_SESSION['article_validated']);
				}
			?>

			<h1> Informations </h1>
			<h2> Personnelles :</h2>
			<p><span class="member_bold">Pseudo :</span> <?=$member->username?></p>
			<p><span class="member_bold">E-mail :</span> <?=$member->mail?></p>
			<p><span class="member_bold">Nom :</span> <?=$member->name?> <?=$member->surname?></p>
			<p><span class="member_bold">Adresse :</span> 
				<?php echo ($member->adress1) ? $member->adress1 : "Non renseigné"?>, <?=$member->postal?>, <?=$member->city?>
			</p>
			<p><span class="member_bold">Téléphone :</span> <?php echo ($member->phone) ? $member->phone : "Non renseigné"?></p>
			<p><span class="member_bold">  Mobile :</span> <?php echo ($member->mobile) ? $member->mobile : "Non renseigné"?></p>
			<p><span class="member_bold">Fonction :</span> <?php echo ($member->function) ? $member->function : "Non renseigné"?> à <?php echo ($member->society) ? $member->society : "Non renseigné"?></p>
			<h2> Pmenews.tv :</h2>
			<p><span class="member_bold">Rang :</span> <?=$member->rank?></p>
			<p><span class="member_bold">Biographie :</span> <?php echo ($member->bio) ? $member->bio : "Non renseigné"?></p>
			<p><span class="member_bold">Projet(s) :</span> <?php echo ($member->project) ? $member->project : "Non renseigné"?></p>
		</div>
	</div>
</body>
</html>