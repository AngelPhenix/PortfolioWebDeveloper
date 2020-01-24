<?php include '../partials/call.php' ?>
<?php
    $reponse = $database->query('SELECT id, titre, article, date, image_titre FROM articles ORDER BY id DESC LIMIT 0,2')->fetchAll();
?>

<footer>
	<div class="footer-column">
		<p> Liens interessants</p>
		<div class="footer-media">
			<a target="_blank" title="Trouvez moi sur twitter !" href="https://twitter.com/AngelPhenix"><img alt="Suivez mon twitter!" src="../public/IMG/twitter.png"></a>
			<a target="_blank" title="Trouvez moi sur youtube !" href="https://www.youtube.com/user/nGsAngel"><img alt="Suivez mon twitter!" src="../public/IMG/youtube.png"></a>
			<a target="_blank" title="Trouvez moi sur google !" href="https://plus.google.com/u/0/+J%C3%A9r%C3%A9myMattausch"><img alt="Suivez mon twitter!" src="../public/IMG/newgoogle.png"></a>
		</div><!--
	--></div>
	<div class="footer-column">
		<p>Derniers articles</p>
		<?php
		foreach ($reponse as $data) {
			$phrase_acceuil = mb_substr($data->article, 0, 150);?>
		<div class="footer-article-center">
			<a href="./article-<?=$data->id?>">
			<div class="footer-article">
					<img src="../uploads/<?=$data->image_titre?>" alt="Image Article Accueil">
			</div>
			<div class="footer-article"><h2> <?=$data->titre?> </h2>
				<p class="footer-description-article"> <?=$phrase_acceuil?> ... </p>
			</div></a>
			</div>
		<?php } ?>
	</div><!--
	--><div class="footer-column">
		<p> Informations utiles</p>
		<ul>
		</ul>
	</div>
	<p class="copyright"> Copyright ©2018 All Rights Reserved </p>
</footer>