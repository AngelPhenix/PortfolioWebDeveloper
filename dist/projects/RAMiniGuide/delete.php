<?php
	require_once("includes/pdo.php");
	require_once("includes/start_session.php");

	// Validation de suppression !
	if(isset($_POST["yes"]) && isset($_GET["game_id"])){
		$query = $database->prepare("SELECT * FROM games WHERE game_id = ?");
		$query->execute([$_GET["game_id"]]);
		$data = $query->fetch();
		if($data){
			// Un résultat a bien été trouvé et peut être supprimé de la base de donnée.
			$query = $database->prepare("DELETE FROM games WHERE id = ?");
			$query->execute([$data->id]);
			$query = $database->prepare("DELETE FROM achievements WHERE game_id = ?");
			$query->execute([$_GET["game_id"]]);
			header("Location:index.php");
		} else {
			echo "Aucun jeu trouvé en base de donnée. L'id du jeu doit être mauvais.";
		}
	}
	if(isset($_POST["no"])){
		header("Location: index.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Supprimer jeu</title>
</head>
<body>
	<?php 
	if(isset($_SESSION["auth"])){
		if($_SESSION["auth"]->admin){?>
			<p>Voulez-vous vraiment supprimer ce jeu ?</p>
			<form action="" method="post">
				<input type="submit" name="yes" value="Oui">
				<input type="submit" name="no" value="Non">
			</form>
  <?php } else {
			header('Location: index.php');
		}
	}?>
</body>
</html>