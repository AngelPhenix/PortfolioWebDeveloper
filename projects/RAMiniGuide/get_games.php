<?php 
	require_once("includes/RA_API.php");
	require_once("includes/pdo.php");
	require_once("includes/class_file.php");

	if(isset($_GET['id']) && $_GET['id'] > 0){
		$data = $RAConn->GetGameList($_GET['id']);
		foreach ($data as $game):?>
			<option class="game" name="console_id" value=<?=$game->ID?>><?=$game->Title?></option>
		<?php endforeach;
	}