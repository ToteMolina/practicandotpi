<?php

$sumaPares = 0;
$sumaImpares = 0;

for($i = 1; $i <= 25; $i++){
    if($i % 2 == 0){
        $sumaPares += $i;
    }
}

for($i = 3; $i <= 18; $i++){
    if($i % 2 != 0){
        $sumaImpares += $i;
    }
}

$resultado = $sumaPares * $sumaImpares;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>La suma de los números pares entre el 1 y 25 es de: <?php echo $sumaPares; ?></h2>
    <h2>La suma de los números impares entre el 3 y 18 es de: <?php echo $sumaImpares; ?></h2>
    <p>La multiplicación entre ambos resultados es de: <?php echo $resultado; ?></p>
</body>
</html>