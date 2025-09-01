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
      <h2>Lista de Medicos</h2>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cumpleaños</th>
            <th>Genero</th>
            <th>Teléfono</th>
            <th>Direccion</th>
            <th>Fecha De vencimiento</th>
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
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</body>

</html>