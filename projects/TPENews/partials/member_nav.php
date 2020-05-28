<div id="member_nav">
	<a href="index.php">Accueil / WebTV</a>
	<a href="profil.php">Informations Personnelles</a>
	<a href="post_article.php">Mes Publications</a>
	<?php if($member->rank == "Administrateur"){?>
		<a href="members.php">Voir les membres</a>
		<a href="articles.php">Voir les articles</a>
		<a href="messages.php">Voir les messages</a>
	<?php } ?>
	<a href="controllers/logout.php">Me deconnecter</a>
</div>