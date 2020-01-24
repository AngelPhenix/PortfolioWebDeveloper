<?php session_start();
	// If not connected : Redirected to index.php.
	if(!isset($_SESSION["auth"]) || $_SESSION["auth"]->rank != "Administrateur"){
		header("Location: index.php");
	}
	// If connected :
	else {
		$member = $_SESSION["auth"];
		require_once "controllers/db.php";

		$req = $pdo->prepare("SELECT * FROM users WHERE id = ?");
		$req->execute([$_GET['id']]);
		$data = $req->fetch();
	}

	if(!empty($_POST)){
		$req = $pdo-> prepare("UPDATE users SET username = ?, name = ?, surname = ?, mail = ?, rank = ?, 
			function = ?, society = ?, phone = ?, mobile = ?, bio = ?, project = ?, adress1 = ?, adress2 = ?, region = ?, postal = ?, city = ? WHERE id = ?");

		$req->execute([$_POST['username'], $_POST['name'], $_POST['surname'], $_POST['mail'], $_POST['rank'], $_POST['function'], $_POST['society'],
	$_POST['phone'], $_POST['mobile'], $_POST['bio'], $_POST['project'], $_POST['adress1'], $_POST['adress2'], $_POST['region'], $_POST['postal'], $_POST['city'], $_GET['id']]);
		header("Location: members.php");
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
		<form action="" method="POST">
	    <label for="username">Identifiant</label>
	    <input class="input_inscr" type="text" name="username" id="username" value="<?=$data->username?>">

	    <label for="name">Prénom</label>
	    <input class="input_inscr" type="text" name="name" id="name" value="<?=$data->name?>">

	    <label for="surname">Nom</label>
	    <input class="input_inscr" type="text" name="surname" id="surname"value="<?=$data->surname?>">

	    <label for="mail">Adresse E-mail</label>
	    <input class="input_inscr" type="email" name="mail" id="mail" value="<?=$data->mail?>">

	    <label for="rank">Rang</label>
	    <select id="rank" name="rank">
	    	<option value="<?=$data->rank?>">Rang actuel: <?=$data->rank?></option>
	    	<option value="Auteur">Auteur</option>
			<option value="Editeur">Editeur</option>
			<option value="Administrateur">Administrateur</option>
	    </select><br>

	    <label for="function">Fonction</label>
	    <input class="input_inscr" type="text" name="function" id="function" value="<?=$data->function?>">

	    <label for="society">Société</label>
	    <input class="input_inscr" type="text" name="society" id="society" value="<?=$data->society?>">

	    <label for="phone">Numéro de téléphone</label>
	    <input class="input_inscr" type="text" name="phone" id="phone" value="<?=$data->phone?>">

	    <label for="mobile">Numéro de mobile</label>
	    <input class="input_inscr" type="text" name="mobile" id="mobile" value="<?=$data->mobile?>">

	    <label for="bio">Biographie</label>
	    <textarea class="input_inscr" type="text" name="bio" id="bio"><?=$data->bio?></textarea>

	    <label for="project">Présentation & Projets</label>
	    <textarea class="input_inscr" type="text" name="project" id="project"><?=$data->project?></textarea>

	    <label for="adress1">Adresse postale </label>
	    <input class="input_inscr" type="text" name="adress1" id="adress1" value="<?=$data->adress1?>">

	    <label for="adress2">Adresse suite</label>
	    <input class="input_inscr" type="text" name="adress2" id="adress2" value="<?=$data->adress2?>">

	    <label for="region">Etat / Province / Région</label>
	    <input class="input_inscr" type="text" name="region" id="region" value="<?=$data->region?>">

	    <label for="postal">Code postal</label>
	    <input class="input_inscr" type="text" name="postal" id="postal" value="<?=$data->postal?>">

	    <label for="city">Ville</label>
	    <input class="input_inscr" type="text" name="city" id="city" value="<?=$data->city?>">

	    <button type="submit" id="inscr_button">Mettre à jour</button>
		</form>
		</div>
	</div>
</body>
</html>