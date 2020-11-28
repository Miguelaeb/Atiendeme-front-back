<?php
require './../conn/conn.php';
if(isset($_POST['btnAddCenter'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    //Agregar centro
    $stmt_add_center = $PDO_conn->prepare(" INSERT INTO centros (name, email, address, phone) VALUES (?, ?, ?, ?) ");
    $stmt_add_center->execute([$name, $email, $address, $phone]);

    //Obtener id del ultimo centro agregado
    $stmt_select_last_added_center =  $PDO_conn->prepare(" SELECT LAST_INSERT_ID() FROM centros");
    $stmt_select_last_added_center->execute([]);
    $fetch_center_id = $stmt_select_last_added_center->fetch(PDO::FETCH_ASSOC);
    $center_id = intval($fetch_center_id['LAST_INSERT_ID()']);

    //Agrgar servicios al centro
   for ($i=0; $i < sizeof($_POST['servicios']); $i++) { 
        $servicios = $_POST['servicios'][$i];
        $stmt_add_services_to_center = $PDO_conn->prepare(" INSERT INTO center_services (center_id, services_id) VALUES (?, ?) ");
        $stmt_add_services_to_center->execute([$center_id, $servicios]);
    }

    //Agrgar doctores al centro
   for ($i=0; $i < sizeof($_POST['doctores']); $i++) { 
        $doctores = $_POST['doctores'][$i];
        $stmt_add_doctores_to_center = $PDO_conn->prepare(" INSERT INTO center_doctors (center_id, doctor_id) VALUES (?, ?) ");
        $stmt_add_doctores_to_center->execute([$center_id, $doctores]);
    }

    if($stmt_add_center){
        header("location: ./../consultorios.php");
    }

}
?>