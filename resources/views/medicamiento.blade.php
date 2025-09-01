<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medicamentos</title>
  <link rel="stylesheet" href="{{ asset('css/pacientes.css') }}">
</head>

<body>
  <div class="container">

    <!-- Lista de medicamentos -->
    <div class="list-card">
      <h2>Lista de Medicamentos</h2>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Dosis</th>
            <th>Frecuencia</th>
            <th>Duración</th>
            <th>ID Tratamiento</th>
            <th>Proveedor</th>
            <th>Efectos Secundarios</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($medications as $medication)
          <tr>
            <td>{{ $medication->name }}</td>
            <td>{{ $medication->dose }}</td>
            <td>{{ $medication->frequency }}</td>
            <td>{{ $medication->duration }}</td>
            <td>{{ $medication->treatment_id }}</td>
            <td>{{ $medication->supplier }}</td>
            <td>{{ $medication->side_affects }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</body>

</html>
