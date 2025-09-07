<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Cita</title>
  <link rel="stylesheet" href="{{ asset('css/pacientes.css') }}">
</head>

<body>
  <div class="container">
    <!-- Formulario -->
    <div class="form-card">
      <h2>Editar Diagnóstico</h2>
      <form action="{{ route('diagnoses.update', $diagnose->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="description">Descripción</label>
          <textarea id="description" name="description" placeholder="Ingrese descripción del diagnóstico" rows="3" required>{{ $diagnose->description }}</textarea>
        </div>

        <div class="form-group">
          <label for="date">Fecha del Diagnóstico</label>
          <input type="datetime-local" id="date" name="date" value="{{ $diagnose->date }}" required>
        </div>

        <div class="form-group">
          <label for="patient_id">Paciente</label>
          <select id="patient_id" name="patient_id" required>
            <option value="">Seleccione paciente...</option>
            @foreach ($patients as $patient)
              <option value="{{ $patient->id }}" {{ $patient->id == $diagnose->patient_id ? 'selected' : '' }}>
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
              <option value="{{ $doctor->id }}" {{ $doctor->id == $diagnose->doctor_id ? 'selected' : '' }}>
                {{ $doctor->first_name }} {{ $doctor->last_name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="severity">Severidad</label>
          <select id="severity" name="severity" required>
            <option value="">Seleccione severidad...</option>
            <option value="Leve" {{ $diagnose->severity == 'Leve' ? 'selected' : '' }}>Leve</option>
            <option value="Moderada" {{ $diagnose->severity == 'Moderada' ? 'selected' : '' }}>Moderada</option>
            <option value="Grave" {{ $diagnose->severity == 'Grave' ? 'selected' : '' }}>Grave</option>
          </select>
        </div>

        <div class="form-group">
          <label for="recommendations">Recomendaciones</label>
          <textarea id="recommendations" name="recommendations" placeholder="Ingrese recomendaciones para el paciente"
            rows="3">{{ $diagnose->recommendations }}</textarea>
        </div>

        <div class="form-group">
          <label for="diagnosis_type">Tipo de Diagnóstico</label>
          <input type="text" id="diagnosis_type" name="diagnosis_type" placeholder="Ej. Clínico, Radiológico, etc."
            value="{{ $diagnose->diagnosis_type }}" required>
        </div>

        <button type="submit" class="btn">Actualizar</button>
      </form>

    </div>

  </div>
</body>

</html>
