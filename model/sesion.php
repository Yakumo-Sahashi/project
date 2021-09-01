<?php 
    //llamamos a la funcion session_start() para poder trabajar con las variables de de sesion
    session_start();

    class Sesion{
        //funcion para crear una sesion. recibe como parametros un array asociativo
        static function crear_sesion($datos_sesion){
            //creacion del arreglo de sesion user
            $_SESSION['user'] = $datos_sesion;  
        }
        //funcion para destruir las variables de sesion
        static function destruir_sesion(){
            session_unset();//Libera todas las variables de sesion
            session_destroy();//Destruye toda la información registrada de una sesion
        }
        //funcion para verificar si existe una sesion
        static function validar_sesion(){
            return isset($_SESSION['user']['usuario']) ? true : false;
        }
        //funcion para mostrar un boton en el navbar dependiendo de la existencia de una sesion.
        static function obtener_sesion(){
            //operador ternario para mostrar un boton especifico
            $boton_sesion = isset($_SESSION['user']['usuario']) ? 
            '<button class="btn btn-primary"><i class="fas fa-user mr-1"></i> '.$_SESSION['user']['usuario'].'</button>
            <button class="btn btn-outline-danger" type="button" id="btnCerrarSesion"><i class="fas fa-power-off mr-1"></i> Cerrar Sesion</button>'
            : '<a class="btn btn-primary" href="login"><i class="fas fa-user mr-1"></i> Iniciar Sesion</a>';
            //retornamos el boton a mostrar
            return $boton_sesion;
        }

    }


?>