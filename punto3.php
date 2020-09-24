<?php
include "includes/header.php";

include "includes/scriptsup.php";

if (isset($_POST['btn'])) {
    $num = $_POST['num'];
    $precio = $_POST['precio'];
    
    $totalbruto=$num*$precio;

    if($num<3){
        $stringdesc="0%";
        $descuento=0;
        $totalneto=$totalbruto-$descuento;
    }else if($num==3){
        $stringdesc="10%";
        $descuento=$totalbruto*0.10;
        $totalneto=$totalbruto-$descuento;
    }else if($num<=8){
        $stringdesc="20%";
        $descuento=$totalbruto*0.20;
        $totalneto=$totalbruto-$descuento;
    }else{
        $stringdesc="50%";
        $descuento=$totalbruto*0.50;
        $totalneto=$totalbruto-$descuento;
    }
     $alert="Valor compra: $".$totalbruto."<br>";
   $alert .="Descuento compra ".$stringdesc.": $".$descuento."<br>";
   $alert .="Total a pagar: $".$totalneto;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio Punto 3</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body id="cuerpo">

    <div class="container">
        <h3 class="nav-item active">Descuento Calzado Spring Step</h3>
        <form action="" name="formulario" id="formulario" method="POST">
            <div class="soli">
                <section class="soliturn">
                    <h2 id="titulo">POR FAVOR INGRESE LOS DATOS </h2>
                    <h4 style="text-align: center;">(*) Campos Obligatorios</h4>
                    <img style="width:100%;" src="img/spring-step.png" alt="">
                    <!-- Número UNO -->
                    <div class="form-group mt-3">
                        <span id="errornum"></span>
                        <input class="control" type="text" name="num" id="num"
                            placeholder="Ingrese los pares a vender (*)"
                            value="<?php if(isset($_POST['num'])){echo $num;} ?>"autocomplete="off">
                    </div>
                    <!-- Número DOS -->
                    <div class="form-group">
                        <div>
                            <span id="errorprecio"></span>
                            <input class="control" type="text" name="precio" id="precio"
                                placeholder="Ingrese el precio (*)"
                                value="<?php if(isset($_POST['precio'])){echo $precio;} ?>" autocomplete="off">
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
    <?php
    include "includes/footer.php";
    include "includes/scriptsdown.php";
    ?>
    <script>
    function limpiardatos() {

        document.getElementById("num").value = "";
        document.getElementById("precio").value = "";
        document.getElementById('errornum').innerHTML = "";
        document.getElementById('errorprecio').innerHTML = "";
        document.getElementById('titulo').innerHTML = "POR FAVOR INGRESE TODOS LOS DATOS";
        document.getElementById('resultado').innerHTML = "";
        document.getElementById("num").focus();

    }




    (function() {
        var formulario = document.getElementsByName('formulario')[0],
            elementos = formulario.elements,
            boton = document.getElementById('btn');

        var validarnum = function(e) {
            if (formulario.num.value == 0) {

                document.getElementById('errornum').innerHTML = "Debe ingresar los cantidad de zapatos a vender";
                document.getElementById('titulo').innerHTML = "FALTAN CAMPOS POR LLENAR";
                e.preventDefault();
            } else {
                document.getElementById('errornum').innerHTML = "";

            }
        };
        var validarprecio = function(e) {
            if (formulario.precio.value == 0) {

                document.getElementById('errorprecio').innerHTML = "Debe ingresar el precio";
                document.getElementById('titulo').innerHTML = "FALTAN CAMPOS POR LLENAR";
                e.preventDefault();
            } else {
                document.getElementById('errorprecio').innerHTML = "";

            }
        };
      

        var validar = function(e) {
            validarnum(e);
            validarprecio(e);
             };



        formulario.addEventListener("submit", validar);

    }())
    </script>
</body>

</html>