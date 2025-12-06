<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ERROR</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <header>
        <h1 id="titulo">ERROR</h1>
        </header>
        <?php
            if (isset($mensaje)) {
                if (is_array($mensaje)) {
                    foreach ($mensaje as $listaMensajes) {
                        echo $listaMensajes;
                    }
                } else {
                    echo $mensaje;
                }
            }
        ?>
        <a href='index.php'>Volver</a>
    </body>
</html>