<?php
require_once __DIR__ . '/../modelo/Mboletin_Usuario.php';
require_once __DIR__ . '/../modelo/Manimales.php';
require_once __DIR__ . '/../modelo/Mrecomendaciones.php';
require_once __DIR__ . '/../modelo/Mboletin_Animales.php';

class cRegistroUsuario {
    private $usuarioModelo;
    private $animalesModelo;
    private $recomendacionesModelo;
    private $boletinAnimalesModelo;
    //esta dos variables las uso para pasar el mensaje y la vista a cargar en el index.php
    public $mensaje = '';
    public $vistaCargar = '';

    public function __construct() {
        $this->usuarioModelo = new Boletin_Usuario();
        $this->animalesModelo = new Animales();
        $this->recomendacionesModelo = new Recomendaciones();
        $this->boletinAnimalesModelo = new Boletin_animales();
    }

    
    // metodo para mostrar el formulario de registro con los datos de recomendaciones y animales de mi BD
    public function monstrarFormularioRegistro() {
        //recoger los datos de recomendaciones y animales
        $arrayRecomendados = $this->recomendacionesModelo->recogerRecomendaciones();
        $arrayAnimales = $this->animalesModelo->recogerAnimales();
        $this->vistaCargar = 'indexServidor.php';
        // Devolver las variables con los nombres que la vista espera
        return [
            // nombre de todas las cosas que necesita la vista
            'arrayRecomendaciones' => $arrayRecomendados,
            'arrayanimalesUsuario' => $arrayAnimales
        ];
    }
    // Devuelve la lista de animales o establece mensaje en caso de fallo
    public function recibirAnimalesUsuario() {
        $lista = $this->animalesModelo->recogerAnimales();
        if (is_string($lista)) {
            // si es un string es que ha habido un error
            $this->vistaCargar = 'error.php';
            $this->mensaje = $lista;
            
        }
        return $lista;
    }

    // Devuelve la lista de recomendaciones o establece mensaje
    public function recibirRecomendaciones() {
        $lista = $this->recomendacionesModelo->recogerRecomendaciones();
        if (is_string($lista)) {
            $this->vistaCargar = 'error.php';
            $this->mensaje = $lista;
            
        }
        return $lista;
    }

    // Devuelve lista de usuarios
    public function monstrarUsuarioModificarBorrar() {
        $lista = $this->usuarioModelo->sacarUsuarios();
        if (is_string($lista)) {
            $this->vistaCargar = 'error.php';
            $this->mensaje = $lista;
            
        }
        $this->vistaCargar = 'monstrarModificarBorrar.php';
        return $lista;
    }

    // metodo para modificar el usuario
    public function modificar() {
    $usu = $_GET['idUsuario'];
    if (!$usu) {
        $this->vistaCargar = 'error.php';
        $this->mensaje = '<h1>Error: Falta el ID de usuario.</h1>';
        return false;
    }

    // Recoger los datos de recomendaciones y animales
    $arrayRecomendados = $this->recomendacionesModelo->recogerRecomendaciones();
    $arrayAnimales = $this->animalesModelo->recogerAnimales();
    
    //Recoger los datos del usuario
    $resultadoUsuario = $this->usuarioModelo->monstrarTodasCaracteristacasUsuario($usu);
    $arraiUsuario = null;
    
    $arraiUsuario = $resultadoUsuario->fetch_assoc(); 

    $this->vistaCargar = 'modificar.php';

    return [
        'usuario' => $arraiUsuario,
        'arrayRecomendaciones' => $arrayRecomendados,
        'arrayanimalesUsuario' => $arrayAnimales
    ];
}
    // metodo para confirmar el borrado
    public function confirmarBorrar() {
        $usu = $_GET['idUsuario'];
        $usuario = $this->usuarioModelo->sacarUsuarioSimple($usu);
        $this->vistaCargar = 'confirmarBorrar.php';
        return $usuario;
    }
    // metodo para borrar el usuario
    public function borrar() {
        $usu = $_GET['idUsuario'];
        $resultado = $this->usuarioModelo->borrarUsuario($usu);
        if (is_string($resultado)) {
            $this->vistaCargar = 'error.php';
            $this->mensaje = $resultado;
        }
        $this->vistaCargar = 'existo.php';
        $this->mensaje = '<h1>¡Usuario borrado correctamente!</h1>';
        
    }

