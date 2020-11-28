<?php
require './../conn/conn.php';
if(isset($_POST['btnAddDoctor'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $schedule = $_POST['schedule'];
    $pass = hash_hmac('sha512', $_POST['pass'], 'secret');


    $stmt_add_doctor = $PDO_conn->prepare(" INSERT INTO doctores (name, email, phone, schedule) VALUES (?,?,?,?) ");
    $stmt_add_doctor->execute([$name, $email, $phone, $schedule]);

    //Obtener id del ultimo doctor agregado
    $stmt_select_last_added_doctor =  $PDO_conn->prepare(" SELECT LAST_INSERT_ID() FROM doctores");
    $stmt_select_last_added_doctor->execute([]);
    $fetch_doctor_id = $stmt_select_last_added_doctor->fetch(PDO::FETCH_ASSOC);
    $doctor_id = intval($fetch_doctor_id['LAST_INSERT_ID()']);

    for ($i=0; $i < sizeof($_POST['especialidades']); $i++) { 
        $especialidades = $_POST['especialidades'][$i];
        $stmt_add_services_to_doctor = $PDO_conn->prepare(" INSERT INTO services_doctor (doctor_id, service_id) VALUES (?,?) ");
        $stmt_add_services_to_doctor->execute([$doctor_id, $especialidades]);
    }

    if($stmt_add_doctor){
        header("location: ./../doctores.php");
    }
}
?>