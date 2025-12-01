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
            <li><a href="#inicio" class="amenu">Inicio</a></li>
            <li><a href="./cFormulario.php"  class="amenu">Formulario</a></li>
            <li><a href="./cMostrar.php" class="amenu">MODIFICAR/BORRAR</a></li>
        </ul>
    </nav>
    <main>
        <!--formulario-->
        <div id="formu">
        <section id="formulario">
            <h1  id="formuIndice" >Modificaion de Noticias de Animales</h1>
            <form action="./cModificarFinal.php" method="post">
                <!-- campo oculto para pasar el id del usuario -->
                <input type="hidden" name="idUsuario" value="<?php echo $usu; ?>"/>
                <!-- Text -->
                <label class="texlabel">Nombre:
                    <?php
                        $filaUsuario=$arraiUsuario->fetch_assoc();
                        echo '<input type="text" name="nombre" value="'.$filaUsuario['nombreUsuario'].'" readonly/>';
                    ?>
                </label>

                <label class="texlabel" >Correo:  
                    <?php
                        echo '<input type="text" name="correoElectronico" value="'.$filaUsuario['correo'].'"/>';
                    ?>
                </label>
                <!-- Sugurencias-->
                <label>Sugerencia
                    <?php
                        echo '<input type="text" name="sugerencia" value="'.$filaUsuario['sugerencias'].'" readonly/>';
                    ?>
                </label>
                <!--Radio-->
                <p>Idioma seleccionado:</p>
                <label>
                    <input type="radio" name="idioma" value="espanol" /> Español
                </label>
                <label>
                    <input type="radio" name="idioma" value="ingles"/> Inglés
                </label>
                <!--Checkbox-->
                <!--Debe salir por defecto los animales que tiene seleccionado el usuario-->
                <p>Información a recibir:</p>
                <?php
                    //Si es diferente a null es que tenemos filas si no muestro mensaje
                    if($arrayAnimales!=null){
                        while($fila=$arrayAnimales->fetch_assoc()){ 
                            echo '<label>
                                    <input type="checkbox" name="animales[]" value='.$fila['idAnimales'].'>'.$fila['nombreAnimal'].'</label>';
                            }
                    }else{
                        echo '<p>No tenemos animales para recibir informacion de ellos</p>';
                    }

                ?>
                <!--Select-->
                <p>¿Cómo nos has conocido?:</p>
                <?php
                    //Si es diferente a null es que tenemos filas si no muestro mensaje
                    if($arrayRecomendados!=null){
                        echo '<select id="comoConocio" name="comoConocio">';
                        while($fila=$arrayRecomendados->fetch_assoc()){ 
                            echo '<option value="'.$fila['idRecomendacion'].'">'.$fila['nombre'].'</option>';
                        }
                        echo '</select>';
                    }else{
                        echo '<p>No tenemos recomendados disponibles</p>';
                    }
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