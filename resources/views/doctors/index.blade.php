<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medicos</title>
  <link rel="stylesheet" href="{{ asset('css/pacientes.css') }}">
</head>

<body>
  <div class="container">

    <a href="{{ route('categorias') }}" class="btn-regresar">Regresar</a>

    <div class="form-card">
      <h2>Registrar Médicos</h2>
      <form action="{{ route('doctors.store') }}" method="POST">
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
          <label for="specialty">Especialidad</label>
          <input type="text" id="specialty" name="specialty" placeholder="Ej. Cardiología" required>
        </div>

        <div class="form-group">
          <label for="phone">Teléfono</label>
          <input type="text" id="phone" name="phone" placeholder="Ej. +51 999 888 777" required>
        </div>

        <div class="form-group">
          <label for="email">Correo Electrónico</label>
          <input type="email" id="email" name="email" placeholder="Ej. medico@ejemplo.com" required>
        </div>

        <div class="form-group">
          <label for="license">Número de Licencia</label>
          <input type="text" id="license" name="license" placeholder="Ingrese número de licencia" required>
        </div>

        <div class="form-group">
          <label for="years_experience">Años de Experiencia</label>
          <input type="number" id="years_experience" name="years_experience" min="0" placeholder="Ej. 5"
            required>
        </div>

        <button type="submit" class="btn">Guardar</button>
      </form>
    </div>


    <div class="list-card">
      <h2>Lista de Medicos</h2>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Especialidad</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>N° Licencia</th>
            <th>Años de Experiencia</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($doctors as $medicos)
            <tr>
              <td>{{ $medicos->first_name }}</td>
              <td>{{ $medicos->last_name }}</td>
              <td>{{ $medicos->specialty }}</td>
              <td>{{ $medicos->phone }}</td>
              <td>{{ $medicos->email }}</td>
              <td>{{ $medicos->license }}</td>
              <td>{{ $medicos->years_experience }}</td>
              <td>
                <a href="{{ route('doctors.edit', $medicos->id) }}" class="btn-action edit">Editar</a>

                <form action="{{ route('doctors.destroy', $medicos->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-action delete"
                    onclick="return confirm('¿Seguro que quieres eliminar este paciente?')">
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
