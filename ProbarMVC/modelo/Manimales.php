<?php
    require_once __DIR__ . '/conectar.php'; //He decido usar require_once ya que si el fichero ha sido ya incluido evita la inclusión del mismo fichero y asi no me da errores como me estaba dando en varios sitios

    class Animales extends Conectar{
        public function recogerAnimales(){
            try{
				//consulta
				$sql="SELECT * FROM animales;";
				//echo $sql;
				$animales=$this->conexion->query($sql);
				if($animales->num_rows>0){ //si hay filas pa lante
					return $animales;
				}else{
					return null;
				}
				
			}catch(mysqli_sql_exception $e){
				switch ($e->getCode()) {
					case 1146:
						echo '<h1>La tabla no existe</h1>';
						return null; 
					case 1064:
						echo '<h1>Error de sintaxis en la consulta SQL</h1>';
						return null;
					default:
						echo '<h1>ERROR: ' . $e->getMessage() . '</h1>';
						return null;
				}
			}
        }
    }
?>