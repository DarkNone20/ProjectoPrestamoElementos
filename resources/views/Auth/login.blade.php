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

            <Div class="Group">
                <div class="Group-Uno">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
        
                       
                       
                            <img src="{{ asset('Imagenes/Logo.png') }}" alt="Logo">
                        
        
        
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
                
                <div class="Group-Dos">
                    <img src="{{ asset('Imagenes/Mascota.png') }}" alt="Mascota">
                </div>
            </Div>
            
            
        </div>
    </div>
</body>
</html>
