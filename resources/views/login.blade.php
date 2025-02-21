<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SearchBite</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #111, #222);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            border: 1px solid #333;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h1 {
            font-size: 24px;
            font-weight: bold;
            color: #f97316;
        }
        .login-container p {
            color: #bbb;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid #444;
            color: #fff;
        }
        .form-control::placeholder {
            color: #aaa;
        }
        .btn-primary {
            background: linear-gradient(to right, #f97316, #ef4444);
            border: none;
            padding: 12px;
        }
        .btn-primary:hover {
            opacity: 0.9;
        }
        .forgot-password {
            color: #ef4444;
            text-decoration: none;
            font-size: 14px;
        }
        .register-link {
            color: #f97316;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>SearchBite</h1>
        <p>Inicia sesión en tu cuenta</p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="nombre@ejemplo.com" required>
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label for="remember" class="form-check-label">Recordarme</label>
                </div>
                <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Iniciar Sesión →</button>
        </form>

        <p class="mt-3">¿No tienes una cuenta? <a href="{{ route('auth.register.view') }}" class="register-link">Regístrate aquí</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
