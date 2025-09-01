<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Médicos</title>
  <link rel="stylesheet" href="{{ asset('css/medicos.css') }}">
</head>
<body>
  <div class="container">
    <!-- Formulario -->
    <div class="form-card">
      <h2>Registrar Médico</h2>
      <form action="" method="POST">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre" required>
        </div>

        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input type="text" id="apellido" name="apellido" placeholder="Ingrese apellido" required>
        </div>

        <div class="form-group">
          <label for="especialidad">Especialidad</label>
          <input type="text" id="especialidad" name="especialidad" placeholder="Ej. Cardiología" required>
        </div>

        <div class="form-group">
          <label for="telefono">Teléfono</label>
          <input type="text" id="telefono" name="telefono" placeholder="Ej. +51 999 888 777" required>
        </div>

        <div class="form-group">
          <label for="email">Correo</label>
          <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
        </div>

        <div class="form-group">
          <label for="licencia">Licencia</label>
          <input type="text" id="licencia" name="licencia" placeholder="N° de licencia" required>
        </div>

        <div class="form-group">
          <label for="anios">Años de experiencia</label>
          <input type="number" id="anios" name="anios_experiencia" min="0" placeholder="Ej. 5" required>
        </div>

        <button type="submit" class="btn">Guardar</button>
      </form>
    </div>

    <!-- Lista -->
    <div class="list-card">
      <h2>Lista de Médicos</h2>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Especialidad</th>
            <th>Teléfono</th>
          </tr>
        </thead>
        <tbody>
          <!-- Aquí se cargarán dinámicamente -->
          <tr>
            <td>Juan Pérez</td>
            <td>Cardiología</td>
            <td>+51 987 654 321</td>
          </tr>
          <tr>
            <td>María López</td>
            <td>Pediatría</td>
            <td>+51 912 345 678</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
