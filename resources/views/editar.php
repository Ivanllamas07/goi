<!DOCTYPE html>
<html>
<head>
    <title>Editar perfil</title>
</head>
<body>
    <h1>Editar perfil</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('profile.update') }}" method="post">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required><br>

        <button type="submit">Actualizar perfil</button>
    </form>
</body>
</html>