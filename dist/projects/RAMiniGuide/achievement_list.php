<?php 
	require_once("includes/pdo.php");
	require_once("includes/start_session.php");
	$rank = 0;

	// On s'assure qu'il n'y a que l'admin qui puisse modifier les guides, même en mettant contenteditable dans l'HTML en "dur".
	if(isset($_SESSION["auth"])){
		if($_SESSION["auth"]){
			$rank = $_SESSION["auth"]->admin;
		}
	}

	// Executé par le call aJAX à chaque fois que l'admin "lose focus" sur le guide d'un succès après l'avoir modifié.
	if(isset($_POST["content"]) && isset($_POST["id"]) && $_POST["rank"] == 1){
		$query = $database->prepare("UPDATE achievements SET guide = ? WHERE id = ?")->execute([$_POST["content"], $_POST["id"]]);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Achievement list</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			document.execCommand('defaultParagraphSeparator', false, 'p');
		    $('.guide').hide();
		    
		    $('.achievements').on('click', function (e) {
		        var elem = $(this).next('.guide');
		        $('.guide').not(elem).hide('fast');
		        elem.toggle('fast');
		    });

		    $('.guide').focusout(function(){
		    	$.post("", {content: this.innerHTML, id: this.id, rank:'<?php echo $rank?>'});
		    });
		});
	</script>
</head>
<body>
	<?php
	$query = $database->prepare("SELECT * FROM achievements WHERE game_id = ?");
	$data = $query->execute([$_GET["game_id"]]);
	$data = $query->fetchAll();
	foreach($data as $cheevo):?>
		<div class="achievements">
			<img src="<?=$cheevo->icon?>"/>
			<div class="achievements_container">
				<p class="p1"><?=$cheevo->title?></p>
				<p class="p2"><?=$cheevo->description?></p>
			</div>
		</div>
		<p id="<?=$cheevo->id?>" class="guide" <?php if($rank){echo 'contenteditable="true"';}?>><?=$cheevo->guide?></p>
	<?php endforeach; ?>
</body>
</html>