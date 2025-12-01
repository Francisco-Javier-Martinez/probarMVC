<?php
	require_once __DIR__ . '/../configBD.php';
	class Conectar{
		protected $conexion;
		
		public function __construct(){
			try{
				$this->conexion= new mysqli(SERVIDOR,USUARIO,PASSWORD,BBDD);
			}catch(mysqli_sql_exception $e){
				if($e->getCode()==2002){
					echo '<h1>Erro al conectar</h1>';
				}
				if($e->getCode()==1049){
					echo '<h1>Error no se encontra la bd</h1>';
				}
			}
		}
		
		public function conectar(){
			return $this->conexion;
		}
		
		public function __destruct(){
			$this->conexion->close();
		}
	}
	
	
?>