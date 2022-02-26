<?php 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo '<pre>';
            var_dump($_POST);
        echo '</pre>';
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <p class="title">formulario cuenta</p>

    <form action="financiacion.php" role="form" method="post">

        <input type="text" name="nombre" placeholder="nombre">
        <input type="text" name="apellido" placeholder="apellido">
        <input type="number" name="valor" id="" placeholder="valor">
        <select name="opciones" id="">
            <option value="">--Seleccionar</option>
            <option value="tres">3</option>
            <option value="seis">6</option>
            <option value="nueve">9</option>
        </select>

        <button type="submit">Enviar</button>
        
    </form>

</body>
</html>