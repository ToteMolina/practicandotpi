<?php

$nombre = '';
$apellido = '';
$ciudad = '';
$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $ciudad = $_POST["ciudad"];

    if (strpbrk($nombre, "0123456789") || strpbrk($apellido, "0123456789") || strpbrk($ciudad, "0123456789")){
        $mensaje = 'No se permite la entrada de números en los campos.';
    } else {
        $mensaje = 'Enviado';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="ciudad">Ciudad</label>
        <input type="text" id="ciudad" name="ciudad" required>

        <button type="submit">Enviar</button>
    </form>
    <?php if(isset($mensaje)):?>
        <p><?= $mensaje?></p>
    <?php endif;?>
</body>
</html>