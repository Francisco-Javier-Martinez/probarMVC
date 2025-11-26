<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="../style.css"/>
</head>
<body>
    <header>
        <h1 id="titulo">ERROR</h1>
    </header>
    <h1>
        <?php
            echo $mensaje ;
        ?>
    </h1>
    <?php
        if (isset($mensaje2)) {
            foreach ($mensaje2 as $msg) {
                echo '<h4>'.$msg.'</h4>';
            }
        }
    ?>
    <a href="<?php echo $enlace_volver; ?>">Volver</a>
</body>
</html>
