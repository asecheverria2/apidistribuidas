<?php

class Venta extends Conectar{
    public function get_venta(){
        $conectar= parent::conexion();

        $sql="SELECT * FROM ventas";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_venta_por_id($cat_id){
        $conectar= parent::conexion();

        $sql="SELECT * FROM ventas WHERE id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_venta($cantidad,$producto,$precio_unit,$precio_tot){
        $conectar= parent::conexion();

        $sql="INSERT INTO ventas (cantidad, producto, precio_unit, precio_tot) VALUES (?, ?, ?, ?)";
        $sql=$conectar->prepare($sql);
       
        $sql->bindValue(1,$cantidad);
        $sql->bindValue(2,$producto);
        $sql->bindValue(3,$precio_unit);
        $sql->bindValue(4,$precio_tot);

        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_venta($id,$cantidad,$producto,$precio_unit,$precio_tot){
        $conectar= parent::conexion();

        $sql="UPDATE ventas SET  
        cantidad = ?,
        producto = ?,
        precio_unit = ?,
        precio_tot = ?
        WHERE id = ?;";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$cantidad);
        $sql->bindValue(2,$producto);
        $sql->bindValue(3,$precio_unit);
        $sql->bindValue(4,$precio_tot);
        $sql->bindValue(5,$id);

        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteP_venta($id){
        $conectar= parent::conexion();

        $sql="UPDATE ventas 
        WHERE id = ?;";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$id);

        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
}



?>