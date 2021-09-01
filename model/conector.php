<?php 
    require_once '../app/config.php';

    class Conector {

        private static $conexion;

        public static function abrir_conexion(){

            if(!isset(self::$conexion)){
                try{
            
                    self::$conexion = new PDO('mysql:host=' . NOMBRE_SERVIDOR . '; dbname=' . NOMBRE_BD, NOMBRE_USUARIO, PASSWORD);
                    
                    self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    self::$conexion -> exec('SET CHARACTER SET utf8');

                } catch (PDOException $e) {
                    echo "Error de conexion :" . $e;
                }
            }

        }

        public static function cerrar_conexion(){
			if(isset(self::$conexion)){
				self::$conexion = null;			
			}
		}

        public static function obtener_conexion(){
			return self::$conexion;
		}
    }

?>