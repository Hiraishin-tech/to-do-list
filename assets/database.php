<?php 

/**
 * Napojení na databázi
 * 
 * @return object - $conn (Umožňuje napojit se na databázi to-do-list)
 * 
 */

function connection_db() {
    $db_host = "localhost";
    $db_user = "tomaspham";
    $db_password = "Harry123";
    $db_name = "to-do-list";
    
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    if (!$conn) {
        mysqli_connect_error($conn);
        if(mysqli_connect_error($conn)) {
            echo mysqli_connect_error($conn);
        } else {
            exit;
        }
    } else {
        return $conn;
    }  
    
}




?>