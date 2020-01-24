<?php
	// Si des données ont été envoyées à cette page via POST en essayant de se connecter
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
			require_once '../partials/call.php';
			$req = $database->prepare('SELECT * FROM users WHERE username = ?');
			$req->execute([$_POST['username']]);
			$user = $req->fetch();
			// Si l'utilisateur est présent et que le MDP correspond : Connecte le avec la super variable ['auth']
			if($user && password_verify($_POST['password'], $user->password)){
				session_start();
				$_SESSION['auth'] = $user;
				header('Location: ../views/index');
			} 
			else {
				$errors['user'] = "Les informations entrées n'existent pas en base de données";
			}
		}
	} ?>

<nav> 
	<ul>
		<li><a href="index">Accueil</a></li>
		<li><a href="../views/review">Reviews</a></li>
		<li><a href="../views/lol">League Of Legends</a></li>
		<?php if(!isset($_SESSION['auth'])){ // Si l'utilisateur n'est pas connecté ?>
			<li class="right"><a href="../views/register">S'enregistrer</a>
			</li>
			<li class="right"><a id="connexion">Connexion</a>
				<ul id="cache_connexion">
					<li>
						<form id="user_connexion" method="post" action="">
							<div class="label_connexion">
								<label for="username">Pseudonyme</label>
								<input type="text" name="username" id="username" required/>
							</div>
							<div class="label_connexion">
								<label for="password">Mot de Passe</label>
								<input type="password" name="password" id="password" required/>
							</div>
							<div class="button">
								<button type="submit">Se connecter</button>
							</div>
						</form>
					</li>
				</ul>
			</li>
		<?php }	?>

		<?php if (isset($_SESSION['auth'])){ // Si l'utilisateur est connecté ?>
			<li class="right"> 
				<a href="../controllers/deco.php"> Deconnexion </a>
				<?php 
				if($_SESSION['auth']->rank >= 90){?>
                    <li class="right">
                    <a href="../administration/administration.php">Panel Admin</a>
                    </li>
                    <?php } ?>
			</li>
		<?php } ?>
	</ul>
</nav>
