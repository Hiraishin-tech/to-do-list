<?php 

require "../assets/database.php";
require "../assets/url.php";
require "../assets/function.php";

session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $connection = connection_db();
    $name = $_POST["name"];
    $nick_name = $_POST["nickname"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if(createUser($connection, $name, $nick_name, $email, $password)) {
        $id = getUserID($connection, $email);
        // Zabraňuje provedení tzv. fixation attack
        session_regenerate_id(true);

        // Nastavení, že je uživatel přihlášený
        $_SESSION["is_logged_user"] = true;
        // Nastavení ID uživatele
        $_SESSION["is_logged_user_id"] = $id;
        redirectUrl("/to-do-list/admin/task-list.php");
    } else {
        echo "Něco se pokazilo. Nemohl jste se zaregistrovat.";
    }
} else {
    echo "Co tady sakra děláte?";
}

?>