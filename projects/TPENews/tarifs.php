<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarifs - PMENEWS</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<?php require_once 'partials/head.php'?>
</head>
<body>
	<div id="title_bar">
		<a href="index.php"><img src="img/logo.png" alt="Logo TPENEWS.TV"/></a>
		<h1>Tarifs</h1>
		<?php require_once 'partials/title_bar.php'?>
	</div>

	<h2 id="tarif_title">Tarifs des services proposés par PMENEWS.</h2>
	<div id="tarif_container">
		<div id="green">
			<div class="price">0 €</div>
			<div class="inside_tarif_container">
				<h3>Publication Gratuite</h3>
				<p>Audiovisuel</p>
				<hr>
				<h4>Canal :</h4>
				<ul>
					<li>Actualités</li>
					<li>Business</li>
					<li>France</li>
					<li>Francophonie</li>
					<li>Outre-Mer</li>
				</ul>
				<hr>
				<h4>Formats :</h4>
				<ul>
					<li>Article</li>
					<li>Audio (musique, radio)</li>
					<li>Communiqué</li>
					<li>CV (écrit ou pitch vidéo)</li>
					<li>Photo</li>
					<li>Vidéo</li>
				</ul>
				<hr>
				<p class="free">Gratuit</p>

				<a href="#">Publier</a>
			</div>
		</div>
		<div id="blue">
			<div class="price">10 €</div>
			<div class="inside_tarif_container">
				<h3>Options de publication</h3>
				<ol>
					<li>Bouton de mise en relation</li>
					<li>Publication canal supplémentaire</li>
					<li>Publication tous canaux</li>
				</ol>
				<hr>
				<h4>Canal :</h4>
				<ul>
					<li>Actualités</li>
					<li>Business</li>
					<li>France</li>
					<li>Francophonie</li>
					<li>Outre-Mer</li>
				</ul>
				<hr>
				<h4>Modèles de mise en relation :</h4>
				<ul>
					<li>Site Web</li>
					<li>Offre Spéciale</li>
					<li>Site e-Commecer</li>
				</ul>
				<hr>
				<p class="free">A partir de 10 € HT</p>

				<a href="#">Publier</a>
			</div>
		</div>
		<div id="red">
			<div class="price">100 €</div>
			<div class="inside_tarif_container">
				<h3>Annonces & Sponsoring</h3>
				<ol>
					<li>Offre d'emploi</li>
					<li>Publicité</li>
					<li>Sponsoring</li>
				</ol>
				<hr>
				<h4>Canal :</h4>
				<ul>
					<li>Actualités</li>
					<li>Business</li>
					<li>France</li>
					<li>Francophonie</li>
					<li>Outre-Mer</li>
				</ul>
				<hr>
				<h4>Formats :</h4>
				<ul>
					<li>Offre écrite ou vidéo</li>
					<li>Bandeau ou Encart publicitairee</li>
					<li>Sponsoring canal de publication</li>
				</ul>
				<hr>
				<p class="free">A partir de 100 € HT</p>

				<a href="#">Publier</a>
			</div>
		</div>
	</div>
	<h3 id="tarif_footer">Les tarifs sont établis Hors Taxes pour une année calendaire.<br><br>Les tarifs et les promotions sont susceptibles d'être modifiés en cours d'année. </h3>
	<?php require_once 'partials/footer.php'?>
</body>
</html>