<?php
include "includes/header.php";

include "includes/scriptsup.php";

if (isset($_POST['btn'])) {
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    @$imc=round($peso/($altura*$altura),1);
    @$pesomin=round(18.5*$altura*$altura,1);
    @$pesomax=round(24.9*$altura*$altura,1);
    if($imc<18.5){
        $clasificación=".  Tienes peso insuficiente, el peso normal de acuerdo a tu estatura está entre ".$pesomin." y ".$pesomax." kg.";
    }else if($imc<=24.9){
        $clasificación=". Tienes peso normal.";
    }else if($imc<=26.9){
        $clasificación=". Tienes sobrepeso grado I, el peso normal de acuerdo a tu estatura está entre ".$pesomin." y ".$pesomax." kg.";
    }else if($imc<=29.9){
        $clasificación=". Tienes sobrepeso grado II (pre-obesidad), el peso normal de acuerdo a tu estatura está entre ".$pesomin." y ".$pesomax." kg.";
    }else if($imc<=34.9){
        $clasificación=". Tienes obesidad de tipo I, el peso normal de acuerdo a tu estatura está entre ".$pesomin." y ".$pesomax." kg.";
    }else if($imc<=39.9){
        $clasificación=". Tienes obesidad de tipo II, el peso normal de acuerdo a tu estatura está entre ".$pesomin." y ".$pesomax." kg.";
    }else if($imc<=49.9){
        $clasificación=". Tienes obesidad de tipo III (móbida), el peso normal de acuerdo a tu estatura está entre ".$pesomin." y ".$pesomax." kg.";
    }else{
        $clasificación=". Tienes obesidad de tipo IV(extrema), el peso normal de acuerdo a tu estatura está entre ".$pesomin." y ".$pesomax." kg.";
    }
    
    $alert="Tu IMC es de ".$imc.$clasificación;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio Punto 2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body id="cuerpo">

    <div class="container">
        <h3 class="nav-item active">INDICE DE MASA CORPORAL (IMC)</h3>
        <form action="" name="formulario" id="formulario" method="POST">
            <div class="soli">
                <section class="soliturn">
                    <h2 id="titulo">POR FAVOR INGRESE LOS DATOS </h2>
                    <h4 style="text-align: center;">(*) Campos Obligatorios</h4><br>
                    <img style="width:100%;" src="img/bodytech.png" alt="">
                    <!-- Número UNO -->
                    <div class="form-group">
                        <span id="erroraltura"></span>
                        <input class="control" type="text" name="altura" id="altura"
                            placeholder="Ingrese la altura en metros (*)"
                            value="<?php if(isset($_POST['altura'])){echo $altura;} ?>">
                    </div>
                    <!-- Número DOS -->
                    <div class="form-group">
                        <div>
                            <span id="errorpeso"></span>
                            <input class="control" type="text" name="peso" id="peso"
                                placeholder="Ingrese el peso (*)"
                                value="<?php if(isset($_POST['peso'])){echo $peso;} ?>">
                        </div>
                        <!-- resultado -->
                        <div class="form-group">
                            <label for="">Resultado:</label>
                            <p class="control" id="resultado"><?php if(isset($_POST['btn'])){echo $alert;} ?></p>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="boton" name="btn" id="btn"
                                onclick='validar()'>Calcular</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="boton" id="" onclick="limpiardatos();">Limpiar</button>
                        </div>

                </section>
            </div>
        </form>
    </div>
    <div class="navbar navbar-expand-lg " id="circulodark">
        <div class="col-sm">
            Dirección: Carrera 29 N°46-36 <br>
            Teléfono: 301-508-4623 <br>
            Email: willyremi1990@gmail.com <br>
            Todos los derechos reservados 2020
        </div>
    </div>
    <?php
    include "includes/scriptsdown.php";
    ?>
    <script>
    function limpiardatos() {

        document.getElementById("altura").value = "";
        document.getElementById("peso").value = "";
        document.getElementById('erroraltura').innerHTML = "";
        document.getElementById('errorpeso').innerHTML = "";
        document.getElementById('titulo').innerHTML = "POR FAVOR INGRESE TODOS LOS DATOS";
        document.getElementById('resultado').innerHTML = "";
        document.getElementById("altura").focus();

    }




    (function() {
        var formulario = document.getElementsByName('formulario')[0],
            elementos = formulario.elements,
            boton = document.getElementById('btn');

        var validarAltura = function(e) {
            if (formulario.altura.value == 0) {

                document.getElementById('erroraltura').innerHTML = "Debe ingresar la altura";
                document.getElementById('titulo').innerHTML = "FALTAN CAMPOS POR LLENAR";
                e.preventDefault();
            } else {
                document.getElementById('erroraltura').innerHTML = "";

            }
        };
        var validarPeso = function(e) {
            if (formulario.peso.value == 0) {

                document.getElementById('errorpeso').innerHTML = "Debe ingresar el peso";
                document.getElementById('titulo').innerHTML = "FALTAN CAMPOS POR LLENAR";
                e.preventDefault();
            } else {
                document.getElementById('errorpeso').innerHTML = "";

            }
        };
      

        var validar = function(e) {
            validarAltura(e);
            validarPeso(e);
             };



        formulario.addEventListener("submit", validar);

    }())
    </script>
</body>

</html>