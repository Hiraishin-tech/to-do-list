<?php

require "../assets/database.php";
require "../assets/function.php";
require "../assets/login-access.php";

session_start();
if (!adminAccess()) {
    die ("Nepovolený přístup");
}

$conn = connection_db();


if(isset($_GET["id"]) and is_numeric($_GET["id"]) ) {
    $jedenUkol = getOneTask($conn, $_GET["id"]);
    $tasks = getAllTask($conn);
    if ($jedenUkol === null) {
        die ("Úkol neexistuje");
    }
}




?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/one-task.css">
    <link rel="stylesheet" href="../css/one-task-query.css">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">

    <script src="https://kit.fontawesome.com/88b85df50e.js" crossorigin="anonymous"></script>
    <title>Edit úkolu</title>
</head>
<body>
    
<header>
    <h1>Upravit úkol</h1>
    <p><?php echo date('l jS \of F Y h:i:s A'); ?></p>
</header>

<main>
    <?php if (isset($_GET["id"]) and is_numeric($_GET["id"])): ?>
    <table>
        <thead>
        <form action="edit-ukolu.php" method="POST">
        <tr>
            <th class="columnNumber">
            <input class="cisloUkolu" type="number" name="id" placeholder="Číslo úkolu" readonly value="<?php echo htmlspecialchars($jedenUkol["id"]) ?>">
            </th>
            <th class="taskText">
            <textarea name="task" id="" placeholder="Text..."><?= htmlspecialchars($jedenUkol["task"]) ?></textarea>
            </th>
        </tr>
        
        </thead>
         
        <tbody>
        <tr>
            <td class="btn"></td>
            <td class="btn">
            <button>Editovat&nbsp;<i class="fa-solid fa-pen-to-square"></i></button>
            </form>
            </td>
        </tr>
        <tr>
            <?php foreach ($tasks as $one_task): ?>
                <td class="taskID"><?php echo "# ".$one_task["id"] ?></td>
                <td class="Ukoly"><?php echo $one_task["task"] ?></td>

        </tr>
        <?php endforeach ?>
        <tr>
            <td class="btn-back">
            <a href="./task-list.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </td>
        </tr>
        </tbody>    
    </table>
    

    
    <?php else: ?>
        <?php die ("Úkol nebyl nalezen") ?>
    <?php endif ?>
</main>

<?php require "../assets/footer.php" ?>

<script src="../js/current-time.js"></script>
</body>
</html>