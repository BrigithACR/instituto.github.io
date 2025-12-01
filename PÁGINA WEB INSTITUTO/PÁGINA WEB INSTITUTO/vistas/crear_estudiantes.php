<!DOCTYPE html>
<html>
<head>
<title>Crear Estudiante</title>
</head>
<body>
<h1>Crear Estudiante</h1>
<form action="../sesiones/crear_estudiantes.php" method="post">
<label for="Nombres">Nombres:</label>
<input type="text" id="Nombres" name="Nombres" required>
<br>
<label for="Apellidos">Apellidos:</label>
<input type="text" id="Apellidos" name="Apellidos" required>
<br>
<label for="cedula">Cédula:</label>
<input type="text" id="cedula" name="cedula" required>
<br>
<label for="carrera">Carrera:</label>
<input type="text" id="carrera" name="carrera" required>
<br>
<label for="dirección">Dirección:</label>
<input type="text" id="dirección" name="dirección" required>
<br>
<label for="telefono">Teléfono:</label>
<input type="text" id="telefono" name="telefono" required>
<br>
<button type="submit">Enviar</button>
</form>
</form>
</body>
</html>