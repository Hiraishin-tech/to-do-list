<?php 

require "../assets/database.php";
require "../assets/function.php";
require "../assets/url.php";




if($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = connection_db();
    $tasks = getAllTask($conn);
    $id = $_POST["id"];
    $one_task = $_POST["task"];

    if(updateTasks($conn, $one_task, $id)) {
        redirectUrl("/to-do-list/admin/task-list.php");
    }
} else {
    echo "Co tady sakra děláte?";
}


?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update úkolu</title>
</head>
<body>
    
</body>
</html>