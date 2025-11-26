<?php
    /*El __DIR__ obtiene la ruta completa al directorio actual*/
	require_once __DIR__ . '/../modelo/Mboletin_Animales.php';
	
	$animalesUsuarios= new Boletin_animales();
	
	$arrayAnimalesUsuario = $animalesUsuarios->sacarUsuarioAnimal();
	
	// Mostrar la vista
	require_once __DIR__ . '/../vista/sacarInner.php';

?>