    //metodo para la modificacion del usuario
    public function modificarFinal() {
        $errores = [];
        if (empty($_POST['nombre'])) {
            $errores[] = '<h1>El nombre no puede estar vacío.</h1>';
        }
        if (empty($_POST['correoElectronico'])) {
            $errores[] = '<h1>El correo electrónico no puede estar vacío.</h1>';
        }
        if (!isset($_POST['idioma'])) {
            $errores[] = '<h1>Debe seleccionar un idioma.</h1>';
        }
        if (!isset($_POST['animales']) || count($_POST['animales'])==0) {
            $errores[] = '<h1>Debe seleccionar al menos un animal.</h1>';
        }

        if (count($errores) > 0) {
            $this->vistaCargar = 'error.php';
            $this->mensaje = $errores;
            return false;
        }
        $usu = $_POST['idUsuario'];
        $resultado = $this->usuarioModelo->modificarUsuario($usu);
        if (is_string($resultado)) {
            $this->vistaCargar = 'error.php';
            $this->mensaje = $resultado;
            
        }
        $this->vistaCargar = 'existo.php';
        $this->mensaje = '<h1>¡Usuario modificado correctamente!</h1>';
        
    }

    // metodo para recibir los datos del formulario
    public function recibir() {
        $errores = [];
        if (empty($_POST['nombre'])) {
            $errores[] = '<h1>Se envió vacío el campo nombre</h1>';
            
        }
        if (empty($_POST['correoElectronico'])) {
            $errores[] = '<h1>Se envió vacío el campo correo electrónico</h1>';
        }
        $sugerencia = empty($_POST['sugerencia']) ? null : $_POST['sugerencia'];
        if (!isset($_POST['idioma'])) {
            $errores[] = '<h1>No ha seleccionado ningún idioma</h1>';
        }
        if (!isset($_POST['animales']) || count($_POST['animales']) == 0) {
            $errores[] = '<h1>No ha seleccionado ningún animal</h1>';
        }
        if (!isset($_POST['terminosCondicones'])) {
            $errores[] = '<h1>No has aceptados los terminos</h1>';
        }
        if (!isset($_POST['comoConocio'])) {
            $errores[] = '<h1>No ha seleccionado ninguna recomendación</h1>';
        }

        //si algo fallo de las validaciones de arriba
        if (count($errores) > 0) {
            $this->vistaCargar = 'error.php';
            $this->mensaje = $errores;
            return $errores;
        }

        $idUsu = $this->usuarioModelo->meterUsuario();
        if (is_string($idUsu)) {
            $this->vistaCargar = 'error.php';
            $this->mensaje = $idUsu;
            return $idUsu;
        }
        //si se ha creado el usuario correctamente
        if ($idUsu) {
            //recorro los animales seleccionados y los inserto en la tabla boletin_animales
            foreach ($_POST['animales'] as $valor) {
                $resultadoAnimal = $this->boletinAnimalesModelo->meterAnimalUsuario($idUsu, $valor);
                if (is_string($resultadoAnimal)) {
                        $this->vistaCargar = 'error.php';
                        $this->mensaje = $resultadoAnimal;
                        return $resultadoAnimal;
                }
            }
            $this->vistaCargar = 'existo.php';
            $this->mensaje = '<h1>¡Registro completado con éxito!</h1>';
            return $idUsu;
        }
        // Si llegamos aquí es porque no se creó el usuario entonces envio a la pgina de error
        $this->vistaCargar = 'error.php';
        $this->mensaje = '<h1>Ups algo fallo</h1>';
        return false;
    }
}


?>
