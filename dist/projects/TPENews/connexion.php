<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Actualités - PMENEWS</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<?php require_once 'partials/head.php'?>
</head>
<body>
	<div id="title_bar">
		<a href="index.php"><img src="img/logo.png" alt="Logo TPENEWS.TV"/></a>
		<h1>Connexion</h1>
		<?php require_once 'partials/title_bar.php'?>
	</div>
	<?php
	// Si des données ont été envoyées à cette page via POST
	if(!empty($_POST)){
		$errors= array();

		// Vérification nom utilisateur : Erreur si vide
		if(empty($_POST['username'])){
			$errors['username'] = "Le champ d'identifiant est vide";
		} 
		// Vérification mot de passe : Erreur si vide
		if (empty($_POST['password'])) {
			$errors['password'] = "Le champ de mot de passe est vide";
		}

		// Si aucune erreur trouvée : Vérifie d'abord si l'utilisateur existe puis vérifie le mot de passe accordant
		if(empty($errors)){
			require_once 'controllers/db.php';
			$req = $pdo->prepare('SELECT * FROM users WHERE username = ?');
			$req->execute([$_POST['username']]);
			$user = $req->fetch();
			// Si l'utilisateur est présent et que le MDP correspond : Connecte le avec la super variable ['auth']
			if($user && password_verify($_POST['password'], $user->password)){
				session_start();
				$_SESSION['auth'] = $user;
				header('Location: index.php');
			} 
			else {
				$errors['user'] = "Les informations entrées n'existent pas en base de données";
			}
		}
	}

	// Si l'utilisateur vient de créer un nouveau compte valide, provenant de la page inscription.php
	if(isset($_SESSION['new_account'])) { ?>
		<div class="valid_message">
			<p>Votre compte a bien été créé.</p>
			<p>Connectez-vous dès maintenant en utilisant le formulaire ci-dessous.</p>
		</div>
	<?php 
		unset($_SESSION['new_account']);
	} 

	// Si l'utilisateur n'a pas correctement rempli le formulaire
	if(!empty($errors)) { ?>
		<div class="error_message">
			<p>Vous n'avez pas rempli le formulaire correctement :</p>
			<ul>
			<?php foreach($errors as $error) { ?>
				<li><?php echo $error ?></li>
			<?php } ?>
			</ul>
		</div>
	<?php } ?>




	<form id="connexion_form" action="" method="POST">
	    <label for="id">Identifiant</label>
	    <input class="input_inscr" type="text" name="username">

	    <label for="id">Mot de passe</label>
	    <input class="input_inscr" type="password" name="password">

		<button type="submit" value="Submit" id="connex_button">Valider</button>
		<a href="inscription.php">Pas encore inscrit ? Cliquez ici !</a>
	</form>

	<?php require_once 'partials/footer.php'?>
</body>
</html>