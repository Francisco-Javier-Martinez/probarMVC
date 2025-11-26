<?php
require_once __DIR__ . '/../modelo/Mrecomendaciones.php';
require_once __DIR__ . '/../modelo/Manimales.php';
require_once __DIR__ . '/../modelo/Mboletin_Usuario.php';


$recomendar = new Recomendaciones(); //instancio el objeto de Recomendaciones
$animal = new Animales(); //instanciar el objeto de animales
$usuario= new Boletin_Usuario();

$arrayRecomendados = $recomendar->recogerRecomendaciones(); //llamo a recogerRecomendaciones

$arrayAnimales = $animal->recogerAnimales(); //llamo a animales

//Recoger el id del usuario a modificar
$usu=$_GET['idUsuario'];
$arraiUsuario=$usuario->monstrarTodasCaracteristacasUsuario($usu);

require_once __DIR__ . '/../vista/modificar.php';
?>
