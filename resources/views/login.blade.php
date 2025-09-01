<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <!-- Authentication failed, redirect back with error -->
    <!-- return redirect()->back()->withErrors(['Invalid credentials'])->withInput(); -->
    <!-- Mostramos el error -->
    @if ($errors->any())
    <div class="error-message">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="login-container">
        <div class="login-card">
            <!-- Mitad Imagen -->
            <div class="login-image">
                <img src="{{ asset('img/logo.png') }}" alt="Imagen login">
            </div>

            <!-- Mitad Formulario -->
            <div class="login-form">
                <h1>BIENVENIDO</h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="Usuario" name="username" required>
                    <input type="password" placeholder="Contraseña" name="password" required>
                    <button type="submit">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>