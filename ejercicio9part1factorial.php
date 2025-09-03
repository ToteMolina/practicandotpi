<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $numero = (int) $_POST["numero"];
    $resultado = 1;

    if ($numero < 0){
        echo "<p>No se puede calcular el factorial de un número negativo.</p>";
    } elseif ($numero > 20){
        echo "<p>Número demasiado grande. Usa máximo 20.</p>";
    } else {
        $i = $numero;

        do {
            if ($i > 0){
                $resultado *= $i;
            }
            $i--;
        } while($i > 0);

        echo "<p>El factorial de $numero es: $resultado</p>";
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
    <h2>Calcular factorial</h2>

    <form method="POST">
        <label for="numero">Ingrese un número:</label>
        <input type="number" name="numero" id="numero" required>

        <button type="submit">Calcular</button>
    </form>
</body>
</html>