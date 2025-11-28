<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css"/>
        <title>Modificar</title>
    </head>
    <body>
        <header>
            <h1 id="titulo">LISTA DE USUARIOS</h1>
        </header>
        <nav>
            <ul>
                <li><a href="./index.php" class="amenu">Formulario</a></li>
                <li><a href="./cMostrar.php" class="amenu">MODIFICAR/BORRAR</a></li>
                <li><a href="./cSacarInner.php" class="amenu">Ver usuario/animales</a></li>
            </ul>
        </nav>
        <main>
            <h1>Lista de usuarios</h1>
            <?php
                while($fila=$listaUsuarios->fetch_assoc()){
                    echo '<p>'.$fila['nombreUsuario'].'   '.$fila['correo'].'</p>';
                    echo '<a href="./cModificar.php?idUsuario='.$fila['idUsuario'].'">Modificar  </a> ';
                    echo '<a href="./cConfirmarBorrar.php?idUsuario='.$fila['idUsuario'].'">Borrar</a>';
                }
            ?>
        </main>
    </body>
</html>