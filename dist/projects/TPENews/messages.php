<?php session_start();
	// If not connected : Redirected to index.php.
	if(!isset($_SESSION["auth"]) || $_SESSION["auth"]->rank != "Administrateur"){
		header("Location: index.php");
	}
	// If connected :
	else {
		$member = $_SESSION["auth"];
		require_once "controllers/db.php";

		$data = $pdo->query("SELECT * FROM messages")->fetchAll();
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Messages - PMENEWS</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<?php require_once 'partials/head.php'?>
</head>
<body>
	<div id="member_page_container">
		<?php require_once "partials/member_nav.php"?>

		<div id="member_body">
			<?php
			foreach ($data as $message) {?>
				<div class="article_informations">
					<p><?=$message->object?></p>
				</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>