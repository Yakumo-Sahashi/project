<?php 
    require_once 'conector.php';
    require_once 'sesion.php';
    session_start();

    $login = new Login();

    if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
        Conector::abrir_conexion();
        echo $login -> iniciar_sesion(Conector::obtener_conexion());
    }

    if($_POST['funcion'] == 3){
        Conector::abrir_conexion();
        echo $login -> cerrar_sesion(Conector::obtener_conexion());
    }
    
    class Login {

        function iniciar_sesion($conexion){
            
            $resultado = $this->verificacion_acceso($conexion);
        
            if ($resultado && password_verify($_POST['password'], $resultado['password'])) {
                Sesion::crear_sesion($resultado);  
                $this -> actualizar_estado($conexion, $resultado['idUsuario'], "conectado");
                echo "2";
            }else {
                echo "1";	
            } 
            Conector::cerrar_conexion();
        }

        function verificacion_acceso($conexion){
            $consulta = $conexion->prepare("SELECT * FROM t_usuario WHERE usuario=:usuario");
            $consulta -> bindParam(':usuario', $_POST['usuario']);
            $consulta -> execute();        
            return $consulta -> fetch(PDO::FETCH_ASSOC);
        }

        function actualizar_estado($conexion, $id, $estado){
            $sql = $conexion -> prepare("UPDATE t_usuario SET estado= :estado WHERE idUsuario = :idUsuario");
            $sql -> bindParam(':estado',$estado);
            $sql -> bindParam(':idUsuario',$id);
            $sql -> execute();
        }

        function cerrar_sesion($conexion){
            $this -> actualizar_estado($conexion, $_SESSION['user']['idUsuario'], "desconectado");
            Sesion::destruir_sesion();     
            Conector::cerrar_conexion();     
            echo "2";
        }
    }
?>