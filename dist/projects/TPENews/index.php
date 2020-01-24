<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Actualités - PMENEWS</title>
	<meta name="description" content="le site web référence pour les petites et moyennes entreprises (PME) pour quiconque souhaiterait obtenir une visiblité accrue sur la toile.">
	<meta name="keywords" content="PME, TPE, référence, webtv, france, francophone, abondance, moteur de recherche, recherche d'informations, stream">
	<meta http-equiv="content-language" content="fr">
	<meta http-equiv="Content-type" content="text/html">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<?php require_once 'partials/head.php'?>
	<script src="scripts/select_script.js" async></script>
</head>
<body>
	<div id="title_bar">
		<a href="index.php"><img src="img/logo.png" alt="Logo TPENEWS.TV"/></a>
		<h1>Actualités</h1>
		<?php require_once 'partials/title_bar.php'?>
	</div>
	
	<?php require_once 'partials/nav.php'?>

	<!-- LIVE STREAM BLOCK WHERE THERE'S MINIFIED ARTICLES AND ADVERTISING BLOCK -->
	<div id="website_body">
		<!-- IFRAME CONTAINING THE LIVE STREAM -->
		<iframe src="https://plussh.com/embed/user/5b2527ef2873f" allowfullscreen></iframe>
		<!-- ADVERTISING BLOCK -->
		<div id="pub_horizontal">
			<div id="slideshow">
				<button id="close_horizontal_ad">X</button>
				<div>
					<a href="pmenewstv.tv"><img src="http://publichealthpractice.com/wp-content/uploads/pg_solutions_esurveillance_featured.jpg"></a>
				</div>
				<div>
				    <a href="pmenewstv.tv"><img src="https://www.amia.org/sites/default/files/files_2/Public-Health-Informatics-domain-DL.jpg"></a>
				</div>
			</div>
		</div>
		<!-- MINIFIED ARTICLE BLOCK -->
		<div id="article"></div>
	</div>

	<!-- MODAL -->
	<div id="full_article">
		<!-- ABSOLUTE POSITIONING X BUTTON -->
		<button id="hide_article">X</button>
		<!-- LEFT COLUMN -->
		<div id="left_container_full_article">
			<h1 id="title_article"></h1>
			<p id="author_article"></p>
			<p id="date_article"></p>
			<p id="resume_article"></p>
			<a id="weblink_article" href="" target="_blank">Lien Web</a>
			<div id="social_media_full_article">
				<a href="https://twitter.com/pmenewstv" target="_blank"><img src="img/twitter.png"/></a>
				<a href="https://www.facebook.com/pmenewstv/" target="_blank"><img src="img/facebook.png"/></a>
				<a href="https://plus.google.com/u/0/+pmenews" target="_blank"><img src="img/google+.png"></a>
				<a href="https://www.linkedin.com/in/pmenewstv/" target="_blank"><img src="img/linkedin.png"/></a>
			</div>
		</div>
		<!-- RIGHT COLUMN -->
		<div id="right_container_full_article">			
		</div>	
	</div>

	<?php require_once 'partials/footer.php'?>
</body>
</html>