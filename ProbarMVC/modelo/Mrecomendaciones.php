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
						$listaRecomendaciones=[];
						while($fila=$recomendacionArray->fetch_assoc()){
							$listaRecomendaciones[]=$fila;
						}
						return $listaRecomendaciones;
					}else{
						return 'No hay recomendaciones disponibles';//Retorno mensaje porque no hay filas;
					}	
				}catch(mysqli_sql_exception $e){
					switch ($e->getCode()) {
						case 1062:
							return 'Correo duplicado'; ///devuelvo el mensaje cual quiero monstrar  
						default:
							return '<h1>ERROR: ' . $e->getMessage() . '</h1>';
					}
				}
            }
        }
?>