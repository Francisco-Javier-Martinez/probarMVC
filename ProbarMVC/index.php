<?php
    // Cargar configuración de base de datos y rutas
    require_once __DIR__ . '/Config/configBD.php';
    require_once __DIR__ . '/Config/configRT.php';

    // recoger el controlador y el metodo con valores por defecto desde configRT
    $controlador = $_GET['c'] ?? CONTROLADORDEF;
    $metodo = $_GET['m'] ?? METODODEF;

    // incluir el archivo del controlador , concatenando la ruta 
    $rutaControlador = __DIR__ . '/controlador/c' . $controlador . '.php';

    //aqui si la ruta no existe le digo que muera con el die para que no siga ejecutandose
    if (!file_exists($rutaControlador)) {
        die("Error: Controlador no encontrado en $rutaControlador");
    }
    //incluyo el controlador
    require_once $rutaControlador;

    //Concateno con c porque mis controladores aunque solo tenga 1 ahora empiezan con c si tuviese la gestion de otro cosa empezaria con c tambien
    $nombreControlador = 'c' . $controlador;
    $controladorObjeto = new $nombreControlador();

    // llamar al metodo del controlador
    //$datos va a tener todo lo que me devuelva el metodo del controlador que he llamado
    $datos = $controladorObjeto->$metodo();

    // determinar la vista a cargar
    $vista = $controladorObjeto->vistaCargar;
    //mensaje
    $mensaje = $controladorObjeto->mensaje;

    // cargar la vista
    $rutaVista = __DIR__ . '/vista/' . $vista;
    require_once $rutaVista;
?>