<?php
include "includes/header.php";

include "includes/scriptsup.php";

if (!empty($_POST)) {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $oper = $_POST['oper'];
    $result = '';

    switch ($oper) {
        case '+':
            $result = $number1 + $number2;
            $signo="suma";
            break;
        case '-':
            $result = $number1 - $number2;
            $signo="resta";
            break;
        case '*':
            $result = $number1 * $number2;
            $signo="multiplicación";
            break;
        case '/':
            $result = $number1 / $number2;
            $signo="división";
            break;
    }
    $alert="La <strong>".$signo."</strong> entre ".$number1." y ".$number2." es: ".$result."";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio Punto 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body id="cuerpo">

    <div class="container">
        <h3 class="nav-item active">CALCULADORA</h3>
        <form action="" name="formulario" id="formulario" method="POST">
            <div class="soli">
                <section class="soliturn">
                    <h2 id="titulo">POR FAVOR INGRESE LOS DATOS </h2>
                    <h4 style="text-align: center;">(*) Campos Obligatorios</h4><br>
                    <!-- Número UNO -->
                    <div class="form-group">
                        <span id="errornumber1"></span>
                        <input class="control" type="number" name="number1" id="number1"
                            placeholder="Ingrese el primer número (*)"
                            value="<?php if(!empty($_POST)){echo $number1;} ?>">
                    </div>
                    <!-- Número DOS -->
                    <div class="form-group">
                        <div>
                            <span id="errornumber2"></span>
                            <input class="control" type="number" name="number2" id="number2"
                                placeholder="Ingrese el segundo número (*)"
                                value="<?php if(!empty($_POST)){echo $number2;} ?>">
                        </div>

                        <!-- operador -->
                        <div class="form-group">
                            <label for="oper">Operador (*)</label>
                            <span id="erroroper"></span>
                            <div class="control" id="zona">
                                <input type="radio" name="oper" id="+" value="+"
                                    <?php if(!empty($_POST)){if($oper=='+'){echo "checked";}} ?>>Suma &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="oper" id="-" value="-"
                                    <?php if(!empty($_POST)){if($oper=='-'){echo "checked";}} ?>>Resta&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="oper" id="*" value="*"
                                    <?php if(!empty($_POST)){if($oper=='*'){echo "checked";}} ?>>Multip&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="oper" id="/" value="/"
                                    <?php if(!empty($_POST)){if($oper=='/'){echo "checked";}} ?>>Divis&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                        <!-- resultado -->
                        <div class="form-group">
                            <label for="">Resultado:</label>
                            <p class="control" id="resultado"><?php if(!empty($_POST)){echo $alert;} ?></p>


                            <button type="submit" class="boton" name="btn" id="btn"
                                onclick='calcular()'>Calcular</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="boton" id="" onclick="limpiardatos();">Limpiar</button>
                        </div>

                </section>
            </div>
        </form>
    </div>
    <?php
    include "includes/scriptsdown.php";
    ?>
</body>

</html>