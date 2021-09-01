<?php 
    define('NOMBRE_SERVIDOR', "localhost");
    define('NOMBRE_BD', "test");
    define('NOMBRE_USUARIO', "root");
    define('PASSWORD', "");

    define('TITULO_PAGINA', "Project");

    define('SERVIDOR', "http://localhost/project/");
    
    define('DEP_CSS', SERVIDOR . "css/");
    define('DEP_SCRIPT', SERVIDOR . "js/");

    define('error', "view/404");
    define("direccion", array(
        'home' => 'view/home',
        'login' => 'view/login/login',
        'registro' => 'view/login/registro',
    ));
?>