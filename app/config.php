<?php 
    //creamos constantes con los datos necesarios para ingresar a la DB
    define('NOMBRE_SERVIDOR', "localhost");
    define('NOMBRE_BD', "test");
    define('NOMBRE_USUARIO', "root");
    define('PASSWORD', "");
    //constante con el nombre de la pagina
    define('TITULO_PAGINA', "Project");
    //constante con la url base de la pagina
    define('SERVIDOR', "http://localhost/project/");
    //ubicacion de carpetas (dependencias)
    define('DEP_CSS', SERVIDOR . "public/css/");
    define('DEP_SCRIPT', SERVIDOR . "public/js/");
    define('DEP_IMG', SERVIDOR . "public/img/");
    define('CONTROLLER', SERVIDOR . "controller/");
    //dependencias archivos
    define('AUDIO', SERVIDOR . "public/files/audio/");
    define('DOC', SERVIDOR . "public/files/doc/");
    define('PDF', SERVIDOR . "public/files/pdf/");
    define('VIDEO', SERVIDOR . "public/files/video/");
    define('EXCEL', SERVIDOR . "public/files/xlsx/");
    //constante en caso de error
    define('error', "view/404");
    //este arreglo contiene todas las direcciones de la pagina
    define("direccion", array(
        'home' => 'view/home',
        'login' => 'view/login/login',
        'registro' => 'view/login/registro',
    ));
?>