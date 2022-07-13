<?php
    // Encabezado para que PHP reconozca que se van a intercambiar archivos JSON
    header('Contend-Type: application/json');

    // este archivo sera el controlador del Api, aqui se van a realiza
    // las operaciones del CRUD
    // Create, Read, Update, Delete

    require_once "../config/conexion.php";
    require_once "../models/Productos.php";

    // para resivir solicitudes de la URI

    $body = json_decode(file_get_contents("php://input"),true);

    //Instanciar el objeto
    // se ocupara para realizar las acciones del API
    $producto = new Producto(); 

    // Crear el webservice que realice las acciones del CRUD por medio
    // de la API REST, el switch sera el encargado de atender las peticiones
    switch($_GET["opcion"]){
        //Este caso, recupera todos los datos de la tabla productos
        // la informacion es recupera de lo que indica el archivo
        // models->productos.php y en su metodo Get_producto()

        case"getAll" :
            $datos = $producto-> get_producto();
            // una vez recuperados los datos, se les da formato json
            echo json_encode($datos);
            break;
            // para recuperar un registro se ocupa el get,  que tiene el id del producto
            case "get":
                $datos = $producto->get_producto_id($body["id"]);// este id es de la tabla A consultar
                echo json_encode($datos);
                break;

                // para insertar un registro se debe mandar los campos  por la uri
            case "insert":
                $datos = $producto->insert_producto($body["nombre"],$body["marca"],$body["descripcion"],$body["precio"]);// este id es de la tabla A consultar
                echo json_encode("Producto insertado ");
                break;

                // para eliminar un registro se debe mandar los campos  por la uri
            case "delete":
                $datos = $producto->delete_producto($body["id"]);// este id es de la tabla A consultar
                echo json_encode("Producto Eliminado () ");
                break;

                 // para eliminar un registro se debe mandar los campos  por la uri
            case "kill":
                $datos = $producto->kill_producto($body["id"]);// este id es de la tabla A consultar
                echo json_encode("Producto Eliminado forever pa  ");
                break;
                
        case"getSucursales" :
            $datos = $producto-> get_sucursales();
            // una vez recuperados los datos, se les da formato json
            echo json_encode($datos);
            break;

    }


?>