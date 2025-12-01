<?php
require_once __DIR__ . '/controlador/controladorUsuario.php';
$controlador = new ControladorUsuario();
$arraiUsuario= $controlador->confirmarBorrar();
require_once __DIR__ . '/vista/confirmarBorrar.php';
?>
