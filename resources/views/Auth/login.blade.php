<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Sistema</title>
   
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style-login.css') }}">
</head>
<body>
    <main class="login-wrapper">
        <div class="login-card">
            
            
            <section class="form-container">
                <header class="brand">
                    <img src="{{ asset('Imagenes/Logo.png') }}" alt="Logo" class="logo">
                    <h1>Bienvenido de nuevo</h1>
                    <p>Por favor, ingresa tus credenciales para acceder.</p>
                </header>

                @if($errors->any())
                    <div class="error-toast">
                        <span class="error-icon">!</span>
                        {{ $errors->first('loginError') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="login-form">
                    @csrf

                    <div class="input-group">
                        <label for="Cedula">Cédula / Usuario</label>
                        <div class="input-wrapper">
                            <img src="{{ asset('Imagenes/user.png') }}" class="field-icon" alt="">
                            <input 
                                type="text" 
                                name="Cedula" 
                                id="Cedula" 
                                value="{{ old('Cedula') }}" 
                                placeholder="Ingresa tu usuario" 
                                required 
                                autofocus
                            >
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="Password">Contraseña</label>
                        <div class="input-wrapper">
                            <img src="{{ asset('Imagenes/mail.png') }}" class="field-icon" alt="">
                            <input 
                                type="password" 
                                name="Password" 
                                id="Password" 
                                placeholder="••••••••" 
                                required
                            >
                        </div>
                    </div>

                    <button type="submit" class="btn-primary">
                        <span>Iniciar Sesión</span>
                        <svg class="arrow-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </button>
                </form>
            </section>

           
            <section class="visual-container">
                <div class="floating-mascot">
                    <img src="{{ asset('Imagenes/Circuito 5.png') }}" alt="Circuito">
                </div>
                <div class="visual-bg-decoration"></div>
            </section>

        </div>
    </main>
</body>
</html>