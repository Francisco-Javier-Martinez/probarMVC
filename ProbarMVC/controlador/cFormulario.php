<?php
    /*El __DIR__ obtiene la ruta completa al directorio actual*/
    require_once __DIR__ . '/../modelo/Mrecomendaciones.php';//He decido usar require_once ya que si el fichero ha sido ya incluido evita la inclusión del mismo fichero y asi no me da errores como me estaba dando en varios sitios
    require_once __DIR__ . '/../modelo/Manimales.php';

    $recomendar = new Recomendaciones(); //instancio el objeto de Recomendaciones
    $animal = new Animales(); //instanciar el objeto de animales
    $arrayRecomendados = $recomendar->recogerRecomendaciones(); //llamo a recogerRecomendaciones

    $arrayAnimales = $animal->recogerAnimales(); //llamo a animales

    require_once __DIR__ . '/../vista/indexServidor.php'; //incluyo la vista
?>