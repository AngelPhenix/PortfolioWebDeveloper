 <?php 
require_once 'database.php';

if(isset($_GET['task_done']))  {
    $id = $_GET['task_done'];
    $query = $pdo->query("UPDATE todo_PHP SET completed = 1 WHERE id=".$id);
    header("Location: ../index.php");
} elseif (isset($_GET['task_undone']))  {
    $id = $_GET['task_undone'];
    $query = $pdo->query("UPDATE todo_PHP SET completed = 0 WHERE id=".$id);
    header("Location: ../index.php");
} else {
    header("Location: ../index.php");
}