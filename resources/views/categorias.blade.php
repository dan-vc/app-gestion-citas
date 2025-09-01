<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="{{ asset('css/categorias.css') }}">
</head>

<body>
    <main>
        <a href="pacientes">
            <figure>
                <img src="{{ asset('img/pacientes.jpeg') }}" alt="Pacientes">
                <figcaption>Pacientes</figcaption>
            </figure>
        </a>
        
        <a href="medicos">
            <figure>
                <img src="{{ asset('img/medicos.jpeg') }}" alt="Medicos">
                <figcaption>Medicos</figcaption>
            </figure>
        </a>
        <figure>
            <img src="{{ asset('img/citas.jpeg') }}" alt="Citas">
            <figcaption>Citas</figcaption>
        </figure>
        <figure>
            <img src="{{ asset('img/diagnosticos.jpeg') }}" alt="Diagnosticos">
            <figcaption>Diagnosticos</figcaption>
        </figure>
        <figure>
            <img src="{{ asset('img/tratamientos.jpeg') }}" alt="Tratamientos">
            <figcaption>Tratamientos</figcaption>
        </figure>
        <figure>
            <img src="{{ asset('img/medicamentos.jpeg') }}" alt="Medicamentos">
            <figcaption>Medicamentos</figcaption>
        </figure>
    </main>
</body>

</html>