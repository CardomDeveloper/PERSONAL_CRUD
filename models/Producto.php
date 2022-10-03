<?php

class Producto extends Conectar
{

    public function get_producto()
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_producto WHERE estado=1";
        $sql = $conectar->prepare($sql);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function get_producto_por_id($prod_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_producto WHERE prod_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_id);

        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    //Delete Producto
    public function delete_producto($prod_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE tm_usuario
                SET
                    est=0,
                    fech_elim=now()
                WHERE
                    prod_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_id);

        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    //Insert Producto
    public function insert_producto($prod_nombre)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_producto(prod_id, prod_nombre, fech_creacion, fech_modificacion, fech_eliminacion, estado) VALUES(NULL, ?, now(), NULL, NULL, 1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_nombre);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    //Update Producto
    public function update_producto($prod_id, $prod_nombre)
    {
        $conectar = parent::Conexion();
        parent::set_names();
        $sql = "UPDATE tm_usuario
            SET
                prod_nombre=?,
                fech_modificacion=now()
            WHERE
                prod_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_nombre);
        $sql->bindValue(2, $prod_id);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }
}
