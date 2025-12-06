<?php
require_once __DIR__ . '/conectar.php';//He decido usar require_once ya que si el fichero ha sido ya incluido evita la inclusión del mismo fichero y asi no me da errores como me estaba dando en varios sitios

class Boletin_Usuario extends Conectar{
    // Inserta un usuario y devuelve el id insertado
    public function meterUsuario(){
        try{
			//Recojo los datos del formulario
			$nombre=$_POST['nombre'];
			$correo=$_POST['correoElectronico'];
			$idioma=$_POST['idioma'];
			$idRecomendacion=$_POST['comoConocio'];
			$sugerencia=$_POST['sugerencia'];
			//Voy a preguntar si es null si lo es guardare "NULL" entre comillas 
			// doble para que se guarde el valor null en la BD 
			//Si no voy a concatenar sugerencia y asi me ahorro hacer dos insert into
			if($sugerencia!=null){
				$sugerencia="'".$sugerencia."'";
			}else{
				$sugerencia="NULL";
			}
			
			//Consulta de introduccion
			$sql="insert into boletin_usuario (nombreUsuario,correo,idioma,
			idRecomendacion,sugerencias) values('".$nombre."','".$correo."','".$idioma."',".$idRecomendacion.",".$sugerencia.");";
			//echo $sql;
			$bien=$this->conexion->query($sql);//Ejecuto la query
			//Si sale bien uso insert_id para sacar el id para poder hacer la introduccion de animales y usuarios
			//Y hay filas afectadas
			if($bien && $this->conexion->affected_rows>0){
				$idInsertado=$this->conexion->insert_id;
				return $idInsertado;
			}else{
				return false;
			}
		}catch(mysqli_sql_exception $e){
			switch ($e->getCode()) { 
				case 1062:
					return 'Correo duplicado';
				default:
					return 'ERROR: ' . $e->getMessage();
			}
		}
    }

	public function sacarUsuarios(){
		try{
			$sql="SELECT * from boletin_usuario;";
			$usuarios=$this->conexion->query($sql);
			if($usuarios->num_rows>0){
				return $usuarios;
				}else{
					return 'No hay registro de usuario disponibles';
				}

		}catch(mysqli_sql_exception $e){
				return 'Error:'.$e->getCode().' - '. $e->getMessage();
			}
	}

	public function borrarUsuario($usu){
		try{
			$sql="DELETE from boletin_usuario WHERE idUsuario=$usu;";
			$this->conexion->query($sql);
			if($this->conexion->affected_rows>0){
				return true;
			}
			return 'No se pudo borrar el usuario';
		}catch(mysqli_sql_exception $e){
			return 'Error:'.$e->getCode().' - '.$e->getMessage();
		}
	}
	
	public function sacarUsuarioSimple($usu){
    try{
        $sql="SELECT idUsuario, nombreUsuario, correo from boletin_usuario WHERE idUsuario=$usu;";
        $resultado=$this->conexion->query($sql);
        
        if($resultado->num_rows == 1){
            return $resultado->fetch_assoc();
        }
        return null;
	}catch(mysqli_sql_exception $e){
		return 'Error:'.$e->getCode().' - '.$e->getMessage();
	}
}
	public function monstrarTodasCaracteristacasUsuario($usu){
		try{
			$sql="SELECT * from boletin_usuario WHERE idUsuario=$usu;";
			$usuario=$this->conexion->query($sql);
			

			if($usuario->num_rows>0){
				return $usuario;
				}else{
					return 'No hay registro de usuario disponibles';
				}

		}catch(mysqli_sql_exception $e){
				return 'Error:'.$e->getCode().' - '. $e->getMessage();
			}
	}
	public function modificarUsuario($usu){
		try{
			//Pongo todos los campos aun que no se modifiquen todos porque de esta forma me aseguro que se actualicen todos los campos
			//Recojo los datos del formulario
			$nombre=$_POST['nombre'];
			$correo=$_POST['correoElectronico'];
			$idioma=$_POST['idioma'];
			$idRecomendacion=$_POST['comoConocio'];
			$sugerencia=$_POST['sugerencia'];

			if($sugerencia!=null){
				$sugerencia="'".$sugerencia."'";
			}else{
				$sugerencia="NULL";
			}
			//Consulta de modificacion
			$sql="UPDATE boletin_usuario SET nombreUsuario='".$nombre."', correo='".$correo."', idioma='".$idioma."', idRecomendacion=".$idRecomendacion.", sugerencias=".$sugerencia." WHERE idUsuario=".$usu.";";
			$sql2="DELETE FROM boletin_animales WHERE idUsuario=".$usu.";";
			//Ejecuto la query
			$this->conexion->query($sql2);
			
			//si es correcta la modificacion el usuario abra sido modificado
			if($this->conexion->query($sql)){
				if(isset($_POST['animales'])){
					$animales=$_POST['animales'];
					//Ahora hago la insercion de los animales seleccionados
					foreach($animales as $animal){
						$sqlAnimales="INSERT INTO boletin_animales (idUsuario,idAnimales) VALUES (".$usu.",".$animal.");";
						$this->conexion->query($sqlAnimales);
					}
				}else{
					return 'Usuario modificado pero tuvimos problemas al registrar los animales. Revise.';
				}
			}
			return true;
		}catch(mysqli_sql_exception $e){
			return 'Error:'.$e->getCode().' - '.$e->getMessage();
		}
	}
}
?>