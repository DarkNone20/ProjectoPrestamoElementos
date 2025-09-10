<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/style-login.css') }}">
</head>
<body>
    <div class="Formulario">
        <div class="group">

            @if($errors->any())
                <div class="error-message" style="color: red; margin-bottom: 15px;">
                    {{ $errors->first('loginError') }}
                </div>
            @endif

            <div class="Group">
                <div class="Group-Uno">
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf

                        <img src="{{ asset('Imagenes/Logo.png') }}" alt="Logo" class="logo">

                        <div class="form-group input-icon">
                            <label for="Cedula" class="sr-only">Usuario</label>
                            <input 
                                type="text" 
                                name="Cedula" 
                                id="Cedula" 
                                value="{{ old('Cedula') }}" 
                                placeholder="Usuario" 
                                required 
                                autofocus
                                autocomplete="username"
                            >
                            <img src="{{ asset('Imagenes/user.png') }}" alt="icono usuario">
                        </div>

                        <div class="form-group input-icon">
                            <label for="Password" class="sr-only">Contraseña</label>
                            <input 
                                type="Password" 
                                name="Password" 
                                id="Password" 
                                placeholder="Contraseña" 
                                required
                                autocomplete="current-password"
                            >
                            <img src="{{ asset('Imagenes/mail.png') }}" alt="icono candado">
                        </div>

                        <div class="form-actions">
                            <button type="submit">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
                
                <div class="Group-Dos">
                    <img src="{{ asset('Imagenes/Mascota.png') }}" alt="Mascota">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
