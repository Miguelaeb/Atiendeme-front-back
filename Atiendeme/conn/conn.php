<?php
$myServer = "localhost";
$myUser = "root";
$myPass = "";
$myDB = "atiendemedb";

try {
    $PDO_conn = new PDO("mysql:host=$myServer;dbname=$myDB","$myUser","$myPass");
    $PDO_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e) {
    die("Could not connect to the database $myDB :" . $e->getMessage());
}
?>