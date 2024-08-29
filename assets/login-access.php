<?php 
/**
 * Autentizace uživatele, zda je přihlášený
 * @return boolean - true - Když je přihlášený, false - Když není přihlášený
 * 
 */

function adminAccess () {
    return isset($_SESSION["is_logged_user"]) and $_SESSION["is_logged_user"];
}

?>