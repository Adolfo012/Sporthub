<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportHub Registro</title>
    <link rel="preload" href="{{ asset('css/styles.css') }}" as="style">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body class="form-body">
    <!-- <header>
        <nav class="nav">
            <a href="#"> Inicio </a>
            <a href="#"> Registro </a>
            <a href="#"> Redes </a>
            <a href="#"> Contacto </a>
        </nav>
    </heade> -->

    <section class="form-section">
        <div class="form-box"></div>
            <div class="form-value">
                <form action="/login.html">
                    <h1 class="login-h1"> Registro </h1>
                    
                    <div class="inputbox">
                        <input type="text" required>
                        <label for=""> Nombre(s) </label>
                    </div>
                    <div class="inputbox">
                        <input type="text" required>
                        <label for=""> Apellido Paterno </label>
                    </div>
                    <div class="inputbox">
                        <input type="text" required>
                        <label for=""> Apellido Materno </label>
                    </div>
                    <div class="inputbox">
                        <input type="text" required>
                        <label for=""> Apodo </label>
                    </div>
                    <div class="inputbox">
                        <input type="email" required>
                        <label for=""> Correo </label>
                    </div>
                    <div class="inputbox">
                        <input type="password" required>
                        <label for=""> Contraseña </label>
                    </div>
                    <div class="inputbox">
                        <input type="password" required>
                        <label for=""> Confirmar Contraseña </label>
                    </div>

                    <button class="login-button" type="submit"> Registrarse </button>
                    <a class="back-form" href="/login">volver</a>
                </form>
            </div>
    </section>
</body>
</html>