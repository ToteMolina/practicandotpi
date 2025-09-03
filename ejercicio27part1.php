<?php

$numeros = [];
$contador = 0;

for ($i = 3; $i <= 23; $i++) {
    $numeros[$contador] = $i;
    $contador++;
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
    <?php
    
    if (count($numeros) % 2 == 0){
        echo "par";
    } else {
        ?><p>La mediana de 
            <? for ($i = 0; $i < count($numeros); $i++){
                if ($i == count($numeros)-1) {
                    echo $numeros[$i];
                } else {
                    echo $numeros[$i].", ";
                }
            } ?> es <?= $numeros[round(count($numeros)/2)-1]?></p><?
    }
    
    ?>
</body>
</html>