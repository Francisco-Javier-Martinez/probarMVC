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
                <li><a href="./cFormulario.php" class="amenu">Formulario</a></li>
                <li><a href="./cMostrar.php" class="amenu">MODIFICAR/BORRAR</a></li>
                <li><a href="./cSacarInner.php" class="amenu">Ver usuario/animales</a></li>
            </ul>
        </nav>
        <main>
            <h1>Lista de usuarios</h1>
            <?php
                foreach($listaUsuarios as $usuario){
                    echo '<p>Nombre: '.$usuario['nombreUsuario'].' - Correo: '.$usuario['correo'].'
                    - <a href="./cModificar.php?idUsuario='.$usuario['idUsuario'].'">Modificar</a> 
                    - <a href="./cConfirmarBorrar.php?idUsuario='.$usuario['idUsuario'].'">Borrar</a></p>';
                }
            ?>
        </main>
    </body>
</html>