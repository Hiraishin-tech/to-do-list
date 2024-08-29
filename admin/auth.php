<?php 

require "../assets/database.php";
require "../assets/function.php";
require "../assets/url.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $connection = connection_db();
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    if (authUser($connection, $email, $password)) {
        $id = getUserID($connection, $email);

        // Zabraňuje provedení tzv. fixation attack
        session_regenerate_id(true);
        // Nastavení, že je uživatel přihlášený
        $_SESSION["is_logged_user"] = true;
        // Nastavení ID uživatele
        $_SESSION["is_logged_user_id"] = $id;

        redirectUrl("/to-do-list/admin/task-list.php");
    } else {
        $error = "Špatné přihlašovací údaje";
    }
} else {
    echo "Co tu proboha děláte?";
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autentizace</title>
</head>
<body>

<?php if(!empty($error)): ?>
<?= $error ?><br><br>
<a href="../index.php">Zpátky k přihlašování</a>
<?php endif ?>

</body>
</html>