<?php
require "../assets/database.php";
require "../assets/function.php";
require "../assets/url.php";
require "../assets/login-access.php";

session_start();

if (!adminAccess()) {
    die ("Přístup odepřen");
}

$connection = connection_db();

$tasks = getAllTask($connection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (createTask($connection, $_POST["newtask"])) {
    redirectUrl("/to-do-list/admin/task-list.php");
}   

}


?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/task-list.css">
    <link rel="stylesheet" href="../css/task-list-query.css">

    <script src="https://kit.fontawesome.com/88b85df50e.js" crossorigin="anonymous"></script>
    <title>Task-list</title>
</head>
<body>
    <?php require "../assets/admin-header.php" ?>
    <main>
        <section class="createTask-form">
            <form action="" method="POST">
                <input type="text" name="newtask" placeholder="Nový úkol..." required maxlength="500">
                <button><i class="fa-solid fa-plus"></i></button>
            </form>
        </section>
        <section class="Tasks">
            <table>
                <thead> <!-- Nemusím tam mít thead a tbody, ale pro přehlednost to je lepší -->
                <tr>
                        <th class="rankTask">#</th>
                        <th class="task-length">Úkoly</th>
                        <th class="editTask">Edit</th>
                        <th>Vymazat</th>
                </tr>
                </thead>
            <tbody>
        
            <?php foreach($tasks as $one_task): ?>
            
                <tr>
                    <td class="rankTask"><?php echo htmlspecialchars($one_task["id"]) .'.' ?></td>
                    <td class="Ukoly"><?= htmlspecialchars($one_task["task"])  ?></td>
                    <td class="editTask"><a href="one-task.php?id=<?= htmlspecialchars($one_task['id']) ?>"><i class="fa-solid fa-user-pen"></i></a></td>
                    <td>
                        <form class="form-btn-delete" action="./delete-task.php?id=<?php echo htmlspecialchars($one_task['id']) ?>" method="POST">
                                <button class="delete"><i class="fa-solid fa-circle-xmark"></i></button>
                        </form>
                    </td>   
                </tr>
            <?php endforeach ?>
            </tbody>
            </table>
        </section>
    </main>
    <?php require "../assets/footer.php" ?>

</body>
</html>
