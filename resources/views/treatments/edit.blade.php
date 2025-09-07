<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tratamiento</title>
  <link rel="stylesheet" href="{{ asset('css/pacientes.css') }}">
</head>

<body>
  <div class="container">
    <!-- Formulario -->
    <div class="form-card">
      <h2>Editar Tratamiento</h2>
      <form action="{{ route('treatments.update', $treatment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="name">Nombre del Tratamiento</label>
          <input type="text" id="name" name="name" placeholder="Ingrese nombre del tratamiento" required value="{{ $treatment->name }}">
        </div>

        <div class="form-group">
          <label for="description">Descripción</label>
          <textarea id="description" name="description" placeholder="Ingrese descripción del tratamiento" rows="3" required>{{ $treatment->description }}</textarea>
        </div>

        <div class="form-group">
          <label for="duration">Duración</label>
          <input type="text" id="duration" name="duration" placeholder="Ej. 2 semanas, 1 mes" required value="{{ $treatment->duration }}">
        </div>

        <div class="form-group">
          <label for="diagnosis_id">Diagnóstico</label>
          <select id="diagnosis_id" name="diagnosis_id" required>
            <option value="">Seleccione diagnóstico...</option>
            @foreach ($diagnoses as $diagnosis)
              <option value="{{ $diagnosis->id }}" {{ $diagnosis->id == $treatment->diagnosis_id ? 'selected' : '' }}>
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
              <option value="{{ $doctor->id }}" {{ $doctor->id == $treatment->doctor_id ? 'selected' : '' }}>
                {{ $doctor->first_name }} {{ $doctor->last_name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="status">Estado</label>
          <select id="status" name="status" required>
            <option value="">Seleccione estado...</option>
            <option value="Activo" {{ $treatment->status == 'Activo' ? 'selected' : '' }}>Activo</option>
            <option value="Finalizado" {{ $treatment->status == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
            <option value="Suspendido" {{ $treatment->status == 'Suspendido' ? 'selected' : '' }}>Suspendido</option>
          </select>
        </div>

        <div class="form-group">
          <label for="administration_frequency">Frecuencia de Administración</label>
          <input type="text" id="administration_frequency" name="administration_frequency"
            placeholder="Ej. 1 vez al día, cada 8 horas" required value="{{ $treatment->administration_frequency }}">
        </div>

        <button type="submit" class="btn">Actualizar</button>
      </form>

    </div>

  </div>
</body>

</html>
