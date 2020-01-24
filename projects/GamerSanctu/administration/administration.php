<?php 
require_once '../partials/session.php';
require_once '../partials/call.php';

if(isset($_SESSION['auth']) && $_SESSION['auth']->rank >= 90){ 
	require_once '../partials/head.php' ?>
	<body>
		<div id="big_container">
			<?php require_once '../partials/admin_menu.php' ?>
			<div id="container_admin">
				<?php $query = $database->query("SELECT count(*) as nb_article FROM articles")->fetch()->nb_article ?>
				<p>Nombre d'article sur GamerSanctuary : <?=$query?></p>
				<?php $query2 = $database->query("SELECT count(*) as nb_tags FROM tags")->fetch()->nb_tags ?>
				<p>Nombre de tags présent dans la BDD : <?=$query2?></p>
				<?php $query3 = $database->query("SELECT count(*) as nb_users FROM users")->fetch()->nb_users ?>
				<p>Nombre d'utilisateur enregistrés : <?=$query3?></p>
				<?php $query4 = $database->query("SELECT sum(hits) as nb_hits FROM articles")->fetch()->nb_hits ?>
				<p>Nombre d'articles vus : <?=$query4?></p>
				<?php $query5 = $database->query("SELECT titre, hits FROM articles WHERE hits = (SELECT max(hits) FROM articles)")->fetch() ?>
				<p>Article le plus populaire : <?=$query5->titre?> (<?=$query5->hits?> vues)</p>
			</div>
		</div>
	</body>
<?php } else {
	header('Location: ../index.php');
} ?>
</html>