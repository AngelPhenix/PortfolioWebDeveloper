<?php
require_once '../partials/call.php';
	if ($_POST['genre'] == "ajout"){
		$nom = $_POST['name'];
		$description = $_POST['desc'];
		$statement = $database->prepare("INSERT INTO tags SET nom = ?, description = ?");
		$statement->execute([$nom, $description]);
		header('Location:../administration/tagging.php');
	}
	else {
		$nom = $_POST['name'];
		$query2 = $database->prepare("SELECT id FROM tags WHERE nom = ?");
		$query2->execute([$nom]);
		$id_tag = $query2->fetch()->id;

		$query3 = $database->prepare("DELETE FROM article_tag WHERE tags_id = ?");
		$query3->execute([$id_tag]);

		$query = $database->prepare("DELETE FROM tags WHERE nom = ?");
		$query->execute([$nom]);

		header('Location:../administration/tagging.php');
	}
?>