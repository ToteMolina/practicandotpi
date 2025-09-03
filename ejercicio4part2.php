<?php

$telefono = '';
$codigo_postal = '';
$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $telefono = $_POST["telefono"];
    $codigo_postal = $_POST["codigo_postal"];

    if (strlen($telefono) > 9){
        $mensaje = "No se permiten más de 9 números";
    } elseif(strlen($codigo_postal) != 5){
        $mensaje = "Sólo se permiten 5 números en el código postal";
    } elseif (ctype_digit($telefono) && ctype_digit($codigo_postal)){
        $mensaje = "Enviado";
    } else {
        $mensaje = "No se permiten letras en los campos";
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
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" name="telefono" required>

        <label for="codigo_postal">Código postal</label>
        <input type="text" id="codigo_postal" name="codigo_postal" required>

        <button type="submit">Enviar</button>
    </form>

    <?php if(isset($mensaje)): ?>
        <p><?= $mensaje ?></p>
    <?php endif; ?>
</body>
</html>