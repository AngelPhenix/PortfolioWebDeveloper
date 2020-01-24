<?php 
	require_once("RA_API.php");
	require_once("class_file.php");
	$RAConn = New RetroAchievements("AngelPhenix", "vRMqDNA67MQ4ieOClOvgLMnuUsStLcU6");
	$database = new PDO('mysql:dbname=retroachievements;host=localhost', 'root', '');
	$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$database->exec("set names utf8");
	$data = $RAConn->GetGameInfo($_GET['id']);