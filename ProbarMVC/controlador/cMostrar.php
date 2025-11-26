<?php
require_once __DIR__ . '/../modelo/Mboletin_Usuario.php';

$usuario = new Boletin_Usuario();
$listaUsuarios = $usuario->sacarUsuarios();

require_once __DIR__ . '/../vista/monstrarModificarBorrar.php';
?>
