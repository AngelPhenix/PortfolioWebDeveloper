<?php require_once '../partials/session.php' ?>
<?php
// Vérification complète username / password / birthDate / mail
if (!empty($_POST)){
	$errors = array();

	// Vérification nom d'utilisateur : Si vide // Null // Undefined // Espace/Accent // Présence en base de données
	require_once '../partials/call.php';
	if(empty($_POST['username']) || !isset($_POST['username']) || $_POST['username'] === null || !preg_match("/^[\w@#()!&?+_%$*€£-]*$/", $_POST['username'])) {
		$errors['username'] = "Votre nom d'utilisateur n'a pas été accepté. Veuillez entrer un pseudo sans accent ni espaces.";
	} else {
		$req = $database->prepare('SELECT id FROM users WHERE username = ?');
		$req->execute([$_POST['username']]);
		$user = $req->fetch();
		// Vérifie si username déjà en DB
		if($user){
			$errors['username'] = "Ce pseudo est déjà pris.";
		}
	}


	// Vérification mot de passe : Si vide // Null // Undefined // Non identique à la vérification // Espace/Accent
	if(empty($_POST['password']) || !isset($_POST['password']) || $_POST['password'] === null || $_POST['password'] != $_POST['valid_password'] || !preg_match("/^[\w@#()!&?+_%$*€£-]*$/", $_POST['password'])){
		$errors['password'] = "Le mot de passe n'est pas valide.";
	}


	// Vérification date de naissance : Si vide // Null // Undefined
	if(empty($_POST['birthDate']) || !isset($_POST['birthDate']) || $_POST['birthDate'] === null){
		$errors['birthDate'] = "La date de naissance n'a pas correctement été remplie.";
	} else {
		$date = date('Y-m-d', strtotime($_POST['birthDate']));
	}


	// Vérification mail : Si vide // Null // Undefined // Non conforme à l'écriture de mail
	if(empty($_POST['mail']) || !isset($_POST['mail']) || $_POST['mail'] === null || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
		$errors['mail'] = "Le mail n'est pas valide.";
	} else {
		$req = $database->prepare('SELECT id FROM users WHERE mail = ?');
		$req->execute([$_POST['mail']]);
		$user = $req->fetch();
		// Vérifie si mail déjà en DB
		if($user){
			$errors['mail'] = "Un compte existe déjà avec cet email.";
		}
	}


	// Si aucune erreur n'a été trouvée, procédée à l'inscription en base de données.
	// Encryption du mot de passe et redirection vers index.php.
	if(empty($errors)){
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$statement = $database->prepare("INSERT INTO users SET username = ?, password = ?, birthDate = ?, mail = ?");
		$statement->execute([$_POST['username'],$password, $date, $_POST['mail']]);
		session_start();
		$_SESSION['new_account'] = "";
		header('Location:../views/index.php');
	}
}
?>

<?php require_once '../partials/head.php' ?>
<body>
	<?php require_once '../partials/nav.php' ?>
	<?php
	// Si l'utilisateur n'a pas correctement rempli le formulaire
	if(!empty($errors)) { ?>
		<div class="error_message">
			<ul>
			<?php foreach($errors as $error) { ?>
				<li><?= $error ?></li>
			<?php } ?>
			</ul>
		</div>
	<?php } ?>
    <form id="register_form" method="post" action="">
	<fieldset>
        <div>
			<label for="username">Pseudonyme*</label>
			<input type="text" name="username" id="username" >
		</div>
		<div>
			<label for="password">Mot de Passe*</label>
			<input type="password" name="password" id="password" >
		</div>
		<div>
			<label for="valid_password">Valider Mot de Passe*</label>
			<input type="password" name="valid_password" id="valid_password" >
		</div>
		<div>
			<label for="birthDate">Date de Naissance*</label>
			<input type="date" name="birthDate" id="birthDate" placeholder="dd-mm-yyyy" pattern="\d{1,2}-\d{1,2}-\d{4}" >
		</div>
		<div>
			<label for="mail">Mail*</label>
			<input type="text" name="mail" id="mail" pattern="^([a-zA-Z0-9-_.]{1,})@{1}([a-zA-Z0-9-_.]{1,}).{1}[a-zA-Z]{2,4}$" ></input>
		</div>	
		<p> Les champs indiqués avec * sont obligatoires. </p>
		<input type="submit" value="Valider">
	</fieldset>
    </form>
</body>
</html>
