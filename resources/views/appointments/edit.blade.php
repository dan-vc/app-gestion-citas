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
      <h2>Editar Cita</h2>
      <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="date">Fecha de la Cita</label>
          <input type="datetime-local" id="date" name="date" value="{{ $appointment->date }}" required>
        </div>

        <div class="form-group">
          <label for="reason">Motivo</label>
          <input type="text" id="reason" name="reason" placeholder="Ingrese motivo de la cita" value="{{ $appointment->reason }}" required>
        </div>

        <div class="form-group">
          <label for="patient_id">Paciente</label>
          <select id="patient_id" name="patient_id" required>
            <option value="">Seleccione paciente...</option>
            @foreach($patients as $patient)
              <option value="{{ $patient->id }}" {{ $patient->id == $appointment->patient_id ? 'selected' : '' }}>
                {{ $patient->first_name }} {{ $patient->last_name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="doctor_id">Doctor</label>
          <select id="doctor_id" name="doctor_id" required>
            <option value="">Seleccione doctor...</option>
            @foreach($doctors as $doctor)
              <option value="{{ $doctor->id }}" {{ $doctor->id == $appointment->doctor_id ? 'selected' : '' }}>
                {{ $doctor->first_name }} {{ $doctor->last_name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="status">Estado</label>
          <select id="status" name="status" required>
            <option value="">Seleccione estado...</option>
            <option value="Pendiente" {{ $appointment->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="Confirmada" {{ $appointment->status == 'Confirmada' ? 'selected' : '' }}>Confirmada</option>
            <option value="Cancelada" {{ $appointment->status == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
            <option value="Finalizada" {{ $appointment->status == 'Finalizada' ? 'selected' : '' }}>Finalizada</option>
          </select>
        </div>

        <div class="form-group">
          <label for="observations">Observaciones</label>
          <textarea id="observations" name="observations" placeholder="Ingrese observaciones" rows="3">{{ $appointment->observations }}</textarea>
        </div>

        <div class="form-group">
          <label for="room">Sala</label>
          <input type="text" id="room" name="room" placeholder="Ej. Sala 1" value="{{ $appointment->room }}" required>
        </div>

        <button type="submit" class="btn">Guardar</button>
      </form>

    </div>

  </div>
</body>

</html>