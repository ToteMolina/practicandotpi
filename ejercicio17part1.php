<?php

$suma = 0;
$factorial = 1;

for ($i = 7; $i <= 57; $i++){
    if ($i % 7 == 0){
        $suma += $i;
    }
}

for ($i = 1; $i <= $suma; $i++){
    $factorial *= $i;
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
    if ($suma % 2 == 0){
        ?><p>El número <?= $suma; ?> es par</p><?
    } else {
        ?><p>El número <?= $suma; ?> es impan</p><?
    }
    ?>
    <h4>El factorial de <?= $suma ?> es <?= $factorial?></h4>
</body>
</html>