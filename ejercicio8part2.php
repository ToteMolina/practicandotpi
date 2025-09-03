<?php

function validarUrl($url){
    if(filter_var($url, FILTER_VALIDATE_URL)){
        return "La url '$url' es válida";
    } else {
        return "La url '$url' no es válida";
    }
}

$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $url = $_POST["url"];
    $mensaje = validarUrl($url);
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
        <label for="url">Introducir URL</label>
        <input type="text" id="url" name="url" required>

        <button type="submit">Enviar</button>
    </form>

    <?php if(isset($mensaje)): ?>
        <p><?= $mensaje ?></p>
    <?php endif; ?>
</body>
</html>