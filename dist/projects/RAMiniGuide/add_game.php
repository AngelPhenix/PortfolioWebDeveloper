<?php 
	require_once("includes/RA_API.php");
	require_once("includes/pdo.php");
	require_once("includes/start_session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>RetroAchievements Mastery</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
 	<script type="text/javascript">
	$(document).ready(function() {
		$('#chosen_console').on('change', function(){
			var console_id = $('#chosen_console :selected').val();
			var select = $('#chosen_game');
			$.get("get_games.php?id=" + console_id, function(data){
				select.empty();
				select.append(data);
			});
		});
	});
 	</script>
</head>
<body>
<?php 
	if(isset($_SESSION["auth"])){
		if(!$_SESSION["auth"]->admin){
			header('Location: index.php');
		}
	} else {
		header('Location: index.php');
	}

	$query = $database->query("SELECT title, console_id FROM consoles")->fetchAll();
	?>
	<form id="add_game" action="" method="post">

		<select name="console" id="chosen_console">
				<option selected>Aucune console choisie</option>
			<?php foreach ($query as $console): ?>
				<option id="console" value="<?=$console->console_id?>"><?=$console->title?></option>
			<?php endforeach ?>
		</select>

		<select name="game" id="chosen_game">
			<option selected>Aucun jeu choisi</option>
		</select>

		<input type="submit" name="submit" value="Ajouter ce jeu"/>
	</form>
	<a id="comeback" href="index.php">Revenir à la page d'accueil</a>


	<?php 
	// Check uniquement si le bouton "Ajouter ce jeu" à été cliqué.
	if(isset($_POST["submit"])){

		// Récupération des informations du jeu entré dans le select "game".
		$data = $RAConn->GetGameInfoExtended($_POST["game"]);
		$icon_link = "https://retroachievements.org" . $data->ImageIcon;
		$query = $database->prepare("INSERT INTO games SET 
			title = ?, 
			console = ?, 
			game_id = ?, 
			icon = ?");
		$query->execute([
			$data->Title, 
			$data->ConsoleName, 
			$_POST["game"], 
			$icon_link]);

		// Ajouter chaque achievements du jeu saisi plus haut.
		foreach ($data->Achievements as $key => $value) {
			$icon_link_cheevos = "https://retroachievements.org/Badge/" . $data->Achievements->$key->BadgeName . ".png";
			$query = $database->prepare("INSERT INTO achievements SET 
				title = ?, 
				game_id = ?, 
				achievement_id = ?, 
				description = ?, 
				icon = ?,
				guide = ?");
			$query->execute([
				$data->Achievements->$key->Title, 
				$_POST["game"], 
				$key, 
				$data->Achievements->$key->Description, 
				$icon_link_cheevos,
				"Aucun guide pour le moment!"]);
		}
	}?>
</body>
</html>