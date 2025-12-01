<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Crear Nueva Factura</title>
<script>
function calcularValorTotal() {
var servicioSeleccionado = document.getElementById('Id_ser');
var valorSer =
servicioSeleccionado.options[servicioSeleccionado.selectedIndex].getAttribute('data-valor'); 
document.getElementById('Valor_Total').value = valorSer ? valorSer : '';
document.getElementById('Valor_ser').value = valorSer ? valorSer : ''; //Actualizar el campo oculto Valor_ser
}
</script>
</head>
<body>
<h1>Crear Nueva Factura</h1>
<form action="../sesiones/crear_factura.php" method="post">
<label for="fec_fac">Fecha de Factura:</label>
<input type="date" id="fec_fac" name="fec_fac" required><br><br>
<label for="id">estudiantes:</label>
<select id="id" name="id" required>
<?php
require '../config/db.php';
try {
$stmt = $pdo->query("SELECT id, nombre FROM estudiantes");
$estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($estudiantes as $estudiantes) {
echo "<option value='" . $estudiantes['id'] . "'>" . $estudiantes['Nombres'] . "</option>";
}
} catch (PDOException $e) {
echo "Error al obtener los clientes: " . $e->getMessage();
}
?>
</select><br><br>
<label for="Id_ser">Servicio:</label>
<select id="Id_ser" name="Id_ser" required onchange="calcularValorTotal()">
<option value="">Seleccione su carrera</option>
<?php

try {
$stmt = $pdo->query("SELECT Id_ser, nombre, Valor_ser FROM servicios");
$servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($servicios as $servicio) {
echo "<option value='" . $servicios['id'] . "' data-valor='" .
$servicios['Valor_ser'] . "'>" . $servicios['nom_ser'] . " - " . $servicios['Valor_ser'] .
"€</option>";
}
} catch (PDOException $e) {
echo "Error al obtener los servicios: " . $e->getMessage();
}
?>
</select><br><br>
<!-- Campo oculto para almacenar el valor del servicio seleccionado -->
<input type="hidden" id="Valor_ser" name="Valor_ser">
<label for="Valor_Total">Valor Total:</label>
<input type="text" id="Valor_Total" name="Valor_Total" readonly><br><br>
<button type="submit">Crear Factura</button>
</form>
</body>
</html>