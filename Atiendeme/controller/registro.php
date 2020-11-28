<?php
require './../conn/conn.php';

if (isset($_POST['name'])) {

	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$birthday = $birthday = date('Y-m-d', strtotime($_POST['birthday']));
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$pass = md5($_POST['pass']);
	$phone = $_POST['phone'];

	$identificacion = 0;
	$perfilId = 0;
	$cel_phone = "";
	$paisId = 0;

	$stmt_select_user =  $PDO_conn->prepare("SELECT * FROM usuarios WHERE email = ?");
	$stmt_select_user->execute([$email]);

	$userCount = $stmt_select_user->rowCount();

	if ($userCount !== 0) {
		echo "Usuario ya existe.";
	}else{
		
		$stmt_insert_user = $PDO_conn->prepare("INSERT INTO usuarios (identificacion,
			email, 
			genero, 
			nombres, 
			apellidos, 
			perfilId, 
			telefono, 
			celular, 
			paisId, 
			birthday,
			pass)

			VALUES 

			(?, 
			?,
			?,
			?,
			?,
			?,
			?,
			?,
			?,
			?,
			?)");


		$stmt_insert_user->execute([$identificacion,
			$email,
			$gender,
			$name,
			$lastname,
			$perfilId,
			$phone,
			$cel_phone,
			$paisId,
			$birthday,
			$pass]);

		if ($stmt_insert_user) {
			//echo "Registro con exito.";
			header("location: ./../login.php");
		}

	}

}else{
	echo "Llenar los campos.";
}