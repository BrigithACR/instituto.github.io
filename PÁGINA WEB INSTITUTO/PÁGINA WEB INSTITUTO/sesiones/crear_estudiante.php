<?php
require '../config/db.php';
// Recoge los datos del formulario
$id = $_POST['id']; // Usando 'id' en minúscula en el formulario
$Nombres = $_POST['Nombre'];
$Apellidos = $_POST['Apellidos'];
$cedula = $_POST['cedula'];
$carrera = $_POST['carrera'];
$semestre = $_POST['semestre'];
$dirección = $_POST['dirección'];
$telefono = $_POST['telefono'];
// Consulta SQL para insertar datos
$sql = "INSERT INTO cliente (id, Nombres, Apellidos, cedula, carrera, semestre, dirección, telefono) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id, $Nombres, $Apellidos, $cedula, $carrera, $semestre, $dirección, $telefono]);
// Redirige a la página de lista de clientes

header("Location: ../publico/index.php");
exit();
?>