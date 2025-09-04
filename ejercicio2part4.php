<?php

session_start();

if (!isset($_SESSION["productos"])){
    $_SESSION["productos"] = [];
}

$productos = $_SESSION["productos"];
$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST["agregar"])){
        $nombre = $_POST["nombre"];
        $categoria = $_POST["categoria"];

        if ($nombre !== "" && $categoria !== ""){
            $_SESSION["productos"][] = ["nombre" => $nombre, "categoria" => $categoria];
        }
    }

    if (isset($_POST["eliminar"])){
        $indice = $_POST["eliminar"];
        unset($_SESSION["productos"][$indice]);
        $_SESSION["productos"] = array_values($_SESSION["productos"]);
    }

    if (isset($_POST["buscar"])){
        $categoriaBuscada = $_POST["categoria_buscar"];
        foreach ($_SESSION["productos"] as $producto){
            if (strcasecmp($producto["categoria"], $categoriaBuscada) == 0){
                $resultados[] = $producto;
            }
        }
    }

    if (isset($_POST["reset"])){
        $_SESSION["productos"] = [];
    }

    $productos = $_SESSION["productos"];
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
        <label for="nombre">Nombre del producto</label>
        <input type="text" id="nombre" name="nombre">

        <label for="categoria">Categoría</label>
        <input type="text" id="categoria" name="categoria">

        <button type="submit" name="agregar">Agregar</button>
    </form>

    <form method="POST">
        <label for="categoria_buscar">Buscar por categoría</label>
        <input type="text" id="categoria_buscar" name="categoria_buscar" required>

        <button type="submit" name="buscar">Buscar</button>
    </form>

    <form method="POST">
        <button type="submit" name="reset">Resetear productos</button>
    </form>

    <h2>Lista de productos</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach ($productos as $index => $producto){
                ?>
                <tr>
                    <td><?= $producto["nombre"] ?></td>
                    <td><?= $producto["categoria"] ?></td>
                    <td>
                        <form method="POST">
                            <button type="submit" name="eliminar" value="<?= $index ?>">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?
            }
            ?>
            <?php if (empty($productos)): ?>
                <tr><td>No hay productos registrados</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php if (!empty($resultados)): ?>
        <h2>Resultados de la búsqueda</h2>
        <ul>
            <?php foreach ($resultados as $res): ?>
                <li><?= $res["nombre"] ?> <?= $res["categoria"] ?></li>
            <?php endforeach; ?>
        </ul>
    <?php elseif (isset($_POST["buscar"]) && empty($resultados)): ?>
        <p>No se encontraron productos en esa categoría.</p>
    <?php endif; ?>
</body>
</html>