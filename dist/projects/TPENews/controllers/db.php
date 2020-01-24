<?php
// Connexion PDO pour localhost / PHPmyadmin
$pdo = new PDO('mysql:dbname=pmenews;host=localhost', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->exec("set names utf8");