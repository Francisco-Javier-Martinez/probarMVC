<?php
//El __DIR__ obtiene la ruta completa al directorio actual
    require_once __DIR__ . '/../modelo/Mboletin_Usuario.php';
    require_once __DIR__ . '/../modelo/Manimales.php';
    require_once __DIR__ . '/../modelo/Mrecomendaciones.php';
    require_once __DIR__ . '/../modelo/Mboletin_Animales.php';
class ControladorUsuario{
    // Declaramos las propiedades de las instancias de los Modelos
    private $usuarioModelo;
    private $animalesModelo;
    private $recomendacionesModelo;
    private $boletinAnimalesModelo;
    //Para ya tenerlas inicializadas me creo un constructor y asi no tengo que ponerlo todo el rato
    public function __construct() {
        $this->usuarioModelo=new Boletin_Usuario();
        $this->animalesModelo=new Animales();
        $this->recomendacionesModelo=new Recomendaciones();
        $this->boletinAnimalesModelo=new Boletin_animales();
    }
    public function formularioRegistro(){
        $arrayRecomendados=$this->recomendacionesModelo->recogerRecomendaciones();
        //Pregunto si lo que viene del metodo es un string porque si lo es
        //Significa que lo que me ha llegado es un mensaje de error del modelo asi que
        //llamo a la vista de erro y muesntro el mensaje con el enlace para ir patras
        if(is_string($arrayRecomendados)){
            $mensaje=$arrayRecomendados;
            $enlace_volver='./index.php';
            require_once __DIR__ . '/../vista/error.php';
        }
        $arrayAnimales=$this->animalesModelo->recogerAnimales();
        //Pregunto si lo que viene del metodo es un string porque si lo es
        //Significa que lo que me ha llegado es un mensaje de error del modelo asi que
        //llamo a la vista de erro y muesntro el mensaje con el enlace para ir patras
        // asi todo rato en los deams
        if(is_string($arrayAnimales)){
            $mensaje=$arrayAnimales;
            $enlace_volver='./index.php';
            require_once __DIR__ . '/../vista/error.php';
        }
        require_once __DIR__ . '/../vista/indexServidor.php';
    }
    public function sacarInner(){
        // Usamos la instancia creada en el constructor
        $arrayAnimalesUsuario=$this->boletinAnimalesModelo->sacarUsuarioAnimal();
        if(is_string($arrayAnimalesUsuario)){
            $mensaje=$arrayAnimalesUsuario;
            $enlace_volver='./cSacarInner.php';
            require_once __DIR__ . '/../vista/error.php';
        }
        // Mostrar la vista
        require_once __DIR__ . '/../vista/sacarInner.php';
    }
    public function monstrarUsuarioModificarBorrar(){
        $listaUsuarios=$this->usuarioModelo->sacarUsuarios();
        if(is_string($listaUsuarios)){
            $mensaje=$listaUsuarios;
            $enlace_volver='./index.php';
            require_once __DIR__ . '/../vista/error.php';
        }
        require_once __DIR__ . '/../vista/monstrarModificarBorrar.php';
    }
    public function modificar(){
        $arrayRecomendados=$this->recomendacionesModelo->recogerRecomendaciones();
        $arrayAnimales=$this->animalesModelo->recogerAnimales();
        // Recoger el id del usuario a modificar
        $usu=$_GET['idUsuario'];
        $arraiUsuario=$this->usuarioModelo->monstrarTodasCaracteristacasUsuario($usu);
        require_once __DIR__ . '/../vista/modificar.php';
    }
    public function confirmarBorrar(){
        $usu=$_GET['idUsuario'];
        $arraiUsuario=$this->usuarioModelo->monstrarTodasCaracteristacasUsuario($usu);
        require_once __DIR__ . '/../vista/confirmarBorrar.php';
    }
    public function borrar(){
        $usu=$_GET['idUsuario'];
        $resultado = $this->usuarioModelo->borrarUsuario($usu);
        if(is_string($resultado)){
            $mensaje=$resultado;
            $enlace_volver='./cMostrar.php';
            require_once __DIR__ . '/../vista/error.php';
        }
        require_once __DIR__ . '/../vista/borrar.php'; 
    }
    public function modificarFinal(){
        $mensaje = '';
        $enlace_volver = './cMostrar.php';
        if(!isset($_POST['idioma']) || !isset($_POST['animales'])){
            $mensaje = '<h1>Debe seleccionar un idioma y al menos un animal</h1>';
            require_once __DIR__ . '/../vista/error.php';
        }else{
            $usu=$_POST['idUsuario'];
            $resultado=$this->usuarioModelo->modificarUsuario($usu);
            if(is_string($resultado)){
                $mensaje = $resultado;
                require_once __DIR__ . '/../vista/error.php';
            }
            $mensaje='<h1>¡Usuario modificado correctamente!</h1>';
            require_once __DIR__ . '/../vista/existo.php';
        }
    }
    public function recibir(){
    $error=false; 
    $mensaje2=[];
    $enlace_volver='./index.php';
    if (empty($_POST['nombre'])) {
        $mensaje2[]='<h1>Se envió vacío el campo nombre</h1>';
        $error=true;
    }

    if (empty($_POST['correoElectronico'])) {
        $mensaje2[]='<h1>Se envió vacío el campo correo electrónico</h1>';
        $error=true;
    }
    
    // Convertido el ternario a if/else
    if(empty($_POST['sugerencia'])){
        $sugerencia=null;
    }else{
        $sugerencia=$_POST['sugerencia'];
    }

    if (!isset($_POST['idioma'])) {
        $mensaje2[]='<h1>No ha seleccionado ningún idioma</h1>';
        $error=true;
    }

    if (!isset($_POST['animales']) || count($_POST['animales'])==0) {
        $mensaje2[]='<h1>No ha seleccionado ningún animal</h1>';
        $error=true;
    }

    if (!isset($_POST['terminosCondicones'])) {
        $mensaje2[]='<h1>No has aceptados los terminos</h1>';
        $error=true;
    }

    if (!isset($_POST['comoConocio'])) {
        $mensaje2[]='<h1>No ha seleccionado ninguna recomendación</h1>';
        $error=true;
    }
    if ($error) {
        require_once __DIR__ . '/../vista/error.php';
    }else{
            $idUsu=$this->usuarioModelo->meterUsuario();
            if(is_string($idUsu)){
                $mensaje = $idUsu;
                require_once __DIR__ . '/../vista/error.php';
                return;
            }
            if($idUsu){ 
                foreach($_POST['animales'] as $valor){ 
                    $resultadoAnimal = $this->boletinAnimalesModelo->meterAnimalUsuario($idUsu,$valor);
                    if(is_string($resultadoAnimal)){
                        $mensaje = $resultadoAnimal;
                        $enlace_volver = './index.php';
                        require_once __DIR__ . '/../vista/error.php';
                        return;
                    }
                }
                $mensaje='<h1>¡Todo correcto!</h1>';
                require_once __DIR__ . '/../vista/existo.php';
            }else{
                $mensaje='<h1>Ups algo fallo</h1>';
                require_once __DIR__ . '/../vista/error.php';
            }
        }
    }
}


?>