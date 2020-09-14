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
    document.getElementById('errorzona').innerHTML = "";
    document.getElementById("nombre").focus();

}




(function() {
    var formulario = document.getElementsByName('formulario')[0],
        elementos = formulario.elements,
        boton = document.getElementById('btn');

    var validarNumber1 = function(e) {
        if (formulario.number1.value == 0) {

            document.getElementById('errornumber1').innerHTML = "Debe ingresar el Segundo número";
            document.getElementById('titulo').innerHTML = "FALTAN CAMPOS POR LLENAR";
            e.preventDefault();
        } else {
            document.getElementById('errornumber1').innerHTML = "";

        }
    };
    var validarNumber2 = function(e) {
        if (formulario.number2.value == 0) {

            document.getElementById('errornumber2').innerHTML = "Debe ingresar el primer número";
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