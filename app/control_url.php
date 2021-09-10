<?php 
    if(isset($_GET['view'])){//verificamos que la url tenga algo
        $view = explode("/", $_GET['view']);//separamos los valores de la url apartir de / y obtenemos un arreglo
        //el primer operador ternario comprueba la longitud del arreglo obtenido anteriormente
        //el segundo verifica la existencia de una key en el arreglo asociativo direccion
        //en caso de cumplirse las condiciones podremos ver la pagina solicida de lo contrario error 404
        $url = count($view) < 2 ? (array_key_exists($view[0], direccion) ? direccion[$view[0]] : error) : error;
        //añadimos el bloque de codigo correspondiente (vista)
        require_once $url . '.php';
    }else{
        //en caso de que la url no contenga una vista especifica se mostrara el home
        require_once direccion['home'] . '.php';
    }
?>

<title><?= $titulo = !isset($title) ? TITULO_PAGINA : $title;?></title>