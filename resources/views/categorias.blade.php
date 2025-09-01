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
        <a href="patients">
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

        <a href="citas">
            <figure>
                <img src="{{ asset('img/citas.jpeg') }}" alt="Citas">
                <figcaption>Citas</figcaption>
            </figure>
        </a>

        <a href="diagnostico">
            <figure>
                <img src="{{ asset('img/diagnosticos.jpeg') }}" alt="Diagnosticos">
                <figcaption>Diagnosticos</figcaption>
            </figure>
        </a>

        <a href="tratamiento">
            <figure>
                <img src="{{ asset('img/tratamientos.jpeg') }}" alt="Tratamientos">
                <figcaption>Tratamientos</figcaption>
            </figure>
        </a>

        <a href="medicamentos">
            <figure>
                <img src="{{ asset('img/medicamentos.jpeg') }}" alt="Medicamentos">
                <figcaption>Medicamentos</figcaption>
            </figure>
        </a>

    </main>
</body>

</html>