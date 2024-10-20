<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
</head>
<body>
    @if ($errors->any())
        <div>
            <strong>Erro!</strong> Verifique os problemas abaixo:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirmar Senha:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div>
            <button type="submit">Registrar</button>
        </div>
    </form>
</body>
</html>
