<?php

$ancho = 4;
$largo = 7;

$area_base = ($ancho * $ancho) / 2;

$volumen = $area_base * $largo;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>El volumen del prisma triangular</h2>
    <p>con un ancho de <?php echo "{$ancho}" ?> (base triangular)</p>
    <p>y un largo de <?php echo "{$largo}" ?> (altura del prisma)</p>
    <p>es de <?php echo "{$volumen} cm^3" ?></p>
</body>
</html>