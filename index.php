<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'app/config.php'?>
    <?php require_once 'app/dependencias.php';?>
</head>
<body>
    <?php 
        require_once 'view/navbar.php';
        if(isset($_GET['view'])){
            $view = explode("/", $_GET['view']);
            $url = count($view) < 2 ? (array_key_exists($view[0], direccion) ? direccion[$view[0]] : error) : error;
            require_once $url . '.php';
        }else{
            require_once direccion['home'] . '.php';
        }
    ?>
    <title><?= $titulo = $title == '' ? TITULO_PAGINA : $title;?></title>
</body>
</html>