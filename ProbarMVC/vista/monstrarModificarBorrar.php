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
            <li><a href="index.php" class="amenu">Inicio</a></li>
            <li><a href="index.php?c=RegistroUsuario&m=monstrarFormularioRegistro" class="amenu">Formulario</a></li>
            <li><a href="index.php?c=RegistroUsuario&m=monstrarUsuarioModificarBorrar" class="amenu">Modificar/Borrar</a></li>
            </ul>
        </nav>
        <main>
            <h1>Lista de usuarios</h1>
            <?php
                foreach($datos as $usuario){
                    echo '<p>Nombre: '.$usuario['nombreUsuario'].' Correo: '.$usuario['correo'].'
                    <a href="index.php?c=RegistroUsuario&m=modificar&idUsuario='.$usuario['idUsuario'].'">Modificar</a>
                    <a href="index.php?c=RegistroUsuario&m=confirmarBorrar&idUsuario='.$usuario['idUsuario'].'">Borrar</a>
                    </p>';
                }
            ?>
        </main>
    </body>
</html>