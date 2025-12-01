<?php
require '../config/db.php';
echo '<pre>';
print_r($_GET);
echo '</pre>';
if (!isset($_GET['id']) || empty($_GET['id'])) {
die('Id del cliente no proporcionado');
}
$id = $_GET['id'];
echo "Id recibido: " . htmlspecialchars($id); // Depuración para ver el ID recibido
$sql = "SELECT * FROM estudiantes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$estudiantes = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$estudiantes) {
die('Estudiante no encontrado');
}
?>
<!DOCTYPE html>
<html>

11
<head>
<title>Editar Estudiante</title>
</head>
<body>
<h1>Editar Estudiante</h1>
<form action="../sesiones/estudiantes_update.php" method="post">
<input type="hidden" name="id" value="<?= htmlspecialchars($estudiantes['id']) ?>">
<!-- Nombre del campo oculto debe coincidir con el ID -->
<label for="id"> Id:</label>
<input type="text" id="id" name="id" value="<?= htmlspecialchars($estudiantes['id'])
?>" required> 
<br> <!-- Asegúrate de usar el nombre correcto del campo -->
<br>
<label for="Nombres">Nombres:</label>
<input type="text" name="Nombres" id="Nombres" value="<?=
htmlspecialchars($estudiantes['Nombres']) ?>" required>
<br>
<br>
<label for="Apellidos">Apellidos:</label>
<input type="text" name="Apellidos" id="Apellidos" value="<?=
htmlspecialchars($estudiantes['Apellidos']) ?>" required>
<br>
<br>
<label for="cedula">Cédula:</label>
<input type="text" name="cedula" id="cedula" value="<?=
htmlspecialchars($estudiantes['Nombres']) ?>" required>
<br>
<br>
<label for="Carrera">Carrera:</label>
<input type="text" name="carrera" id="carrera" value="<?=
htmlspecialchars($estudiantes['carrera']) ?>" required>
<br>
<br>
<label for="semestre">Semestre:</label>
<input type="text" name="semestre" id="semestre" value="<?=
htmlspecialchars($estudiantes['semestre']) ?>" required> <br><br>
<label for="direccion">Dirección:</label>
<input type="text" name="direccion" id="direccion" value="<?=
htmlspecialchars($estudiantes['dirección']) ?>" required>
<br>
<br>
<label for="telefono">Teléfono:</label>
<input type="text" name="telefono" id="telefono" value="<?=
htmlspecialchars($estudiantes['telefono']) ?>" required>
<br><br>
<input type="submit" value="Actualizar">
</form>
</body>
</html>