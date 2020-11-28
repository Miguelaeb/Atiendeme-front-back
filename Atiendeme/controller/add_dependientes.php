<?php
require './../conn/conn.php';
session_start();
if(isset($_POST['BtnAddDependiente'])){
    $name = $_POST['name'];
    $docId = $_POST['docId'];
    $age = $_POST['age'];
    $relationship = $_POST['relationship'];
    $email = $_POST['email'];

    $paciente_id = $_SESSION['userId'];

    $stmt_add_dependiente = $PDO_conn->prepare(" INSERT INTO dependiente (name, docId, age, relationship, email, paciente_id) VALUES (?,?,?,?,?,?) ");
    $stmt_add_dependiente->execute([$name, $docId, $age, $relationship, $email, $paciente_id]);

    if($stmt_add_dependiente){
        header("location: ./../dependientes.php");
    }
}
?>