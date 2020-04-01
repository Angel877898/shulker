<?php
include_once 'driveFunctions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/index.css" media="all">
    <title>Shulker Box</title>
</head>
<body>
<h1>Carpeta</h1>
    <nav id="menu">
        <ul>
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <li>
                <a href="carpeta.php"><b>Mi Carpeta</b></a>
            </li>
            <li>
                <a href="configuracion.php">Configuracion</a>
            </li>
            <li>
                <a href="login.php">Cerrar Sesión</a>
            </li>
        </ul>
	</nav>
    <div id=cuerpo>
        <div class="descripcion">
                <label for="carpeta">Mi carpeta</label>
        </div>
        <form action="subir.php" method="post" enctype="multipart/form-data">
            <input type="file" webkitdirectory directory multiple id="carpeta[]" name="carpeta[]"/>
            <input type="submit" value="enviar">
        </form>
    </div>
</body>
</html>