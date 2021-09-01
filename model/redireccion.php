<?php
    class Redireccion{
        //funcion encargada de redirigir al usuario a una url que recibe
        static function redirigir($url){
            header('location:' . $url);//redirige a una pagina por medio de una url
			exit();//finaliza el proceso despues de redirigir
        }
    }

?>