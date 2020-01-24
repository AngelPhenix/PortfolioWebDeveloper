<?php 	
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}