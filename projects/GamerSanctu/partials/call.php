<?php
$database = new PDO('mysql:host=localhost;dbname=siteangel', 'root', '');
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$database->exec("set names utf8");
?>