
<?php
require './../conn/conn.php';
if(isset($_POST['btnAddService'])){
    echo $name = $_POST['name'];
    echo $description = $_POST['description'];

    $stmt_add_doctor = $PDO_conn->prepare(" INSERT INTO servicios (name, description) VALUES (?, ?) ");
    $stmt_add_doctor->execute([$name, $description]);

    if($stmt_add_doctor){
        header("location: ./../servicios.php");
    }
}
?>