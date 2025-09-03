<?php

function validarEmail($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "El email '$email' es válido.";
    } else {
        return "El email '$email' no es válido";
    }
}

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $mensaje = validarEmail($email);
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
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Enviar</button>
    </form>

    <?php if ($mensaje):?>
        <p><?= $mensaje ?></p>
    <?php endif;?>
</body>
</html>