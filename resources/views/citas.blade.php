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

    <div class="list-card">
      <h2>Lista de Citas</h2>
      <table>
        <thead>
          <tr>
            <th>Date</th>
            <th>Reson</th>
            <th>Patient ID</th>
            <th>Doctor ID</th>
            <th>Status</th>
            <th>Observation</th>
            <th>Rom</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($diagnoses as $diagnostico)
          <tr>
            <td>{{ $citas->date }}</td>
            <td>{{ $citas->reason }}</td>
            <td>{{ $citas->patient_id }}</td>
            <td>{{ $citas->doctor_id }}</td>
            <td>{{ $citas->status }}</td>
            <td>{{ $citas->observations }}</td>
            <td>{{ $citas->room }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</body>

</html>