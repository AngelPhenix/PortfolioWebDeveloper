<?php 
$dbname = "";
	$database = new PDO('mysql:dbname='.$dbname.';host=localhost', 'root', '');
	$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$database->exec("set names utf8");