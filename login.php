<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css"></link>
    <title>Login</title>
</head>
<body>
    <?php
        include('includes/conexion.inc.php');
        session_start();
        if(isset($_GET['mesagge'])){
        ?>
        <div class="login-page">
            <form method="POST" action="functions/verificar.php">
                <div class="imgcontainer">
                    <img class="avatar" src="img/avatar.jpg" alt="alt">
                </div>

                <div class="container">
                    <p style="color:red; text-align:center">Usuario y/o contraseña incorrecto</p>
                    <label for="username"><b>Username</b></label>
                    <input type="text" name="username">

                    <label for="contrasena"><b>Contraseña</b></label>
                    <input type="password" placeholder="*****" name="contrasena">
                    <label for="rol"><b>Rol</b></label>
                    <select name="rol">
                    <option value="">Elige una opción</option>
                    <option value="e">Estudiante</option>
                    <option value="d">Docente</option>
                    <option value="a">Administrador</option>
                    </select>
                    <button type="submit">Ingresar</button>
                </div>
            </form>
        </div>
        <?php
        }else{
        ?>
        <div class="login-page">
            <form method="POST" action="functions/verificar.php">
                <div class="imgcontainer">
                    <img class="avatar" src="img/avatar.jpg" alt="alt">
                </div>
                <div class="container">
                    <label for="username"><b>Username</b></label>
                    <input type="text" name="username">

                    <label for="contrasena"><b>Contraseña</b></label>
                    <input type="password" placeholder="*****" name="contrasena">
                    <label for="rol"><b>Rol</b></label>
                    <select name="rol">
                    <option value="">Elige una opción</option>
                    <option value="e">Estudiante</option>
                    <option value="d">Docente</option>
                    <option value="a">Administrador</option>
                    </select>
                    <button type="submit">Ingresar</button>
                </div>
            </form>
        </div>
    <?php
        }
    ?>
    </body>
</html>