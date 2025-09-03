<?php

if (isset($_POST["calcular"])){
    $suma = 0;

    for ($i = 1; $i <= 10; $i++){
        $suma += 7 * $i;
    }

    $factorial = 1;
    for($i=1; $i <= 7; $i++){
        $factorial *= $i;
    }

    $resultado = $suma / $factorial;
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
    <h1>Ejercicio: suma de la tabla del 7 dividida entre 7!</h1>

    <form method="POST">
        <button type="submit" name="calcular">Calcular</button>
    </form>

    <?php if (isset($resultado)): ?>
        <h2>La suma de la tabla del 7 es: <?php echo $suma; ?></h2>
        <h2>El factorial de 7 es: <?php echo $factorial; ?></h2>
        <p>Al dividir la suma de la tabla del 7 con el factorial de 7 es: <?php echo $resultado; ?></p>
    <?php endif; ?>
    </body>
</html>