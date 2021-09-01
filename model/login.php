<?php 
    require_once 'conector.php';
    require_once 'sesion.php';
    session_start();
    //creamos un nuevo objeto apartir de la clase Login
    $login = new Login();
    //varificamos que los campos de usuario y password no lleguen vacios
    if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
        //abrimos la conexion a la DB con la funcion abrir_conexion de la clase Conector
        Conector::abrir_conexion();
        //imprimimos el resultado de la funcion iniciar_sesion
        //sele pasa como parametro la conexion
        echo $login -> iniciar_sesion(Conector::obtener_conexion());
    }
    //validacion que la accion solicitada sea la correcta
    if($_POST['funcion'] == 3){
        //iniciamos la conexion a la DB
        Conector::abrir_conexion();
        //imprimimos el resultado de la funcion cerrar_sesion
        echo $login -> cerrar_sesion(Conector::obtener_conexion());
    }
    
    class Login {
        //funcion para inicar sesion recibe como para metros la conexion a la DB
        function iniciar_sesion($conexion){
            //llamamos a la funcion verificacion_acceso para obtener los datos del usuario
            $resultado = $this->verificacion_acceso($conexion);
            //validamos que exista el usuario y en caso de encontrarlo comparamos password ingresado con el de la DB
            if ($resultado && password_verify($_POST['password'], $resultado['password'])) {
                //por medio de la clase sesion accedemos a los elementos de la mismo
                //llamamos a la funcion crear_sesion y le entregamos como parametros los datos del usuario obtenidos de la DB
                //usamos Sesion:: porque la clase y funciones invocadas no pertenecen a la misma clase
                Sesion::crear_sesion($resultado);  
                //llamamos la funcion actualizar_estado para modificar el estado del usuario en la DB
                $this -> actualizar_estado($conexion, $resultado['idUsuario'], "conectado");
                //regresamos como respuesta 2 para que ajax lo reciba
                echo "2";
            }else {
                echo "1";	
            } 
            //finalizamos la conexion a la DB
            Conector::cerrar_conexion();
        }

        function verificacion_acceso($conexion){
            //realizamos consultas preparadas para obtener los datos deseados
            $consulta = $conexion->prepare("SELECT * FROM t_usuario WHERE usuario=:usuario");
            //con bindParam vinculamos un parametro con una variable especifica
            $consulta -> bindParam(':usuario', $_POST['usuario']);
            //ejecutamos el query
            $consulta -> execute();    
            //retornamos los datos obtenidos de la consulta+
            //obtenemos un arreglo asociativo    
            return $consulta -> fetch(PDO::FETCH_ASSOC);
        }

        function actualizar_estado($conexion, $id, $estado){
            //realizamos consultas preparadas para actualizar los datos deseados
            $sql = $conexion -> prepare("UPDATE t_usuario SET estado= :estado WHERE idUsuario = :idUsuario");
            $sql -> bindParam(':estado',$estado);
            $sql -> bindParam(':idUsuario',$id);
            $sql -> execute();
        }

        function cerrar_sesion($conexion){
            //llamamos la funcion actualizar_estado para modificar el estado del usuario en la DB
            $this -> actualizar_estado($conexion, $_SESSION['user']['idUsuario'], "desconectado");
            //destruimos la sesion actual
            Sesion::destruir_sesion();  
            //cerramos la conexion a la DB   
            Conector::cerrar_conexion();     
            echo "2";
        }
    }
?>