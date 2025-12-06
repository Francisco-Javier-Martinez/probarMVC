<?php
    require_once __DIR__ . '/conectar.php';//He decido usar require_once ya que si el fichero ha sido ya incluido evita la inclusión del mismo fichero y asi no me da errores como me estaba dando en varios sitios
    class Boletin_animales extends Conectar{
        public function meterAnimalUsuario($usuario,$animal){
			try{
				$sql="INSERT INTO boletin_animales (idUsuario, idAnimales) VALUES (".$usuario.",".$animal.");"; 
				//echo $sql
				$bien=$this->conexion->query($sql);
				if($bien && $this->conexion->affected_rows>0){
					return true;
				}else{
					return '<h1>No se pudo insertar el animal del usuario</h1>';
				}
			}catch(mysqli_sql_exception $e){
				switch ($e->getCode()) {
					case 1062:
						return '<h1>Correo duplicado</h1>'; ///devuelvo el mensaje cual quiero monstrar 
					default:
						return '<h1>ERROR: ' . $e->getMessage() . '</h1>';
				}
			}
        }
    }
?>