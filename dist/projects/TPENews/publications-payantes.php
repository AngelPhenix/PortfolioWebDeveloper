<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Publications Payantes - PMENEWS</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<?php require_once 'partials/head.php'?>
</head>
<body>
	<div id="title_bar">
		<a href="index.php"><img src="img/logo.png" alt="Logo TPENEWS.TV"/></a>
		<h1>Publications payantes</h1>
		<?php require_once 'partials/title_bar.php'?>
	</div>

	<div class="card"> 
		<div class="flip-card-inner">
		  <div class="front"> 
		    <h2 id="flipcard_title01">€</h2>
		    <h3 id="flipcard_title02">Comment publier sur PMENEWS ?</h3>
		    <p>CV<br>Offre d'emploi<br>Sponsoring<br>Publicité</p>
		  </div> 

		  <div class="back">
		  	<h2 id="flipcard_title01">Utilisation</h2>
		  	<p>5 étapes :</p>
			  	<ol>
			  		<li>Préparer ses éléments</li>
				  		<ol id="special_ol">
				  			<li>Résumé</li>
				  			<li>Texte ou PDF</li>
				  			<li>Pièces à joindre (audio/photo/vidéo)</li>
				  		</ol>
			  		<li>Etre enregistré et connecté</li>
			  		<li>Choisir le type de publication</li>
			  		<li>Choisir le canal de publication</li>
			  		<li>Compléter le formulaire</li>
			  	</ol>
			  	<p>Publication mono-canal</p>
			  	<p id="special_p">Le CV est publier gratuitement via le formulaire de publication payante offre d'emploi </p>
			</div> 
		</div>
	</div>

	<?php require_once 'partials/footer.php'?>
</body>
</html>