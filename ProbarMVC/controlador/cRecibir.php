<?php
    require_once __DIR__ . '/../modelo/Mboletin_Usuario.php';//He decido usar require_once ya que si el fichero ha sido ya incluido evita la inclusión del mismo fichero y asi no me da errores como me estaba dando en varios sitios
    require_once __DIR__ . '/../modelo/Mboletin_Animales.php';
    
    $error = false; //Variable para poder sabir si dejo algo vacio o sin rellenar
    $usuarios = new Boletin_Usuario(); //Estancio el objeto Boletin_Usuario
    $animalUsuario = new Boletin_animales(); //Estancio el objeto Boletin_animal
    $mensaje = '';
    $mensaje2 = [];
    if (empty($_POST['nombre'])) {
        $mensaje2[] = '<h1>Se envió vacío el campo nombre</h1>';
        $error = true;
    }

    if (empty($_POST['correoElectronico'])) {
        $mensaje2[] = '<h1>Se envió vacío el campo correo electrónico</h1>';
        $error = true;
    }
    //Aqui voy a usar una variable porque la manejo mejor si esta vacio guardare el valor null si no el texto
    if(empty($_POST['sugerencia'])){
        $sugerencia=null;
    }else{
        $sugerencia=$_POST['sugerencia'];
    }

    if (!isset($_POST['idioma'])) {
        $mensaje2[] = '<h1>No ha seleccionado ningún idioma</h1>';
        $error = true;
    }

    if (!isset($_POST['animales']) || count($_POST['animales'])== 0) {
        $mensaje2[] = '<h1>No ha seleccionado ningún animal</h1>';
        $error = true;
    }

    if (!isset($_POST['terminosCondicones'])) {
        $mensaje2[] = '<h1>No has aceptados los terminos</h1>';
        $error = true;
    }

    if (!isset($_POST['comoConocio'])) {
        $mensaje2[] = '<h1>No ha seleccionado ninguna recomendación</h1>';
        $error = true;
    }

    if ($error) {
        $enlace_volver = '../index.php';
        require_once __DIR__ . '/../vista/error.php';
    }else{
		$idUsu = $usuarios->meterUsuario();
		if($idUsu){ // si el id insertado seguimos
			foreach($_POST['animales'] as $valor){ //Realizo un foreach de los animales repitiendo la consulta por cada animal que haya recibido
			$animalUsuario->meterAnimalUsuario($idUsu,$valor); //Llamo a meter animal
		}
		$mensaje = '<h1>¡Todo correcto!</h1>';
		$enlace_volver = '../index.php';
		require_once __DIR__ . '/../vista/existo.php';
		}else{
			$mensaje = '<h1>Ups algo fallo</h1>';
			$enlace_volver = '../index.php';
			require_once __DIR__ . '/../vista/error.php';
		}
	}
?>