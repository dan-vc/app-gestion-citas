<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Medicamento</title>
  <link rel="stylesheet" href="{{ asset('css/pacientes.css') }}">
</head>

<body>
  <div class="container">
    <!-- Formulario -->
    <div class="form-card">
      <h2>Editar Medicamento</h2>
      <form action="{{ route('medications.update', $medication->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="name">Nombre del Medicamento</label>
          <input type="text" id="name" name="name" placeholder="Ingrese nombre del medicamento" required value="{{ $medication->name }}">
        </div>

        <div class="form-group">
          <label for="dose">Dosis</label>
          <input type="text" id="dose" name="dose" placeholder="Ej. 500 mg" required value="{{ $medication->dose }}">
        </div>

        <div class="form-group">
          <label for="frequency">Frecuencia</label>
          <input type="text" id="frequency" name="frequency" placeholder="Ej. cada 8 horas" required value="{{ $medication->frequency }}">
        </div>

        <div class="form-group">
          <label for="duration">Duración</label>
          <input type="text" id="duration" name="duration" placeholder="Ej. 7 días" required value="{{ $medication->duration }}">
        </div>

        <div class="form-group">
          <label for="treatment_id">Tratamiento</label>
          <select id="treatment_id" name="treatment_id" required>
            <option value="">Seleccione tratamiento...</option>
            @foreach ($treatments as $treatment)
              <option value="{{ $treatment->id }}" {{ $treatment->id == $medication->treatment_id ? 'selected' : '' }}>
                {{ $treatment->name }} - {{ $treatment->description }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="supplier">Proveedor</label>
          <input type="text" id="supplier" name="supplier" placeholder="Ingrese proveedor" required value="{{ $medication->supplier }}">
        </div>

        <div class="form-group">
          <label for="side_effects">Efectos Secundarios</label>
          <textarea id="side_effects" name="side_effects" placeholder="Ingrese posibles efectos secundarios" rows="3">{{ $medication->side_effects }}</textarea>
        </div>

        <button type="submit" class="btn">Actualizar</button>
      </form>

    </div>

  </div>
</body>

</html>
