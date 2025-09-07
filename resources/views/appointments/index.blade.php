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

    <a href="{{ route('categorias') }}" class="btn-regresar">Regresar</a>

    <div class="form-card">
      <h2>Registrar Cita</h2>
      <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="date">Fecha de la Cita</label>
          <input type="datetime-local" id="date" name="date" required>
        </div>

        <div class="form-group">
          <label for="reason">Motivo</label>
          <input type="text" id="reason" name="reason" placeholder="Ingrese motivo de la cita" required>
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
          <label for="status">Estado</label>
          <select id="status" name="status" required>
            <option value="">Seleccione estado...</option>
            <option value="Pendiente">Pendiente</option>
            <option value="Confirmada">Confirmada</option>
            <option value="Cancelada">Cancelada</option>
            <option value="Finalizada">Finalizada</option>
          </select>
        </div>

        <div class="form-group">
          <label for="observations">Observaciones</label>
          <textarea id="observations" name="observations" placeholder="Ingrese observaciones" rows="3"></textarea>
        </div>

        <div class="form-group">
          <label for="room">Sala</label>
          <input type="text" id="room" name="room" placeholder="Ej. Sala 1" required>
        </div>

        <button type="submit" class="btn">Guardar</button>
      </form>
    </div>



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
            <th>Room</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($appointments as $appointment)
            <tr>
              <td>{{ $appointment->date }}</td>
              <td>{{ $appointment->reason }}</td>
              <td>{{ $appointment->patient_id }}</td>
              <td>{{ $appointment->doctor_id }}</td>
              <td>{{ $appointment->status }}</td>
              <td>{{ $appointment->observations }}</td>
              <td>{{ $appointment->room }}</td>
              <td>
                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn-action edit">Editar</a>

                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST"
                  style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-action delete"
                    onclick="return confirm('¿Seguro que quieres eliminar esta cita?')">
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
