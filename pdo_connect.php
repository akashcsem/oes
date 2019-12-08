


<?php

$servername = "localhost";
$dbname     = "oes";
$dbserver = "mysql:host=$servername;dbname=$dbname";

$dbusername   = "root";
$dbpassword   = "";

try {
    $conn = new PDO($dbserver, $dbusername, $dbpassword);
    // display a message if connected to database successfully
    // if ($conn) {
    //     echo "Connected to the <strong>$dbname</strong> database successfully!";
    // }
} catch (PDOException $e) {
    // report error message
    echo $e->getMessage();
}
