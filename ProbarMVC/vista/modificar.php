<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Configuracion</title>
</head>
<body>
    <!--Cabecera -->
    <header>
        <h1 id="titulo">MODIFICACION</h1>
    </header>
    <nav>
        <!--Menu -->
        <ul>
            <li><a href="index.php" class="amenu">Inicio</a></li>
            <li><a href="index.php?c=RegistroUsuario&m=monstrarFormularioRegistro" class="amenu">Formulario</a></li>
            <li><a href="index.php?c=RegistroUsuario&m=monstrarUsuarioModificarBorrar" class="amenu">Modificar/Borrar</a></li>
        </ul>
    </nav>
    <main>
        <!--formulario-->
        <div id="formu">
        <section id="formulario">
            <h1  id="formuIndice" >Modificaion de Noticias de Animales</h1>
            <?php
                    extract($datos);
                ?>
            <form action="index.php?c=RegistroUsuario&m=modificarFinal" method="post">
                <!--Input oculto para el idUsuario-->
                <input type="hidden" name="idUsuario" value="<?php echo $usuario['idUsuario']; ?>"/>
                <!-- Text -->
                <label class="texlabel">Nombre:
                    <input type="text" name="nombre" value="<?php echo $usuario['nombreUsuario']; ?>"/>
                </label>
                <label class="texlabel" >Correo:  
                    <input type="text" name="correoElectronico" value="<?php echo $usuario['correo']; ?>"/>
                </label>
                <!-- Sugurencias-->
                <label>Sugerencia
                    <input type="text" name="sugerencia" value="<?php echo $usuario['sugerencias']; ?>"/>
                </label>
                <!--Radio-->
                <p>Seleccione idioma:</p>
                <label>
                    <input type="radio" name="idioma" value="espanol" 
                    <?php if($usuario['idioma']=='espanol') 
                        echo 'checked'; 
                    ?>/> Español
                </label>
                <label>
                    <input type="radio" name="idioma" value="ingles" 
                    <?php if($usuario['idioma']=='ingles') 
                        echo 'checked'; 
                    ?>/> Inglés
                </label>
                <!--Checkbox-->
                <p>Información a recibir:</p>
                <?php
                    foreach($arrayanimalesUsuario as $fila){
                        echo '<label>';
                        echo '<input type="checkbox" name="animales[]" value="'.$fila['idAnimales'] .'"/>'.$fila['nombreAnimal'];
                        echo '</label>';
                    }
                ?>
                <p>Acepto los terminos y condiciones: </p>
                <label>
                    <input type="checkbox" name="terminosCondicones" value="1" checked/>Aceptar
                </label>
                <p>¿Cómo nos has conocido?:</p>
                <?php
                    
                    echo '<select id="comoConocio" name="comoConocio">';
                    foreach($arrayRecomendaciones as $fila){ 
                        echo '<option value="'.$fila['idRecomendacion'].'">'.$fila['nombre'].'</option>';
                    }
                    echo '</select>';
                ?>
                <!--Envicar y Resetear-->
                <p>¿Has terminado de rellenar?</p>
                <input class="botonesFormulario" type="reset" value="Resetar"/>
                <input class="botonesFormulario" type="submit" value="Enviar"/>
            </form>
            <img class="imagenesAnimales" src="../img/losTres.png" alt="Los 3"/>
        </section>
        </div>
    </main>
    <footer class="piePagina">
        <h2>2º DAW</h2>
        <p>Fco. Javier Martínez Fernández</p>
        <p>Informacion sobre aniamles: <a href="https://www.20minutos.es/lainformacion/archivo/14-animales-peligro-extincion-por-cambio-climatico-koala-elefante-5328628/" target="_blank">Click aqui</a></p>
        <p>Informacion sobre ayudar por el cambio climatico <a href="https://www.fundacionaquae.org/wiki/diez-consejos-luchar-cambio-climatico/" target="_blank">Click aqui</a></p>
    </footer>
</body>
</html>