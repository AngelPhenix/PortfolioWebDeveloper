<?php
require_once '../partials/session.php';
require_once '../partials/call.php';

// Vient de page "/administration/gestion_article.php". Récupère données d'article
if(!empty($_GET['id'])){
	$query = $database->prepare("SELECT * FROM articles WHERE id = ?");
	$query->execute([$_GET['id']]);
	$article = $query->fetch();
	$donnees = json_encode($article);
	if(!empty($donnees)){
		echo $donnees;
	}
}

if(!empty($_POST['modif'])){
	if(!file_exists($_FILES['image_titre']['tmp_name']) || !is_uploaded_file($_FILES['image_titre']['tmp_name'])) {
		$image = $_POST['image'];
	} else {
		$fileName = $_FILES['image_titre']['name'];
		$fileTmpName = $_FILES['image_titre']['tmp_name'];
		$fileSize = $_FILES['image_titre']['size'];
		$fileError = $_FILES['image_titre']['error'];
		// Explode file name in an array
		$fileExt = explode('.', $fileName);
		// Get file extension by getting the last index of the array $fileExt
		$fileActualExt = strtolower(end($fileExt));
		// Get a unique ID so nothing gets deleted by another user's file.
		$image = uniqid('', true) . "." . $fileActualExt;
		// Set destination to "uploads" folder with the new name.
		$fileDestination = "../uploads/".$image;
		// Process to upload the finalized file with the new name in the right folder.
		move_uploaded_file($fileTmpName, $fileDestination);
	}

	$id = $_POST['article_id'];
	$titre = $_POST['article_title'];
	$categorie = $_POST['categorie'];
	$article = $_POST['article_text'];
	$date = date("y.m.d");

	$query2 = $database->prepare('UPDATE articles SET titre = ?, article = ?, date = ?, categorie = ?, image_titre = ? WHERE id = ?');
	$query2->execute([$titre, $article, $date, $categorie, $image, $id]);

	header('Location:../administration/gestion_article.php');
}

// Vient de page "/administration/posting.php". Poste un article
if(!empty($_POST['poster'])){
	$titre = $_POST['article_title'];
	// IMAGE
	$fileName = $_FILES['image_titre']['name'];
	$fileTmpName = $_FILES['image_titre']['tmp_name'];
	$fileSize = $_FILES['image_titre']['size'];
	$fileError = $_FILES['image_titre']['error'];
	// Explode file name in an array
	$fileExt = explode('.', $fileName);
	// Get file extension by getting the last index of the array $fileExt
	$fileActualExt = strtolower(end($fileExt));
	// Get a unique ID so nothing gets deleted by another user's file.
	$image = uniqid('', true) . "." . $fileActualExt;
	// Set destination to "uploads" folder with the new name.
	$fileDestination = "../uploads/".$image;
	// Process to upload the finalized file with the new name in the right folder.
	move_uploaded_file($fileTmpName, $fileDestination);

	$categorie = $_POST['categorie'];
	$article = $_POST['article_text'];
	$auteur = $_SESSION['auth']->username;
	$date = date("y.m.d");

	$statement = $database->prepare("INSERT INTO articles SET titre = ?, article = ?, auteur = ?, date = ?, categorie = ?, image_titre = ?");
	$statement->execute([$titre, $article, $auteur, $date, $categorie, $image]);

	header('Location:../views/index.php');
}
?> 