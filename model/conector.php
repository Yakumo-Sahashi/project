<?php 
    require_once '../app/config.php';

    class Conector {
        //se cre una variable estatica para no hacer una nueva conexion mas adelante
        private static $conexion;
        //funcion la cual crea la conexion a la DB
        public static function abrir_conexion(){
            //validamos que la conexion no este definida
            //para acceder a elementos de tipo estatico utilizamos self::$conexion
            if(!isset(self::$conexion)){
                try{//try catch para atrapar algun error      
                    //creamos un nuevo objeto apartir de la clase PDO      
                    self::$conexion = new PDO('mysql:host=' . NOMBRE_SERVIDOR . '; dbname=' . NOMBRE_BD, NOMBRE_USUARIO, PASSWORD);
                    //se muestran los errores con la base de datos ya que PDO no lo hace por defecto
                    //ERRMODE modo de errores
                    self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //realizamos la primer instruccion o consulta a la DB
                    //sele dice a la DB que utilize los caracteres utf8 (español con acentos)
                    self::$conexion -> exec('SET CHARACTER SET utf8');

                } catch (PDOException $e) {
                    //mostramos los errores en el supuesto de tenerlos
                    echo "Error de conexion :" . $e;
                    //finalizamos la conexion
					die();
                }
            }

        }
        //funcion para finalizar la conexion a la DB
        public static function cerrar_conexion(){
            //validamos que exista una conexion
			if(isset(self::$conexion)){
                //asignamos valor nulo a la conexion para evitar 
				self::$conexion = null;			
			}
		}

        //funcion para obtener la conexion fuera de la clase
        public static function obtener_conexion(){
			return self::$conexion;
		}
    }

?>