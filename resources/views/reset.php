<html>
<head>
    <title>Restablecer contraseña</title>
</head>
<body>
    <h1>Restablecer contraseña</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('password.reset') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" value="{{ $request->email ?? old('email') }}" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="password_confirmation">Confirmar contraseña:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required><br>

        <button type="submit">Restablecer contraseña</button>
    </form>
</body>
</html>