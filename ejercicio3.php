<?php

$lado_a = '';
$lado_b = '';
$lado_c = '';
$lado_desconocido = '';
$resultado = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $lado_a = floatval($_POST['lado_a'] ?? 0);
    $lado_b = floatval($_POST['lado_b'] ?? 0);
    $lado_c = floatval($_POST['lado_c'] ?? 0);
    $lado_desconocido = $_POST['lado_desconocido'] ?? '';

    $lados_ingresados = 0;
    if ($lado_a > 0) $lados_ingresados++;
    if ($lado_b > 0) $lados_ingresados++;
    if ($lado_c > 0) $lados_ingresados++;

    if ($lados_ingresados != 2){
        $error = "Debes ingresar exactamente 2 lados conocidos.";
    } elseif ($lado_desconocido === ''){
        $error = "Debes seleccionar qué lado quieres calcular.";
    } else {
        switch ($lado_desconocido){
            case 'a':
                if ($lado_b > 0 && $lado_c > 0) {
                    if ($lado_c <= $lado_b){
                        $error = "La hipotenusa (c) debe ser mayor que el cateto (b).";
                    } else {
                        $resultado = sqrt(pow($lado_c, 2) - pow($lado_b, 2));
                    }
                }
                break;

            case 'b':
                if ($lado_a > 0 && $lado_c > 0) {
                    if ($lado_c <= $lado_a){
                        $error = 'La hipotenusa (c) debe ser mayor que el cateto (a).';
                    } else {
                        $resultado = sqrt(pow($lado_c, 2) - pow($lado_a, 2));
                    }
                }
                break;

            case 'c':
                if ($lado_a > 0 && $lado_b > 0){
                    $resultado = sqrt(pow($lado_a, 2) + pow($lado_b, 2));
                }
                break;
        }

        if ($resultado && !$error){
            $resultado = round($resultado,2);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .radio-option {
            cursor: pointer;
        }
        .radio-option:hover {
            border-color: #3498db;
            background: #f8f9fa;
        }
        .radio-option.selected {
            border-color: #3498db;
            background: #e3f2fd;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Teorema de Pitágoras - Calculadora</h2>

        <?php if ($error): ?>
            <div class="error">
                <?php echo htmlspecialchars($error)?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <label for="lado_a">Cateto a:</label>
            <input type="number" id="lado_a" name="lado_a" value="<?php echo htmlspecialchars($lado_a); ?>">
            <label for="lado_b">Cateto b:</label>
            <input type="number" id="lado_b" name="lado_b" value="<?php echo htmlspecialchars($lado_b); ?>">
            <label for="lado_c">Hipotenusa c:</label>
            <input type="number" id="lado_c" name="lado_c" value="<?php echo htmlspecialchars($lado_c); ?>">

            <div class="form-group">
                <label>Lado a calcular:</label>
                <div class="radio-group">
                    <div class="radio-option <?php echo $lado_desconocido == 'a' ? 'selected' : ''; ?>" id="option-a" onclick="seleccionarLado('a')">Cateto a</div>
                    <div class="radio-option <?php echo $lado_desconocido == 'b' ? 'selected' : ''; ?>" id="option-b" onclick="seleccionarLado('b')">Cateto b</div>
                    <div class="radio-option <?php echo $lado_desconocido == 'c' ? 'selected' : ''; ?>" id="option-c" onclick="seleccionarLado('c')">Hipotenusa c</div>
                </div>
                <input type="hidden" id="lado_desconocido" name="lado_desconocido" value="<?php echo htmlspecialchars($lado_desconocido); ?>">
            </div>

            <button type="submit">Calcular</button>
        </form>

        <?php if ($resultado && !$error): ?>
            <div class="formula">
                <h3>Fórmula utilizada:</h3>
                <?php
                if ($lado_desconocido == 'c'){
                    echo "c = (a^2 + b^2)^(1/2)";
                } else {
                    echo ($lado_desconocido == 'a' ? "a" : "b") . " = (c^2 - " . ($lado_desconocido == 'a' ? "b^2" : "a^2") . ")^(1/2)";
                }
                ?>
            </div>

            <div class="resultado">
                <h3>Resultado:</h3>
                <?php echo strtoupper($lado_desconocido); ?> = <?php echo $resultado; ?> unidades
            </div>
        <?php endif; ?>
    </div>
    <script>
        function seleccionarLado(lado){
            document.querySelectorAll('.radio-option').forEach(function(el){
                el.classList.remove('selected');
            });
            document.getElementById('option-' + lado).classList.add('selected');
            document.getElementById('lado_desconocido').value = lado;
        }
    </script>
</body>
</html>