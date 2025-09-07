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

    <a href="{{ route('categorias') }}" class="btn-regresar">Regresar</a>

    <div class="form-card">
      <h2>Registrar Medicamento</h2>
      <form action="{{ route('medications.store') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="name">Nombre del Medicamento</label>
          <input type="text" id="name" name="name" placeholder="Ingrese nombre del medicamento" required>
        </div>

        <div class="form-group">
          <label for="dose">Dosis</label>
          <input type="text" id="dose" name="dose" placeholder="Ej. 500 mg" required>
        </div>

        <div class="form-group">
          <label for="frequency">Frecuencia</label>
          <input type="text" id="frequency" name="frequency" placeholder="Ej. cada 8 horas" required>
        </div>

        <div class="form-group">
          <label for="duration">Duración</label>
          <input type="text" id="duration" name="duration" placeholder="Ej. 7 días" required>
        </div>

        <div class="form-group">
          <label for="treatment_id">Tratamiento</label>
          <select id="treatment_id" name="treatment_id" required>
            <option value="">Seleccione tratamiento...</option>
            @foreach ($treatments as $treatment)
              <option value="{{ $treatment->id }}">
                {{ $treatment->name }} - {{ $treatment->description }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="supplier">Proveedor</label>
          <input type="text" id="supplier" name="supplier" placeholder="Ingrese proveedor" required>
        </div>

        <div class="form-group">
          <label for="side_effects">Efectos Secundarios</label>
          <textarea id="side_effects" name="side_effects" placeholder="Ingrese posibles efectos secundarios" rows="3"></textarea>
        </div>

        <button type="submit" class="btn">Guardar</button>
      </form>

    </div>

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
            <th>Acciones</th>
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
              <td>{{ $medication->side_effects }}</td>
              <td>
                <a href="{{ route('medications.edit', $medication->id) }}" class="btn-action edit">Editar</a>

                <form action="{{ route('medications.destroy', $medication->id) }}" method="POST"
                  style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-action delete"
                    onclick="return confirm('¿Seguro que quieres eliminar este medicamento?')">
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
