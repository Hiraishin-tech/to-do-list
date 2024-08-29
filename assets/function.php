<?php 

/******* 
TASKS
 **********/

/**
 * Vypsání všech úkolů z databáze
 * 
 *@return mixed - vrací associativní pole Úkolů. 
 */

function getAllTask($connection) {
    $sql = "SELECT *
            FROM todo";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $getAllTask = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $getAllTask;
    } else {
        mysqli_error($connection);
    }
}

/**
 * Získává jeden úkol z databáze
 * @param $connection - Napojení na databázi
 * @param integer - ID daného úkolu
 * 
 * @return mixed - asociativní pole, které obsahuje informace o daném úkolu. Nebo vráti null, pokud úkol nebyl nalezen
 */

function getOneTask ($connection, $id) {
    $sql = "SELECT *
            FROM todo
            WHERE id = ?";
    $stmt = mysqli_prepare($connection, $sql);

    if($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_assoc($result);
        }
    } else {
        echo mysqli_error($connection);
    }
}

/**
 * Editace úkolů
 * @param object - $connection (Napojení na databázi)
 * @param int - $idecko (ID úkolu)
 * @param string - $task (Úkol k danému ID)
 * 
 * @return boolean - true (Když se updatuje úkol), false (Když se neupdateje úkol)
 * 
 */

function updateTasks ($connection, $task, $id) {
    $sql = "UPDATE todo
            SET task = ?
            WHERE id = ?";
    
    $stmt = mysqli_prepare($connection, $sql);

    if (!$stmt) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "si", $task, $id);
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            mysqli_stmt_error($stmt);
        }
    }
}

/**
 * Vytvoření nového úkolu
 * @param object - $connection (Napojení na databázi)
 * @param string - $task (Zadání nového úkolu)
 * 
 * @return integer - $id (Vrací ID daného úkolu)
 * 
 */

function createTask($connection, $task) {
    $sql = "INSERT INTO todo (task)
            VALUES (?)";
    $stmt = mysqli_prepare($connection, $sql);

    if(!$stmt) {
        mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "s", $task);
        if (mysqli_stmt_execute($stmt)) {
            $id = mysqli_insert_id($connection);
            return $id;
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}

/**
 * Vymazání úkolu 
 * @param object - $conn (Napojení na databázi)
 * @param int - $id (ID daného úkolu)
 * 
 * @return boolean - true - když se úkol úspěšně vymaže, false - Když se úkol nevymaže
 * 
 */

function deleteTask($conn, $id) {
    $sql = "DELETE from todo
            WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            return true;
        }
    }
}

/***********
USER
***********/

/**
 * Přidání uživatele do databáze
 * @param object - $connection (Napojení na databázi)
 * @param string - $name (Jméno a Příjmení uživatele)
 * @param string - $email (Email uživatele)
 * @param string - $password (Heslo uživatele)
 * 
 * @return int - $id (ID uživatele)
 */

function createUser ($connection, $name, $nickname, $email, $password) {
    $sql = "INSERT INTO user (name, nickname, email, password)
            VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);

    if (!$stmt) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $nickname, $email, $password);
        if (mysqli_stmt_execute($stmt)) {
            $id = mysqli_insert_id($connection);
            return $id;
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}

/**
 * Autentizace uživatele při přihlašování
 * @param object - $conn (Napojení do databáze)
 * @param string - $log_email (Zadaný email při přihlášení)
 * @param string - $log_password (Zadané heslo při přihlašování)
 * 
 * @return boolean - true (Když se zadané heslo shoduje s heslem v databázi a příslušný email), false (Když se hesla a email neshodují)
 * 
 */

function authUser ($conn, $log_email, $log_password) {
    $sql = "SELECT password FROM user
            WHERE email = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "s", $log_email);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows != 0) {
                $user_password_database = mysqli_fetch_row($result);
                $user_password_db = $user_password_database[0];
                if ($user_password_db) {
                    return password_verify($log_password, $user_password_db);
                } else {
                    echo "Heslo není správné";
                }
            } else {
                echo "Špatně zadaný email";
                echo "<br>";
                echo "<br>";
            }
            
        }
    }
}

/**
 * Získání ID přihlášeného uživatele
 * @param object - $connection (Napojení na databázi)
 * @param string - $email (Email přihlášeného uživatele)
 * 
 * @return int - ID přihlášeného uživatele
 */

function getUserID ($connection, $email) {
    $sql = "SELECT id
            FROM user
            WHERE email = ?";
    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $user_datase_id = mysqli_fetch_row($result);
            $user_id = $user_datase_id[0];
            return $user_id;
        }
    } else {
        echo mysqli_error($connection);
    }
}

?>