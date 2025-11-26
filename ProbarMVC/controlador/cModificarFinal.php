<?php
    /*El __DIR__ obtiene la ruta completa al directorio actual*/

    require_once __DIR__ . '/../modelo/Mboletin_Usuario.php';
    $usuario = new Boletin_Usuario();
    $mensaje = '';
    
    if(!isset($_POST['idioma'])){
        $mensaje = '<h1>Debe seleccionar un idioma</h1>';
        $enlace_volver = 'cMostrar.php';
        require_once __DIR__ . '/../vista/error.php';
    }elseif(!isset($_POST['animales'])){
        $mensaje = '<h1>Debe seleccionar al menos un animal</h1>';
        $enlace_volver = 'cMostrar.php';
        require_once __DIR__ . '/../vista/error.php';
    }else{
        $usu = $_POST['idUsuario'];
        $usuario->modificarUsuario($usu);
        $mensaje = '<h1>¡Usuario modificado correctamente!</h1>';
        $enlace_volver = 'cMostrar.php';
        require_once __DIR__ . '/../vista/existo.php';
    }

?>
