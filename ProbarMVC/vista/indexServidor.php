<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Cambio Climatico</title>
    <link rel="stylesheet" href="style.css"/>
</head> 
<body>
    <!--Cabecera -->
    <header>
        <h1 id="titulo">EL CAMBIO CLIMATICO HACIA LOS ANIMALES</h1>
    </header>
    <nav>
        <!--Menu -->
        <ul>
            <li><a href="#inicio" class="amenu">Inicio</a></li>
            <li><a href="./cFormulario.php" class="amenu">Formulario</a></li>
            <li><a href="./cMostrar.php" class="amenu">MODIFICAR/BORRAR</a></li>
        </ul>
    </nav>
    <main>
        <!--formulario-->
        <div id="formu">
        <section id="formulario">
            <h1  id="formuIndice" >Boletín de Noticias de Animales</h1>
            <form action="./cRecibir.php" method="post">
                <!-- Text -->
                <label class="texlabel">Nombre:
                    <input type="text" name="nombre"/>
                </label>

                <label class="texlabel" >Correo:  
                    <input type="text" name="correoElectronico"/>
                </label>
                <!-- Sugurencias-->
                <label>Sugerencia
                    <input type="text" name="sugerencia"/>
                </label>
                <!--Radio-->
                <p>Seleccione idioma:</p>
                <label>
                    <input type="radio" name="idioma" value="espanol" /> Español
                </label>
                <label>
                    <input type="radio" name="idioma" value="ingles"/> Inglés
                </label>
                <!--Checkbox-->
                <p>Información a recibir:</p>
                <?php
                    foreach($arrayanimalesUsuario as $fila){ //fetch_array esto se recorrera hasta que no queden filas y devuelva false
                        // fetch_array() me devolvera un array de la fila donde este el puntero.
                        // Cada vez que se llama, avanza a la siguiente fila
                        echo '<label>';
                        echo '<input type="checkbox" name="animales[]" value="'.$fila['idAnimales'] .'"/>'.$fila['nombreAnimal'];
                        echo '</label>';
                    }
                ?>
                <!--Checkbox solo 1-->
                <p>Acepto los terminos y condiciones: </p>
                <label>
                    <input type="checkbox" name="terminosCondicones" value="1"/>Aceptar
                </label>
                <!--Select-->
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
            <img class="imagenesAnimales" src="img/losTres.png" alt="Los 3"/>
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