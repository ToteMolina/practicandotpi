<?php

function validarPassword($password){
    $errores = [];

    if (strlen($password) < 8 || strlen($password) > 16) {
        $errores[] = "La contraseña debe de tener entre 8 y 16 caracteres.";
    } elseif (!preg_match('/[0-9]/', $password)){
        $errores[] = 'La contraseña debe tener al menos un número.';
    } elseif (!preg_match('/[A-Z]/', $password)){
        $errores[] = 'La contraseña debe tener al menos una letra mayúscula.';
    } elseif (!preg_match('/[a-z]/', $password)){
        $errores[] = 'La contraseña debe tener al menos una letra mayúscula.';
    } elseif (!preg_match('/[\W_]/', $password)){
        $errores[] = 'La contraseña debe de tener al menos un caracter especial.';
    }

    if (empty($errores)){
        return "Contraseña válida";
    } else {
        return implode("<br>", $errores);
    }
}

$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $password = $_POST["contrasena"];
    $mensaje = validarPassword($password);
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
    <form method="post">
        <label for="contrasena">Contraseña</label>
        <input type="password" id="contrasena" name="contrasena" required>

        <button type="submit">Enviar</button>
    </form>

    <?php if(isset($mensaje)):?>
        <p><?= $mensaje ?></p>
    <?php endif; ?>
</body>
</html>