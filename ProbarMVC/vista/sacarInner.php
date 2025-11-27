<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Ver Usuarios y Animales</title>
</head>
<body>
    <header>
        <h1 id="titulo">USUARIOS Y ANIMALES</h1>
    </header>
    <main>
        <?php
            $nombre="";
            while($fila=$arrayAnimalesUsuario->fetch_assoc()){
                if($fila["nomUsu"]!=$nombre){
                    if($nombre!="") echo '</ul>';
                    $nombre=$fila["nomUsu"];
                    echo '<h2>Usuario: '.$fila["nomUsu"].'</h2>';
                    echo '<ul>';
                }
                echo '<li>'.$fila['nomAni'].'</li>';
            }
            if($nombre!="") echo '</ul>';
        ?>
    </main>
</body>
</html>
