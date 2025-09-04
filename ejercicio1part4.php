<?php

session_start();

if (!isset($_SESSION["estudiantes"])){
    $_SESSION["estudiantes"] = [];
}

$promedio = null;
$notaAlta = null;
$notaBaja = null;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["reset"])){
        $_SESSION["estudiantes"] = [];
    } elseif (isset($_POST["calcular"])){
        $sumatoriaNotas = 0;
        foreach ($_SESSION["estudiantes"] as $itemEstudiante){
            $sumatoriaNotas += $itemEstudiante["nota"];
        }
        if (count($_SESSION["estudiantes"]) > 0){
            $promedio = $sumatoriaNotas / count($_SESSION["estudiantes"]);
        }
    } elseif (isset($_POST["notaAlta"])){
        if (count($_SESSION["estudiantes"]) > 0){
            $notas = array_column($_SESSION["estudiantes"], "nota");
            $notaAlta = max($notas);
        }
    } elseif (isset($_POST["notaBaja"])){
        if (count($_SESSION["estudiantes"]) > 0){
            $notas = array_column($_SESSION["estudiantes"], "nota");
            $notaBaja = min($notas);
        }
    } else {
        $nombre = $_POST["nombre"];
        $nota = $_POST["nota"];
        $_SESSION["estudiantes"][] = ["nombre" => $nombre, "nota" => $nota];
    }
}

$estudiantes = $_SESSION["estudiantes"];

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
        <label for="nombre">Ingrese el nombre del estudiante</label>
        <input type="text" id="nombre" name="nombre">

        <label for="nota">Nota</label>
        <input type="number" id="nota" name="nota">

        <button type="submit">Agregar</button>
        <button type="submit" name="reset">Resetear</button>
        <button type="submit" name="calcular">Calcular promedio</button>
        <button type="submit" name="notaAlta">Nota más alta</button>
        <button type="submit" name="notaBaja">Nota más Baja</button>
    </form>

    <?php if($promedio !== null): ?>
        <p>El promedio es: <?= $promedio?></p>
    <?php endif; ?>
    <?php if($notaAlta !== null): ?>
        <p>La nota alta es: <?= $notaAlta?></p>
    <?php endif; ?>
    <?php if($notaBaja !== null): ?>
        <p>La nota baja es: <?= $notaBaja?></p>
    <?php endif; ?>

    <table>
        <thead>
            <th>Nombre</th>
            <th>Nota</th>
        </thead>
        <tbody>
            <?php foreach ($estudiantes as $itemEstudiante){
                ?>
                <tr>
                    <td><?= $itemEstudiante["nombre"]?></td>
                    <td><?= $itemEstudiante["nota"]?></td>
                </tr>
                <?
            }
            
            ?>
        </tbody>
    </table>
</body>
</html>