<!DOCTYPE html
>
<html lang = "es">
<head>
<meta charset = "UTF-">

<title>Editar Factura</title>
<script>
function calcularValorTotal() {
var servicioSeleccionado = document.getElementById('id_serv');
var valorSer =
servicioSeleccionado.options[servicioSeleccionado.selectedIndex].getAttribute('data-valor');
document.getElementById('Valor_Total').value = valorSer ? valorSer + '€' : '';
}
</script>
</head>
<body>
<h1>Editar Factura</h1>
<?php
// Aquí debe estar definida la variable $factura antes de renderizar el formulario
require '../config/db.php';
// Verifica que se haya recibido un Id_fac y carga la factura
if (isset($_GET['id'])) {
$Id_fac = $_GET['id'];
try {
$stmt = $pdo->prepare("SELECT * FROM factura WHERE Id_fac = :Id_fac");
$stmt->execute([':Id_fac' => $Id_fac]);
$factura = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$factura) {
echo "No se encontró la factura con el ID proporcionado.";
exit();
}
} catch (PDOException $e) {
echo "Error al obtener la factura: " . $e->getMessage();
exit();
}
} else {
echo "ID de factura no proporcionado.";
exit();
}
?>
<form action="../sesiones/factura_update.php" method="post">
<input type="hidden" name="Id_fac" value="<?php echo $factura['Id_fac']; ?>">

<label for="fec_fac">Fecha de Factura:</label>
<input type="date" id="fec_fac" name="fec_fac" value="<?php echo
$factura['fec_fac']; ?>" required><br><br>
<label for="Id">estudiantes:</label>
<select id="Id" name="Id" required>
<?php
try {
$stmt = $pdo->query("SELECT id, nombre FROM estudiantes");
$estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($estudiantes as $estudiantes) {
$selected = $estudiantes['id'] == $factura['id'] ? 'selected' : '';
echo "<option value='" . $estudiantes['id'] . "' $selected>" . $estudiantes['Nombres'] .
"</option>";
}
} catch (PDOException $e) {
echo "Error al obtener los clientes: " . $e->getMessage();
}
?>
</select><br><br>
<label for="Id_ser">Servicio:</label>
<select id="Id_ser" name="Id_ser" required onchange="calcularValorTotal()">
<option value="">Seleccione un servicio</option>
<?php
try {
$stmt = $pdo->query("SELECT Id_ser, nom_ser, Valor_ser FROM servicios");
$servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($servicios as $servicio) {
$selected = $servicio['Id_ser'] == $factura['Id_ser'] ? 'selected' : '';
echo "<option value='" . $servicio['Id_ser'] . "' data-valor='" .
$servicio['Valor_ser'] . "' $selected>" . $servicio['nom_ser'] . " - " . $servicio['Valor_ser']
. "€</option>";
}
} catch (PDOException $e) {
echo "Error al obtener los servicios: " . $e->getMessage();
}
?>
</select><br><br>
<label for="Valor_Total">Valor Total:</label>

<input type="text" id="Valor_Total" name="Valor_Total" value="<?php echo
$factura['Valor_Total']; ?>" readonly><br><br>
<button type="submit">Guardar Cambios</button>
</form>
</body>
</html>