<?php
	session_start();
	if(isset($_SESSION['auth'])){
		if(isset($_SESSION['url'])) 
		   $url = $_SESSION['url'];
		else 
		   $url = "../views/index.php";

		header('Location:' . $url);
		session_unset();
		session_destroy();
	}
?>