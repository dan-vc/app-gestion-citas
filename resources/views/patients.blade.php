<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pacientes</title>
  <link rel="stylesheet" href="{{ asset('css/pacientes.css') }}">
</head>

<body>
  <div class="container">
    <!-- Formulario -->
    <div class="form-card">
      <h2>Registrar Paciente</h2>
      <form action="{{ route('patient.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="first_name">Nombre</label>
          <input type="text" id="first_name" name="first_name" placeholder="Ingrese nombre" required>
        </div>

        <div class="form-group">
          <label for="last_name">Apellido</label>
          <input type="text" id="last_name" name="last_name" placeholder="Ingrese apellido" required>
        </div>

        <div class="form-group">
          <label for="birth_date">Fecha de Nacimiento</label>
          <input type="date" id="birth_date" name="birth_date" required>
        </div>

        <div class="form-group">
          <label for="gender">Género</label>
          <select id="gender" name="gender" required>
            <option value="">Seleccione...</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
          </select>
        </div>

        <div class="form-group">
          <label for="phone">Teléfono</label>
          <input type="text" id="phone" name="phone" placeholder="Ej. +51 999 888 777" required>
        </div>

        <div class="form-group">
          <label for="address">Dirección</label>
          <input type="text" id="address" name="address" placeholder="Ingrese dirección" required>
        </div>

        <div class="form-group">
          <label for="blood_type">Tipo de Sangre</label>
          <input type="text" id="blood_type" name="blood_type" placeholder="Ej. O+" required>
        </div>

        <button type="submit" class="btn">Guardar</button>
      </form>
    </div>

    <!-- Lista -->
    <div class="list-card">
      <h2>Lista de Pacientes</h2>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cumpleaños</th>
            <th>Genero</th>
            <th>Teléfono</th>
            <th>Direccion</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($patients as $paciente)
          <tr>
            <td>{{ $paciente->first_name }}</td>
            <td>{{ $paciente->last_name }}</td>
            <td>{{ $paciente->birth_date }}</td>
            <td>{{ $paciente->gender }}</td>
            <td>{{ $paciente->phone }}</td>
            <td>{{ $paciente->address }}</td>

            <td>
              <a href="{{ route('patient.show', $paciente->id) }}" class="btn-action edit">Editar</a>

              <form action="{{ route('patient.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-action delete" onclick="return confirm('¿Seguro que quieres eliminar este paciente?')">
                  Eliminar
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</body>

</html>