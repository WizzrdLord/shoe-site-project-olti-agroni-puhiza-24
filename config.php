<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoe-store";

try{
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        throw new Exception("Database not online.");
    }

    $db_connected = true;

} catch (Exception $e){
    $db_connected = false;
    error_log($e->getMessage());
}
?>