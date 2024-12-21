<?php

function openCon() {
    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'batik'); // harus disesuaikan ?

    try {
        /* Attempt to connect to MySQL database */
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // Check connection
        if($mysqli->connect_error){
            throw new Exception("ERROR: Could not connect. " . $mysqli->connect_error);
        }
        return $mysqli;
    } catch (Throwable $th) {
        exit('failed to connect');
    }
}

function closeCon($mysqli) {
    $mysqli->close();
}

?>