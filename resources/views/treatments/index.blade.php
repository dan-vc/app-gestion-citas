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

    <a href="{{ route('categorias') }}" class="btn-regresar">Regresar</a>

    <div class="form-card">
      <h2>Registrar Tratamiento</h2>
      <form action="{{ route('treatments.store') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="name">Nombre del Tratamiento</label>
          <input type="text" id="name" name="name" placeholder="Ingrese nombre del tratamiento" required>
        </div>

        <div class="form-group">
          <label for="description">Descripción</label>
          <textarea id="description" name="description" placeholder="Ingrese descripción del tratamiento" rows="3" required></textarea>
        </div>

        <div class="form-group">
          <label for="duration">Duración</label>
          <input type="text" id="duration" name="duration" placeholder="Ej. 2 semanas, 1 mes" required>
        </div>

        <div class="form-group">
          <label for="diagnosis_id">Diagnóstico</label>
          <select id="diagnosis_id" name="diagnosis_id" required>
            <option value="">Seleccione diagnóstico...</option>
            @foreach ($diagnoses as $diagnosis)
              <option value="{{ $diagnosis->id }}">
                {{ $diagnosis->description }} - {{ $diagnosis->date }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="doctor_id">Doctor</label>
          <select id="doctor_id" name="doctor_id" required>
            <option value="">Seleccione doctor...</option>
            @foreach ($doctors as $doctor)
              <option value="{{ $doctor->id }}">
                {{ $doctor->first_name }} {{ $doctor->last_name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="status">Estado</label>
          <select id="status" name="status" required>
            <option value="">Seleccione estado...</option>
            <option value="Activo">Activo</option>
            <option value="Finalizado">Finalizado</option>
            <option value="Suspendido">Suspendido</option>
          </select>
        </div>

        <div class="form-group">
          <label for="administration_frequency">Frecuencia de Administración</label>
          <input type="text" id="administration_frequency" name="administration_frequency"
            placeholder="Ej. 1 vez al día, cada 8 horas" required>
        </div>

        <button type="submit" class="btn">Guardar</button>
      </form>

    </div>

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
            <th>Acciones</th>
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
              <td>
                <a href="{{ route('treatments.edit', $treatment->id) }}" class="btn-action edit">Editar</a>

                <form action="{{ route('treatments.destroy', $treatment->id) }}" method="POST"
                  style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-action delete"
                    onclick="return confirm('¿Seguro que quieres eliminar este tratamiento?')">
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
