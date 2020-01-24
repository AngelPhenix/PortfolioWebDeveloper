<?php 
session_start();

	// If not connected : Redirected to index.php.
	if(!isset($_SESSION["auth"])){
		header("Location: index.php");
	}
	// If connected :
	else {
		$member = $_SESSION["auth"];
		if($member->rank == "Administrateur" && $_GET['id']){
			require_once "db.php";
			$req = $pdo->prepare("DELETE FROM articles WHERE id = ?");
			$req->execute([$_GET['id']]);
			header("Location: ../articles.php");
		} else {
			header("Location: ../index.php");
		}
	}
?>