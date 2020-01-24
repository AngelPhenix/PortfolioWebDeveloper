<?php
/*
*	FILE USED IN : scripts/select_script.js
*	GETTING THE FULL ARTICLE USING THE TITLE OF THE MINIFIED ARTICLE
*	CONVERTS TO JSON TO BE ABLE TO MANIPULATE DATA AND INJECT IN THE MODAL 
*	(POP-UP AFTER "Suite" BUTTON CLICKED)
*/ 
?>

<?php 
	require_once 'db.php';
	// Gets the title of the article displayed in the #article div in index.php
	if($_GET['id']){
		$req = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
		$req->execute([$_GET['id']]);
		$article = $req->fetch();

		$testJSON = json_encode($article);

		if(!empty($article)){
			echo $testJSON;
		}
	}
?>