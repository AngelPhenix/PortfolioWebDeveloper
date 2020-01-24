<?php 
	require_once("includes/pdo.php");

	if(isset($_POST["connexion"])){
		if(empty($_POST["username"]) || empty($_POST["password"]) || $_POST["username"] == " " ){
			$errors["connexion"] = "Username or password were not right.";
		} else {
			$query = $database->prepare("SELECT * FROM users WHERE username = ?");
			$query->execute([$_POST["username"]]);
			$data = $query->fetch();
			if($data && password_verify($_POST["password"], $data->password)){
				session_start();
				$_SESSION["auth"] = $data;
				header('Location: index.php');
			} else {
				$errors["connexion"] = "Username or password were not right.";
			}
		}

	}

	// Tentative d'enregistrement
	if(isset($_POST["register"])){
		if(empty($_POST['username']) || !isset($_POST['username']) || $_POST['username'] === null || !preg_match("/^[\w@#()!&?+_%$*€£-]*$/", $_POST['username'])) {
			$errors["username"] = "Votre nom d'utilisateur n'a pas été accepté. Veuillez entrer un pseudo sans accent ni espaces.";
		} else {
			$query = $database->prepare("SELECT id FROM users WHERE username = ?");
			$query->execute([$_POST["username"]]);
			$data = $query->fetch();
			if($data){
				$errors["username"] = "Ce pseudo est déjà pris.";
			}
		}

		if(empty($_POST['password']) || !isset($_POST['password']) || $_POST['password'] === null || $_POST['password'] != $_POST['password_validation'] || !preg_match("/^[\w@#()!&?+_%$*€£-]*$/", $_POST['password'])){
			$errors["password"] = "Le mot de passe n'est pas valide.";
		}

		if(empty($errors)){
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
			$query = $database->prepare("INSERT INTO users SET username = ?, password = ?");
			$query->execute([$_POST["username"], $password]);
			session_start();
			header('Location: index.php');
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
</head>
<body>
	<?php if(!empty($errors)): ?>
		<div class="error_message">
			<?php foreach($errors as $error):?>
				<li> <?=$error?> </li>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<form action="" method="post">
	<fieldset>
		<legend>Connexion: </legend>
		<label for="username">Nom d'utilisateur: </label>
		<input type="text" name="username" id="username" required>
		<label for="password">Mot de passe: </label>
		<input type="password" name="password" id="password" required>
		<input type="submit" value="Se Connecter" name="connexion">
	</fieldset>
	</form>

	<form action="" method="post">
	<fieldset>
		<legend>Inscription: </legend>
		<label for="username">Nom d'utilisateur: </label>
		<input type="text" name="username" id="username" required>
		<label for="password">Mot de passe: </label>
		<input type="password" name="password" id="password" required>
		<label for="password_validation">Confirmer mot de passe: </label>
		<input type="password" name="password_validation" id="password_validation" required>
		<input type="submit" value="Confirmer l'inscription" name="register">
	</fieldset>
	</form>
</body>
</html>