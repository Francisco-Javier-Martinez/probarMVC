<?php
    //datos de conesion
    require_once __DIR__ . '/conectar.php';//He decido usar require_once ya que si el fichero ha sido ya incluido evita la inclusión del mismo fichero y asi no me da errores como me estaba dando en varios sitios
    class Recomendaciones extends Conectar{
        public function recogerRecomendaciones(){
				try{
					$sql='select * from recomendaciones';//select para recoger los datos
					//echo $sql;
					$recomendacionArray=$this->conexion->query($sql);
					if($recomendacionArray->num_rows>0){
						return $recomendacionArray;//si hay filas devuelbo array de objetos
					}else{
						return null;//Retorno null porque no hay filas;
					}	
				}catch(mysqli_sql_exception $e){
					switch ($e->getCode()) {
						case 1146:
							echo '<h1>La tabla no existe</h1>';
							return null; 
						case 1062:
							echo '<h1>Correo duplicado</h1>';
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