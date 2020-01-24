<?php require_once("includes/pdo.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>RetroAchievements MiniGuides</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script type="text/javascript">
  	$(window).bind('keydown', function(event) {
	    if (event.ctrlKey) {
	        switch (String.fromCharCode(event.which).toLowerCase()) {
	        case 'c':
	            event.preventDefault();
	            window.location = "connexion.php";
	            break;
  			case 'a':
  				event.preventDefault();
  				window.location = "add_game.php";
  				break;}}});
  </script>
</head>
<body>
	<?php
	$query = $database->query("SELECT DISTINCT console FROM games")->fetchAll();
	foreach ($query as $data): ?>
		<div class="consoles">
			<a href="game_list.php?console=<?=$data->console?>"><?=$data->console?></a>
		</div>
	<?php endforeach; ?>
</body>
</html>