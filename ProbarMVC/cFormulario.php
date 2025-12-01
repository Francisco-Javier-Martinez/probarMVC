<?php
require_once __DIR__ . '/controlador/controladorUsuario.php';
$controlador = new ControladorUsuario();
$arrayanimalesUsuario = $controlador->recibirAnimalesUsuario();
$arrayRecomendaciones = $controlador->recibirRecomendaciones();
require_once __DIR__ . '/vista/indexServidor.php';
?>
