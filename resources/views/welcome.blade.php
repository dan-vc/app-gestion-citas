<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Mitad Imagen -->
            <div class="login-image">
                <img src="{{ asset('img/logo.png') }}" alt="Imagen login">
            </div>

            <!-- Mitad Formulario -->
            <div class="login-form">
                <h1>BIENVENIDO</h1>
                <form action="#">
                    <input type="text" placeholder="Usuario" required>
                    <input type="password" placeholder="Contraseña" required>
                    <button type="submit">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>