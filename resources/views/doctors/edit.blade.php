<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Médico</title>
  <link rel="stylesheet" href="{{ asset('css/pacientes.css') }}">
</head>

<body>
  <div class="container">
    <!-- Formulario -->
    <div class="form-card">
      <h2>Editar Médico</h2>
      <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="first_name">Nombre</label>
          <input type="text" id="first_name" name="first_name" placeholder="Ingrese nombre" value="{{ $doctor->first_name }}" required>
        </div>

        <div class="form-group">
          <label for="last_name">Apellido</label>
          <input type="text" id="last_name" name="last_name" placeholder="Ingrese apellido" value="{{ $doctor->last_name }}" required>
        </div>

        <div class="form-group">
          <label for="specialty">Especialidad</label>
          <input type="text" id="specialty" name="specialty" placeholder="Ej. Cardiología" value="{{ $doctor->specialty }}" required>
        </div>

        <div class="form-group">
          <label for="phone">Teléfono</label>
          <input type="text" id="phone" name="phone" placeholder="Ej. +51 999 888 777" value="{{ $doctor->phone }}" required>
        </div>

        <div class="form-group">
          <label for="email">Correo Electrónico</label>
          <input type="email" id="email" name="email" placeholder="Ej. medico@ejemplo.com" value="{{ $doctor->email }}" required>
        </div>

        <div class="form-group">
          <label for="license">Número de Licencia</label>
          <input type="text" id="license" name="license" placeholder="Ingrese número de licencia" value="{{ $doctor->license }}" required>
        </div>

        <div class="form-group">
          <label for="years_experience">Años de Experiencia</label>
          <input type="number" id="years_experience" name="years_experience" min="0" placeholder="Ej. 5" value="{{ $doctor->years_experience }}" required>
        </div>

        <button type="submit" class="btn">Actualizar</button>
      </form>

    </div>

  </div>
</body>

</html>