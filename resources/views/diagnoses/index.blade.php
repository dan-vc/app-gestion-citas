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

    <a href="{{ route('categorias') }}" class="btn-regresar">Regresar</a>

    <div class="form-card">
      <h2>Registrar Diagnóstico</h2>
      <form action="{{ route('diagnoses.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="description">Descripción</label>
          <textarea id="description" name="description" placeholder="Ingrese descripción del diagnóstico" rows="3" required></textarea>
        </div>

        <div class="form-group">
          <label for="date">Fecha del Diagnóstico</label>
          <input type="datetime-local" id="date" name="date" required>
        </div>

        <div class="form-group">
          <label for="patient_id">Paciente</label>
          <select id="patient_id" name="patient_id" required>
            <option value="">Seleccione paciente...</option>
            @foreach ($patients as $patient)
              <option value="{{ $patient->id }}">
                {{ $patient->first_name }} {{ $patient->last_name }}
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
          <label for="severity">Severidad</label>
          <select id="severity" name="severity" required>
            <option value="">Seleccione severidad...</option>
            <option value="Leve">Leve</option>
            <option value="Moderada">Moderada</option>
            <option value="Grave">Grave</option>
          </select>
        </div>

        <div class="form-group">
          <label for="recommendations">Recomendaciones</label>
          <textarea id="recommendations" name="recommendations" placeholder="Ingrese recomendaciones para el paciente"
            rows="3"></textarea>
        </div>

        <div class="form-group">
          <label for="diagnosis_type">Tipo de Diagnóstico</label>
          <input type="text" id="diagnosis_type" name="diagnosis_type" placeholder="Ej. Clínico, Radiológico, etc."
            required>
        </div>

        <button type="submit" class="btn">Guardar</button>
      </form>

    </div>

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
            <th>Acciones</th>
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
              <td>
                <a href="{{ route('diagnoses.edit', $diagnostico->id) }}" class="btn-action edit">Editar</a>

                <form action="{{ route('diagnoses.destroy', $diagnostico->id) }}" method="POST"
                  style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-action delete"
                    onclick="return confirm('¿Seguro que quieres eliminar este diagnóstico?')">
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
