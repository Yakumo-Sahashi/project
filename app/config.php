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
    define('DEP_CSS', SERVIDOR . "css/");
    define('DEP_SCRIPT', SERVIDOR . "js/");
    //constante en caso de error
    define('error', "view/404");
    //este arreglo contiene todas las direcciones de la pagina
    define("direccion", array(
        'home' => 'view/home',
        'login' => 'view/login/login',
        'registro' => 'view/login/registro',
    ));
?>