<?php
require '../config/db.php';
// Validar que los datos del formulario estén presentes
if (!isset($_POST['id']) || !isset($_POST['Nombres']) || !isset($_POST['Apellidos']) || !isset($_POST['cedula']) |
 !isset($_POST['carrera']) || !isset($_POST['semestre']) || !isset($_POST['dirección']) |
!isset($_POST['telefono'])) {
die('Datos del formulario incompletos.');
}
$Nombres = $_POST['Nombre'];
$Apellidos = $_POST['Apellidos'];
$cedula = $_POST['cedula'];
$carrera = $_POST['carrera'];
$semestre = $_POST['semestre'];
$dirección = $_POST['dirección'];
$telefono = $_POST['telefono'];
$sql = "UPDATE estudiantes SET Nombres = ?, Apellidos = ?, cedula = ?, carrera = ?, semestre = ?, dirección = ?, telefono = ? WHERE
id = ?";
$stmt = $pdo->prepare($sql);
try {
$stmt->execute([$Nombres, $Apellidos, $cedula, $carrera, $semestre, $direccion, $telefono, $id]);
header("Location: ../publico/index.php");
exit();
} catch (PDOException $e) {
echo 'Error: ' . $e->getMessage();
}
?>