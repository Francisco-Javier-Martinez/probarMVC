<?php
/*El __DIR__ obtiene la ruta completa al directorio actual*/
require_once __DIR__ . '/../modelo/Mboletin_Usuario.php';

$usu=$_GET['idUsuario'];
$usuario = new Boletin_Usuario();
$arraiUsuario=$usuario->monstrarTodasCaracteristacasUsuario($usu);


require_once __DIR__ . '/../vista/confirmarBorrar.php';
?>
