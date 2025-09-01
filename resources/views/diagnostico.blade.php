<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diagnósticos</title>
  <link rel="stylesheet" href="{{ asset('css/pacientes.css') }}">
</head>

<body>
  <div class="container">

    <div class="list-card">
      <h2>Lista de Diagnósticos</h2>
      <table>
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Paciente</th>
            <th>Doctor</th>
            <th>Severidad</th>
            <th>Recomendaciones</th>
            <th>Tipo</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($diagnoses as $diagnostico)
          <tr>
            <td>{{ $diagnostico->date }}</td>
            <td>{{ $diagnostico->description }}</td>
            <td>{{ $diagnostico->patient_id }}</td>
            <td>{{ $diagnostico->doctor_id }}</td>
            <td>{{ $diagnostico->severity }}</td>
            <td>{{ $diagnostico->recommendations }}</td>
            <td>{{ $diagnostico->diagnosis_type }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</body>

</html>
