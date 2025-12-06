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
					while($fila=$animales->fetch_assoc()){
						$listaAnimales[]=$fila;
					}
					return $listaAnimales;
				}else{
						return '<h1>No hay animales disponibles</h1>'; ///devuelvo el mensaje cual quiero monstrar 
				}
				
			}catch(mysqli_sql_exception $e){
				switch ($e->getCode()) {
					case 1146:
							return '<h1>La tabla no existe</h1>'; ///devuelvo el mensaje cual quiero monstrar 
					case 1064:
							return '<h1>Error de sintaxis en la consulta SQL</h1>'; ///devuelvo el mensaje cual quiero monstrar 
					default:
							return '<h1>ERROR: ' . $e->getMessage() . '</h1>';
				}
			}
        }
    }
?>