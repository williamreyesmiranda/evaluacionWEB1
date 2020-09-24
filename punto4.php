<?php
include "includes/header.php";

include "includes/scriptsup.php";

if (isset($_POST['btn'])) {
    $numTrab = $_POST['numTrab'];
    
if($numTrab<=40){
    $pago=$numTrab*20000;
    $alert="El pago total es de: $".$pago;
}else{
    $pago=40*20000;
    $numExtras=$numTrab-40;
    $pagoExtras=$numExtras*25000;
    $alert="El pago horas normales es de: $".$pago."<br>";
    $alert .=$numExtras." horas extras por: $".$pagoExtras."<br>";
    $alert .="El pago total es de: $".($pagoExtras+$pago);
}
   
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio Punto 4</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body id="cuerpo">

    <div class="container">
        <h3 class="nav-item active">Horas Estras Postobon</h3>
        <form action="" name="formulario" id="formulario" method="POST">
            <div class="soli">
                <section class="soliturn">
                    <h2 id="titulo">POR FAVOR INGRESE LOS DATOS </h2>
                    <h4 style="text-align: center;">(*) Campos Obligatorios</h4>
                    <img style="width:100%;" src="img/spring-step.png" alt="">
                    <!-- Número UNO -->
                    <div class="form-group mt-3">
                        <span id="errornumTrab"></span>
                        <input class="control" type="text" name="numTrab" id="numTrab"
                            placeholder="Ingrese el número de horas trabajadas (*)"
                            value="<?php if(isset($_POST['numTrab'])){echo $numTrab;} ?>"autocomplete="off">
                    </div>
                    <!-- Número DOS -->
                    <div class="form-group">
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
    <?php
    include "includes/footer.php";
    include "includes/scriptsdown.php";
    ?>
    <script>
    function limpiardatos() {

        document.getElementById("numTrab").value = "";
        document.getElementById('errornumTrab').innerHTML = "";
        document.getElementById('titulo').innerHTML = "POR FAVOR INGRESE TODOS LOS DATOS";
        document.getElementById('resultado').innerHTML = "";
        document.getElementById("numTrab").focus();

    }




    (function() {
        var formulario = document.getElementsByName('formulario')[0],
            elementos = formulario.elements,
            boton = document.getElementById('btn');

        var validarnumTrab = function(e) {
            if (formulario.numTrab.value == 0) {

                document.getElementById('errornumTrab').innerHTML = "Debe ingresar los cantidad de horas trabajadas";
                document.getElementById('titulo').innerHTML = "FALTAN CAMPOS POR LLENAR";
                e.preventDefault();
            } else {
                document.getElementById('errornumTrab').innerHTML = "";

            }
        };
         var validar = function(e) {
            validarnumTrab(e);
            };



        formulario.addEventListener("submit", validar);

    }())
    </script>
</body>

</html>