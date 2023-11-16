<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportHub Login</title>
    <link rel="preload" href="{{ asset('css/styles.css') }}" as="style">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body class="login-body">
    <!-- <header>
        <nav class="nav">
            <a href="#"> Inicio </a>
            <a href="#"> Registro </a>
            <a href="#"> Redes </a>
            <a href="#"> Contacto </a>
        </nav>
    </heade> -->
    <section class="login-section">
        <div class="form-box"></div>
            <div class="form-value">
                <form method="POST" action="#">
                    @csrf
                    <h1 class="login-h1"> Inicio </h1>
                    <div class="inputbox">
                        <ion-icon name="mail-outline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="44" height="44" viewBox="0 0 24" stroke-width="1.5" stroke="#ffae00" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                <path d="M3 7l9 6l9 -6" />
                            </svg>
                        </ion-icon>
                        <input name="email" type="email" required>
                        <label for=""> Usuario </label>
                        @error('email')  {{-- Checks if there has been an error in the "name" field --}}
                        <span>*{{$message}}</span> {{--print a message if there is an error--}}
                        <br>
                        @enderror
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="44" height="44" viewBox="0 0 24" stroke-width="1.5" stroke="#ffae00" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                                <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                            </svg>
                        </ion-icon>
                        <input name="password" type="password" required>
                        <label for=""> Contraseña </label>
                        @error('password')  {{-- Checks if there has been an error in the "name" field --}}
                        <span>*{{$message}}</span> {{--print a message if there is an error--}}
                        <br>
                        @enderror
                    </div>

                    <div class="forget">
                        <label for=""><input type="checkbox">Recordar</label>
                        <a href="#">Olvidé la Contraseña</a>
                    </div>
                    <button class="login-button" type="submit"> Iniciar Sesión </button>
                    <div class="register">
                        <p>No tengo una cuenta <a href="/register">Registrarse<br><br></a>
                        </p>
                    </div> 
                    <h4 class="credential-h4">
                        @if ($band)
                        >Sistema: Credenciales Incorrectas  
                        @endif
                    <h4> 
                    @if (Session::has('registro_exitoso'))
                           <div class="alert alert-success">
                                {{ Session::get('registro_exitoso') }}
                           </div>
                    @endif
                </form>
            </div>
    </section>
</body>
</html>