<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Formulario de Inicio de sesión</h1>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Iniciar sesión</button>
        </div>
    </form>

    <p>¿No tienes cuenta? <a href="{{ route('register') }}">Registrarse</a></p>
</body>
</html>
