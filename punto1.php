<?php
if (!empty($_POST)) {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $oper = $_POST['oper'];
    $result = '';

    switch ($oper) {
        case '+':
            $result = $number1 + $number2;
            break;
        case '-':
            $result = $number1 - $number2;
            break;
        case '*':
            $result = $number1 * $number2;
            break;
        case '/':
            $result = $number1 / $number2;
            break;

        default :
        $result="Por favor Ingrese un signo de +, -, *, /.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller WEB1</title>
</head>

<body>
    <form action="" method="POST">
        <div><label for="number1">Número 1</label>
            <input type="number" name="number1" id="number1" value="<?php if(!empty($_POST)){echo $number1;} ?>">
        </div>
        <div><label for="number2">Número 2</label>
            <input type="number" name="number2" id="number2" value="<?php if(!empty($_POST)){echo $number2;} ?>">
        </div>
        <div><label for="oper">Operador</label>
            <select name="oper" id="oper">
            <option selected disabled value="<?php if(!empty($_POST)){echo $oper;} ?>"><?php if(!empty($_POST)){echo $oper;}else{echo "Seleccione una Opción";} ?></option>
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
        </div>
        <div><?php if(!empty($_POST)){echo $result;} ?></div>
        <input type="submit" value="Calcular">

    </form>

</body>

</html>