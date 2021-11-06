<?php
header('Content-Type: application/json');
require_once("../config/conexion.php");
require_once("../model/Categoria.php");

$objCategoria= new Categoria();

$body=json_decode(file_get_contents("php://input"),true);

switch($_GET["opc"]){
    case "GetAll":
        $datos=$objCategoria->get_categoria();
        echo json_encode($datos);

        break;
    case "GetId":
        $datos=$objCategoria->get_categoria_por_id($body["cat_id"]);
        echo json_encode($datos);
            
        break;
    case "Insert":
        $datos=$objCategoria->insert_categoria($body["nombre"],$body["comentario"]);
        echo json_encode("Insertado correctamente");
                
         break;
    case "Update":
        $datos=$objCategoria->update_categoria($body["id"],$body["nombre"],$body["comentario"]);
        echo json_encode("Actualizado correctamente");
                    
        break;
    case "DeleteP":
        $datos=$objCategoria->deleteP_categoria($body["id"]);
        echo json_encode("Cambio de estado correctamente");
                    
        break;
}