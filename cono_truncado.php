<?php

$radio_mayor = '';
$radio_menor = '';
$altura = '';
$volumen = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $radio_mayor = floatval($_POST['radio_mayor'] ?? 0);
    $radio_menor = floatval($_POST['radio_menor'] ?? 0);
    $altura = floatval($_POST['altura'] ?? 0);

    if ($radio_mayor <= 0 || $radio_menor <= 0 || $altura <= 0) {
        $error = "Todos los valores deben de ser positivos mayores que cero.";
    } elseif ($radio_menor >= $radio_mayor){
        $error = "El radio menor es mayor que el radio mayor.";
    } else {
        // V = (1/3) * pi * h * (R^2 + R*r + r^2)
        $volumen = (1/3) * M_PI * $altura * (pow($radio_mayor, 2) + ($radio_mayor*$radio_menor) + pow($radio_menor, 2));
        $volumen = round($volumen, 2);
    }
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
    <div class="container">
        <h2>Calculadora de Volumen - Cono truncado</h2>
    </div>

    <?php if($error): ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <label for="radio_mayor">Radio mayor (R) - cm</label>
        <input type="number" id="radio_mayor" name="radio_mayor" required value="<?= htmlspecialchars($radio_mayor) ?>">

        <label for="radio_menor">Radio menor (r) - cm</label>
        <input type="number" id="radio_menor" name="radio_menor" required value="<?= htmlspecialchars($radio_menor) ?>">

        <label for="altura">Altura (h) - cm</label>
        <input type="number" id="altura" name="altura" required value="<?= htmlspecialchars($altura) ?>">

        <button type="submit">Calcular volumen</button>

        <?php if ($volumen && !$error): ?>
            <div class="formula">
                V = (1/3) * pi * h * (R^2 + (R*r) + r^2)
            </div>

            <div class="datos-ingresados">
                <div class="dato-item">
                    Radio mayor
                    <?php echo $radio_mayor; ?> cm
                </div>
                <div class="dato-item">
                    Radio menor
                    <?php echo $radio_menor; ?> cm
                </div>
                <div class="dato-item">
                    Altura
                    <?php echo $altura; ?> cm
                </div>
            </div>

            <div class="resultado">
                <h3>Resultado del cálculo:</h3>
                <div class="volumen-resultado">
                    <?php echo $volumen; ?> cm^3
                </div>
            </div>
        <?php endif; ?>
    </form>
</body>
</html>