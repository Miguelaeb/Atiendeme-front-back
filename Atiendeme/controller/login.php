<?php
require './../conn/conn.php';
session_start();

if (isset($_POST['email'])) {

	$email = $_POST['email'];
	$pass = md5($_POST['passw']);

	$stmt_select_user =  $PDO_conn->prepare("SELECT * FROM usuarios WHERE email = ? AND pass = ?");
	$stmt_select_user->execute([$email, $pass]);

	$userCount = $stmt_select_user->rowCount();

	if ($userCount !== 0) {
        //echo "Iniciado con exito.";
        $_SESSION['logged'] = true;

        while ($row = $stmt_select_user->fetch(PDO::FETCH_ASSOC)) {
           $_SESSION['userId'] = $row['id'];
           $_SESSION['userName'] = $row['nombres'];
           $_SESSION['userLastName'] = $row['apellidos'];
           $_SESSION['userType'] = $row['userType'];
        }

        header('location: ./../dashboard.php');

	}else{
        echo "Correo o contraseña incorrectas.";
	}

}else{
	echo "Llenar los campos.";
}