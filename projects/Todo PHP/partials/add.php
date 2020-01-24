<?php
session_start();
if(!empty($_POST)){
    if(empty($_POST['task'])){
        $_SESSION['errors'] = "Sorry you must fill in the task";
        header("Location: ../index.php");
    } else {
        require_once 'database.php';
        $data = $pdo->prepare("INSERT INTO todo_php SET title = ?");
        $data->execute([$_POST['task']]);
        $_SESSION['taskAdded'] = "Your task have sucessfully been added";
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}