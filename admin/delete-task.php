<?php 

require "../assets/database.php";
require "../assets/function.php";
require "../assets/url.php";

$connection = connection_db();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (deleteTask($connection, $_GET["id"])) {
        redirectUrl("/to-do-list/admin/task-list.php");
    }

} else {
    echo "Co tady sakra děláte? Chcete mě hacknout?";
}

?>