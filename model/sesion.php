<?php 
    session_start();

    class Sesion{

        static function crear_sesion($datos_sesion){
            $_SESSION['user'] = $datos_sesion;  
        }

        static function destruir_sesion(){
            session_unset();
            session_destroy();
        }

        static function validar_sesion(){
            return isset($_SESSION['user']['usuario']) ? true : false;
        }

        static function obtener_sesion(){
            $boton_sesion = isset($_SESSION['user']['usuario']) ? 
            '<button class="btn btn-primary"><i class="fas fa-user mr-1"></i> '.$_SESSION['user']['usuario'].'</button>
            <button class="btn btn-outline-danger" type="button" id="btnCerrarSesion"><i class="fas fa-power-off mr-1"></i> Cerrar Sesion</button>'
            : '<a class="btn btn-primary" href="login"><i class="fas fa-user mr-1"></i> Iniciar Sesion</a>';

            return $boton_sesion;
        }

    }


?>