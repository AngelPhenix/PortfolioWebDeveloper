<?php 
	require_once("includes/pdo.php");
	require_once("includes/start_session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Game List</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<?php
	$query = $database->prepare("SELECT * FROM games WHERE console = ?");
	$data = $query->execute([$_GET["console"]]);
	$data = $query->fetchAll();
	foreach($data as $game): ?>
	<div class="game_container">
		<a class="games" href="achievement_list.php?game_id=<?=$game->game_id?>">
			<img src="<?=$game->icon?>"/>
			<p><?=$game->title?></p>
		</a>
	<?php if(isset($_SESSION["auth"])){
		if($_SESSION["auth"]->admin){?>
		<a class="delete_games" href="delete.php?game_id=<?=$game->game_id?>">X</a>
	<?php }} ?>
	</div>
	<?php endforeach; ?>
</body>
</html>