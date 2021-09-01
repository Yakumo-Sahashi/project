<?php
    class Redireccion{
        static function redirigir($url){
            header('location:' . $url);
			exit();
        }
    }

?>