<?php
require './../conn/conn.php';
if(isset($_POST['btnAddSecretaria'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pass = hash_hmac('sha512', $_POST['pass'], 'secret');


    $stmt_add_secretaria = $PDO_conn->prepare(" INSERT INTO secretarias (name, email, phone, address, pass) VALUES (?,?,?,?,?) ");
    $stmt_add_secretaria->execute([$name, $email, $phone, $address, $pass]);

    //Obtener id de la ultima secretaria agregada
    $stmt_select_last_added_secretary =  $PDO_conn->prepare(" SELECT LAST_INSERT_ID() FROM secretarias");
    $stmt_select_last_added_secretary->execute([]);
    $fetch_secretaria_id = $stmt_select_last_added_secretary->fetch(PDO::FETCH_ASSOC);
    $secretaria_id = intval($fetch_secretaria_id['LAST_INSERT_ID()']);

    for ($i=0; $i < sizeof($_POST['centros']); $i++) { 
        $centros = $_POST['centros'][$i];
        $stmt_add_services_to_secretaria = $PDO_conn->prepare(" INSERT INTO centers_secretaria (secretaria_id, center_id) VALUES (?,?) ");
        $stmt_add_services_to_secretaria->execute([$secretaria_id, $centros]);
    }

    if($stmt_add_secretaria){
        header("location: ./../manejosec.php");
    }
}
?>