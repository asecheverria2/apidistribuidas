<?php

class Categoria extends Conectar{
    public function get_categoria(){
        $conectar= parent::conexion();

        $sql="SELECT * FROM categoria";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_categoria_por_id($cat_id){
        $conectar= parent::conexion();

        $sql="SELECT * FROM categoria WHERE id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_categoria($nombre,$comentario){
        $conectar= parent::conexion();

        $sql="INSERT INTO categoria (id, Nombre,Comentario, Estado) VALUES ('6', ?, ?, '1')";
        $sql=$conectar->prepare($sql);
       
        $sql->bindValue(1,$nombre);
        $sql->bindValue(2,$comentario);

        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_categoria($id,$nombre,$comentario){
        $conectar= parent::conexion();

        $sql="UPDATE categoria SET  
        Nombre = ?,
        Comentario = ?
        WHERE id = ?;";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$nombre);
        $sql->bindValue(2,$comentario);
        $sql->bindValue(3,$id);

        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteP_categoria($id){
        $conectar= parent::conexion();

        $sql="UPDATE categoria SET  
        Estado = 0
        WHERE id = ?;";
        $sql=$conectar->prepare($sql);
        
        $sql->bindValue(1,$id);

        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
}



?>