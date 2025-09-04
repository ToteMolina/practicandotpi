<?php 
$estudiantes = [ 
    ["nombre" => "Ana", "matematica" => 85, "ciencias" => 90, "historia" => 78], 
    ["nombre" => "Carlos", "matematica" => 92, "ciencias" => 88, "historia" => 95], 
    ["nombre" => "María", "matematica" => 76, "ciencias" => 84, "historia" => 89] 
]; 
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
            <tr>
                <th>Nombre</th>
                <th>Matemática</th>
                <th>Ciencias</th>
                <th>Historia</th>
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
            foreach ($estudiantes as $estudiante) {
                $sumatoriaNotas = 0;
                $sumatoriaNotas += $estudiante['matematica'] + $estudiante['ciencias'] + $estudiante['historia'];
                $promedio = $sumatoriaNotas / (count($estudiante)-1);
                ?><tr>
                    <td><?= $estudiante['nombre'] ?></td>
                    <td><?= $estudiante['matematica'] ?></td>
                    <td><?= $estudiante['ciencias'] ?></td>
                    <td><?= $estudiante['historia'] ?></td>
                    <td><?= $promedio ?></td>
                </tr><?
            }

            ?>
        </tbody>
    </table>
</body>
</html>