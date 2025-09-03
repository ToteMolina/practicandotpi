<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $numero1 = $_POST["numero1"];
    $numero2 = $_POST["numero2"];
    $numero3 = $_POST["numero3"];
    $numero4 = $_POST["numero4"];
    $numero5 = $_POST["numero5"];
    $numero6 = $_POST["numero6"];
    $numero7 = $_POST["numero7"];

    $numeros = array($numero1, $numero2, $numero3, $numero4, $numero5, $numero6, $numero7);
    $cant_numeros = count($numeros);
    $suma_numeros = array_sum($numeros);
    $promedio = $suma_numeros/$cant_numeros;
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
        <label for="numero1">Ingresa el número 1</label>
        <input type="number" id="numero1" name="numero1"><br>

        <label for="numero2">Ingresa el número 2</label>
        <input type="number" id="numero2" name="numero2"><br>

        <label for="numero3">Ingresa el número 3</label>
        <input type="number" id="numero3" name="numero3"><br>

        <label for="numero4">Ingresa el número 4</label>
        <input type="number" id="numero4" name="numero4"><br>

        <label for="numero5">Ingresa el número 5</label>
        <input type="number" id="numero5" name="numero5"><br>

        <label for="numero6">Ingresa el número 6</label>
        <input type="number" id="numero6" name="numero6"><br>

        <label for="numero7">Ingresa el número 7</label>
        <input type="number" id="numero7" name="numero7"><br>

        <button type="submit">Calcular promedio</button>
    </form>

    <?php if(isset($promedio)):?>
        <p>El promedio es: <?= $promedio?></p>
    <?php endif;?>    
</body>
</html>