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
    <!-- Formulario -->
    <div class="form-card">
      <h2>Registrar Paciente</h2>
      <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- IMPORTANTE para que sea un update -->

        <div class="form-group">
          <label for="first_name">Nombre</label>
          <input type="text" id="first_name" name="first_name"
            value="{{ old('first_name', $patient->first_name) }}" required>
        </div>

        <div class="form-group">
          <label for="last_name">Apellido</label>
          <input type="text" id="last_name" name="last_name"
            value="{{ old('last_name', $patient->last_name) }}" required>
        </div>

        <div class="form-group">
          <label for="birth_date">Fecha de Nacimiento</label>
          <input type="date" id="birth_date" name="birth_date"
            value="{{ old('birth_date', $patient->birth_date) }}" required>
        </div>

        <div class="form-group">
          <label for="gender">Género</label>
          <select id="gender" name="gender" required>
            <option value="">Seleccione...</option>
            <option value="Masculino" {{ old('gender', $patient->gender) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Femenino" {{ old('gender', $patient->gender) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
            <option value="Otro" {{ old('gender', $patient->gender) == 'Otro' ? 'selected' : '' }}>Otro</option>
          </select>
        </div>

        <div class="form-group">
          <label for="phone">Teléfono</label>
          <input type="text" id="phone" name="phone"
            value="{{ old('phone', $patient->phone) }}" required>
        </div>

        <div class="form-group">
          <label for="address">Dirección</label>
          <input type="text" id="address" name="address"
            value="{{ old('address', $patient->address) }}" required>
        </div>

        <div class="form-group">
          <label for="blood_type">Tipo de Sangre</label>
          <input type="text" id="blood_type" name="blood_type"
            value="{{ old('blood_type', $patient->blood_type) }}" required>
        </div>

        <button type="submit" class="btn">Actualizar</button>
      </form>

    </div>

  </div>
</body>

</html>