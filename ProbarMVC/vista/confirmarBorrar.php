<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Borrado</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <header>
        <h1 id="titulo">CONFIRMACIÓN DE BORRADO</h1>
    </header>
    <main>
        <?php 
            echo '<h2>¿Estás seguro de que quieres borrar al usuario 
                ' . $arraiUsuario['nombreUsuario'] . 'con el correo ' . $arraiUsuario['correo'] . '?
            </h2>';
        ?>
        <a href="./cBorrar.php?idUsuario=<?php echo $_GET['idUsuario']; ?>">SÍ</a>
        <a href="./cMostrar.php" class="boton-cancelar">NO</a>
    </main>
</body>
</html>