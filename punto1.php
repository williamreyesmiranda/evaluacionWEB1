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
        <h3 class="nav-item active">calculadora de 2 números</h3>
        <form action="" name="formulario" id="formulario" method="POST">
            <div class="soli">
                <section class="soliturn">
                    <h2 id="titulo">POR FAVOR INGRESE LOS DATOS </h2>
                    <h4 style="text-align: center;">(*) Campos Obligatorios</h4>
                    <img class=""style="width:100%;" src="img/calculadora.png" alt="">
                    <!-- Número UNO -->
                    <div class="form-group mt-3">
                        <span id="errornumber1"></span>
                        <input class="control" type="number" name="number1" id="number1"
                            placeholder="Ingrese el primer número (*)"
                            value="<?php if(!empty($_POST)){echo $number1;} ?>"autocomplete="off">
                    </div>
                    <!-- Número DOS -->
                    <div class="form-group">
                        <div>
                            <span id="errornumber2"></span>
                            <input class="control" type="number" name="number2" id="number2"
                                placeholder="Ingrese el segundo número (*)"
                                value="<?php if(!empty($_POST)){echo $number2;} ?>"autocomplete="off">
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
   include "includes/footer.php";
    include "includes/scriptsdown.php";
    ?>
    <script>
        function limpiardatos() {

document.getElementById("number1").value = "";
document.getElementById("number2").value = "";
document.getElementById("+").checked = false;
document.getElementById("-").checked = false;
document.getElementById("*").checked = false;
document.getElementById("-").checked = false;
document.getElementById('titulo').innerHTML = "POR FAVOR INGRESE TODOS LOS DATOS";
document.getElementById('resultado').innerHTML = "";
document.getElementById('errornumber1').innerHTML = "";
document.getElementById('errornumber2').innerHTML = "";
document.getElementById('erroroper').innerHTML = "";
document.getElementById("nombre").focus();

}




(function() {
var formulario = document.getElementsByName('formulario')[0],
    elementos = formulario.elements,
    boton = document.getElementById('btn');

var validarNumber1 = function(e) {
    if (formulario.number1.value == 0) {

        document.getElementById('errornumber1').innerHTML = "Debe ingresar el primer dato";
        document.getElementById('titulo').innerHTML = "FALTAN CAMPOS POR LLENAR";
        e.preventDefault();
    } else {
        document.getElementById('errornumber1').innerHTML = "";

    }
};
var validarNumber2 = function(e) {
    if (formulario.number2.value == 0) {

        document.getElementById('errornumber2').innerHTML = "Debe ingresar el segundo dato";
        document.getElementById('titulo').innerHTML = "FALTAN CAMPOS POR LLENAR";
        e.preventDefault();
    } else {
        document.getElementById('errornumber2').innerHTML = "";

    }
};
var validarOper = function(e) {
    if (formulario.oper[0].checked == true || formulario.oper[1].checked == true ||
        formulario.oper[2].checked == true || formulario.oper[3].checked == true) {
        document.getElementById('erroroper').innerHTML = "";

    } else {
        document.getElementById('erroroper').innerHTML = "Seleccionar la Zona";
        document.getElementById('titulo').innerHTML = "FALTAN CAMPOS POR LLENAR";
        e.preventDefault();
    }
};

var validar = function(e) {
    validarNumber1(e);
    validarNumber2(e);
    validarOper(e);

};



formulario.addEventListener("submit", validar);

}())
    </script>
</body>

</html>