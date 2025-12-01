<?php
require '../config/db.php';
// Primera consulta para obtener todas las facturas
$sql = "SELECT f.Id_fac, f.fec_fac, e.id, e.Nombres AS Nombres, s.nombre, f.Valor_Total
FROM factura f
JOIN estudiantes e ON f.Id = e.id
JOIN servicios s ON f.Id_ser = s.id";
$stmt = $pdo->query($sql);
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<h1>Lista de Facturas</h1>";
echo "<a href='../vistas/crear_factura.php'>Crear Nueva Factura</a><br><br>"; //Enlace para crear una nueva factura
echo "<table border='1'>
<tr>
<th>ID Factura</th>
<th>Fecha</th>
<th>Estudiantes</th>
<th>Carrera</th>
<th>Valor Total</th>
<th>Acciones</th>
</tr>";
foreach ($resultado as $fila) {
// Usa directamente $fila['Id_fac'] para el enlace de eliminación
$idFac = htmlspecialchars($fila['Id_fac']);
$fecFac = htmlspecialchars($fila['fec_fac']);
$nomCli = htmlspecialchars($fila['Nombres']);
$nomSer = htmlspecialchars($fila['nombre']);
$valorTotal = htmlspecialchars($fila['Valor_Total']);
echo "<tr>
<td>" . $idFac . "</td>
<td>" . $fecFac . "</td>
<td>" . $nomCli . "</td>
<td>" . $nomSer . "</td>
<td>" . $valorTotal . "$</td>
<td>
<a href='../vistas/factura_update.php?id=" . $idFac . "'>Editar</a> |

<a href='../sesiones/factura_eliminar.php?Id_fac=" . $idFac . "'
onclick=\"return confirm('¿Estás seguro?')\">Eliminar</a>
</td>
</tr>";
}
echo "</table>";
?>