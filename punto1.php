<?php
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
    $alert="<span class=\"alert alert-success\">La <strong>".$signo."</strong> entre ".$number1." y ".$number2." es: ".$result."</span> <br><br>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ejercicio Punto 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <form class="was-validated" method="POST">
        <h2>Calculadora</h2>
            <div class="form-group">
                <label for="number1">Número 1</label>
                <input class="form-control" type="number" name="number1" id="number1"
                    value="<?php if(!empty($_POST)){echo $number1;} ?>" required>

            </div>
            <div class="form-group">
                <div><label for="number2">Número 2</label>
                    <input class="form-control" type="number" name="number2" id="number2"
                        value="<?php if(!empty($_POST)){echo $number2;} ?>" required>

                </div>
                <br>
                <div class="form-group"><label for="oper">Operador</label>
                    <select class="form-control" name="oper" id="oper" required>
                        <option selected disabled value="<?php if(!empty($_POST)){echo $oper;} ?>">
                            <?php if(!empty($_POST)){echo $oper;}else{echo "Seleccione una Opción";} ?></option>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                </div>
                <div ><?php if(!empty($_POST)){echo $alert;} ?></div>

                <button type="submit" class="btn btn-dark">Calcular</button>
        </form>
    </div>

</body>

</html>