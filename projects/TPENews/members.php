<?php session_start();
	// If not connected : Redirected to index.php.
	if(!isset($_SESSION["auth"]) || $_SESSION["auth"]->rank != "Administrateur"){
		header("Location: index.php");
	}
	// If connected :
	else {
		$member = $_SESSION["auth"];
		require_once "controllers/db.php";

		$req = $pdo->prepare("SELECT * FROM users");
		$req->execute();
		$data = $req->fetchAll();
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
			foreach ($data as $user) {?>
				<div class="member_informations">
					<p><?=$user->username?></p>
					<div id="member_link">
						<a href="edit_member.php?id=<?=$user->id?>">Editer</a>
						<a href="ban_member.php?id=<?=$user->id?>">Bannir</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>