<?php

$contador = 1;
$cantidadMultiplicar = 8;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <th>Tabla del 8</th>
        </thead>
        <tbody>
            <?php

            while ($contador <= 10) {
                $resultado = $cantidadMultiplicar * $contador;
                ?><tr>
                    <td><?=$cantidadMultiplicar?> * <?=$contador?> = <?=$resultado?></td>
                </tr><?
                $contador++;
            }

            ?>
        </tbody>
    </table>
</body>
</html>