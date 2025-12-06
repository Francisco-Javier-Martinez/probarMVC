<?php
	require_once __DIR__ . '/../Config/configBD.php';
	class Conectar{
		protected $conexion;
		
		public function __construct(){
			try{
				$this->conexion= new mysqli(SERVIDOR,USUARIO,PASSWORD,BBDD);
			}catch(mysqli_sql_exception $e){
				if($e->getCode()==2002){
					echo 'Error al conectar';
				}
				if($e->getCode()==1049){
					echo 'Error: no se encuentra la base de datos';
				}
			}
		}
		
		public function __destruct(){
			$this->conexion->close();
		}
	}
	
	
?>