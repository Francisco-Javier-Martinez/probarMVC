<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion</title>
    <link rel="stylesheet" href="../style.css"/>
</head>
<body>
    <header>
        <h1 id="titulo">CONFIRMACIÓN DE BORRADO</h1>
    </header>
    <?php 
        $filaUsuario=$arraiUsuario->fetch_assoc();
        echo '<h1>¿Estás seguro de que quieres borrar al usuario '.$filaUsuario['nombreUsuario'].' con este correo: '.$filaUsuario['correo'].'? </h1>';
        echo '<h4>No podrás revertir cambios al decir que si</h4>';
        echo '<a href="cBorrar.php?idUsuario='.$filaUsuario['idUsuario'].'">SI</a>   ';
    ?>
    <a href="cMostrar.php">NO</a>
</body>
</html>