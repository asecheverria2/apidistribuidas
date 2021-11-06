<?php
header('Content-Type: application/json');
require_once("../config/conexion.php");
require_once("../model/venta.php");

$objVenta= new Venta();

$body=json_decode(file_get_contents("php://input"),true);

switch($_GET["opc"]){
    case "GetAll":
        $datos=$objVenta->get_venta();
        echo json_encode($datos);

        break;
    case "GetId":
        $datos=$objVenta->get_venta_por_id($body["cat_id"]);
        echo json_encode($datos);
            
        break;
    case "Insert":
        $datos=$objVenta->insert_venta($body["cantidad"],$body["producto"],$body["precio_unit"],$body["precio_tot"]);
        echo json_encode("Insertado correctamente");
                
         break;
    case "Update":
        $datos=$objVenta->update_venta($body["id"],$body["cantidad"],$body["producto"],$body["precio_unit"],$body["precio_tot"]);
        echo json_encode("Actualizado correctamente");
                    
        break;
    case "DeleteP":
        $datos=$objVenta->deleteP_venta($body["id"]);
        echo json_encode("Eliminado correctamente");
                    
        break;
}