<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tratamientos</title>
  <link rel="stylesheet" href="{{ asset('css/pacientes.css') }}">
</head>

<body>
  <div class="container">

    <!-- Lista de tratamientos -->
    <div class="list-card">
      <h2>Lista de Tratamientos</h2>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Duración</th>
            <th>ID Diagnóstico</th>
            <th>ID Médico</th>
            <th>Estado</th>
            <th>Frecuencia</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($treatments as $treatment)
          <tr>
            <td>{{ $treatment->name }}</td>
            <td>{{ $treatment->description }}</td>
            <td>{{ $treatment->duration }}</td>
            <td>{{ $treatment->diagnosis_id }}</td>
            <td>{{ $treatment->doctor_id }}</td>
            <td>{{ $treatment->status }}</td>
            <td>{{ $treatment->administration_frequency }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</body>

</html>
