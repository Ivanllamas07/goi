<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido a nuestra aplicación</h1>

    @if (Auth::check())
        <p>¡Hola, {{ Auth::user()->name }}!</p>
        <p><a href="/profile">Editar perfil</a></p>
        <form action="/logout" method="post">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    @else
        <p>Por favor, regístrate para continuar:</p>



        <h2>Registrarse</h2>
        <form action="/register" method="post">
            @csrf
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="password_confirmation">Confirmar contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required><br>

            <button type="submit">Registrarse</button>
        </form>
         <a href="/login.php" type="submit">Ya tengo una cuenta</button>
    @endif
</body>
</html>