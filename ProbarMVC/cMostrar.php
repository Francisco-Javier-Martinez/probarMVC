<?php
require_once __DIR__ . '/controlador/controladorUsuario.php';
$controlador = new ControladorUsuario();
$listaUsuarios=$controlador->monstrarUsuarioModificarBorrar();
require_once __DIR__ . '/vista/monstrarModificarBorrar.php';
?>
