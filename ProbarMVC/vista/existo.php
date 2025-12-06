<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éxito</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <header>
        <h1 id="titulo">ÉXITO</h1>
    </header>
    <?php
        if (isset($mensaje)) {
            echo '<h1>'.$mensaje.'</h1>';
        }
    ?>
    <a href="index.php">Volver</a>
</body>
</html>