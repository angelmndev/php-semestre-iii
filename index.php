<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="recursos/css/login.css">
    <title>Login</title>
</head>
<body>
    
    <div class="contenedor">
        <div class="marco">
            <div class="logo">
                <img src="recursos/images/Logo.png" alt="">
            </div>
        </div>

        <div class="formulario">
            <h1>Iniciar sesion</h1>
            <form action="procesar.php" method="post">
                <input type="text" name="txt_usuario" placeholder="Usuario">
                <input type="password" name="txt_password" placeholder="Contraseña">
                <input type="submit" value="Iniciar sesion">
                <p class="recuperar-contraseña"> <a href="#">Olvide mi contraseña</a></p>
                <p class="registrarse"> <a href="#">Registrarse</a></p>
            </form>
        </div>


    </div>

</body>
</html>