<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/prueba.css') }}">
</head>
<body>
    <div class="Formulario">
        <div class="group">
            
            {{-- Mensajes de error --}}
            @if($errors->any())
                <div class="error-message" style="color: red; margin-bottom: 15px;">
                    {{ $errors->first('loginError') }}
                </div>
            @endif

            {{-- Formulario de Login --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="LogoI">
                    <img src="{{ asset('Imagenes/Logo.jpg') }}" alt="Logo">
                </div>

                <div class="form-group">
                    <label for="DocumentoId" class="sr-only">Usuario</label>
                    <input 
                        type="text" 
                        name="DocumentoId" 
                        id="DocumentoId" 
                        class="control" 
                        value="{{ old('DocumentoId') }}" 
                        placeholder="Usuario" 
                        required 
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password" class="sr-only">Contraseña</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="control" 
                        placeholder="Contraseña" 
                        required
                    >
                </div>

                <div class="form-actions">
                    <button type="submit">Iniciar sesión</button>
                </div>
            </form>
            
        </div>
    </div>
</body>
</html>
