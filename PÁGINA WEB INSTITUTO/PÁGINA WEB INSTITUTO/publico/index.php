<?php
require '../config/db.php';
$sql = "SELECT * FROM estudiantes";
$stmt = $pdo->query($sql);
$estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Depura los datos para ver la estructura
echo '<pre>';
print_r($estudiantes);
echo '</pre>';
?>
<!DOCTYPE html>
<html>
<head>
<title>Estudiantes</title>
</head>
<body>
<h1>Estudiantes</h1>
<a href="../vistas/crear_estudiantes.php">Crear Estudiante</a>
<table border="1">
<tr>
<th>ID</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Cédula</th>
<th>Carrera</th>
<th>Semestre</th>
<th>Dirección</th>
<th>Teléfono</th>
</tr>
<?php foreach ($estudiantes as $estudiantes): ?>
<tr>

<td><?= $estudiantes['id'] ?></td>
<td><?= $estudiantes['Nombres'] ?></td>
<td><?= $estudiantes['Apellidos'] ?></td>
<td><?= $estudiantes['cedula'] ?></td>
<td><?= $estudiantes['carrera'] ?></td>
<td><?= $estudiantes['semestre'] ?></td>
<td><?= $estudiantes['dirección'] ?></td>
<td><?= $estudiantes['telefono'] ?></td>
<td>
<a href="../vistas/estudiantes_update.php?id=<?= htmlspecialchars($estudiantes['id'])
?>">Editar</a>
<a href="../sesiones/estudiantes_eliminar.php?id=<?=
htmlspecialchars($estudiantes['id']) ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
</td>
</tr>
<?php endforeach;
?>
</table>
</body>
</html>