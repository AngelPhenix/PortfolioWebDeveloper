<?php 
  session_start();
  require_once 'partials/database.php';

  $query = $pdo->query("SELECT * FROM todo_php WHERE completed = 0 ORDER BY id DESC");
  $query->execute();
  $undone_data = $query->fetchAll();

  $query = $pdo->query("SELECT * FROM todo_php WHERE completed = 1 ORDER BY id DESC");
  $query->execute();
  $done_data = $query->fetchAll();

  if(isset($_GET['delete_task'])){
    $id = $_GET['delete_task'];
    $query = $pdo->query("DELETE FROM todo_php WHERE id=".$id." LIMIT 1");
    header("Location: index.php");
  } 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <title>Todo-List</title>
</head>
<body>

<form method="POST" action="partials/add.php" method="post">
 <?php if(isset($_SESSION['errors'])): ?> 
  <p id="task_error"><?=$_SESSION['errors']?></p>
  <?php unset($_SESSION['errors']); endif ?>

  <?php if(isset($_SESSION['taskAdded'])): ?> 
  <p id="task_added"><?=$_SESSION['taskAdded']?></p>
  <?php unset($_SESSION['taskAdded']); endif ?>

  <input id="task_input" type="text" name="task">
  <input id="task_button" type="submit" name="submit" value="Add task">
</form>

<div id="big_container">
  <div class="database_container">
    <p class="head">Task</p>
    <p class="head">Action</p>
  </div>
 
  <?php foreach ($undone_data as $task): ?>
    <div class="database_container">
      <p id="task_title"><?=$task->title?></p>
      <div id="undone_button_container">
        <p><a class="done_button" href="partials/mark.php?task_done=<?=$task->id?>">Mark as done</a></p>
        <p><a class="delete_button" href="index.php?delete_task=<?=$task->id?>">X</a></p>
      </div>
    </div>
  <?php endforeach ?>

  <div id="clear"></div>

  <?php foreach ($done_data as $task): ?>
      <div class="database_container_2">
        <p id="task_title"><?=$task->title?></p>
        <div id="undone_button_container">
          <p><a class="done_button" href="partials/mark.php?task_undone=<?=$task->id?>">Mark as undone</a></p>
          <p><a class="delete_button"href="index.php?delete_task=<?=$task->id?>">X</a></p>
        </div>
      </div>
  <?php endforeach ?>
</div>

</body>
</html>
	