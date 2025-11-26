<?php
/*El __DIR__ obtiene la ruta completa al directorio actual*/
    require_once __DIR__ . '/../modelo/Mboletin_Usuario.php';
    $boletinUsuario= new Boletin_Usuario();
    $usu=$_GET['idUsuario'];
    $boletinUsuario->borrarUsuario($usu); 

    require_once __DIR__ . '/../vista/borrar.php';

?>