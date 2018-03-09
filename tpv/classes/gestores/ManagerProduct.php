<?php

class ManagerProduct {

    private $db;

    function __construct(DataBase $db) {
        $this->db = $db;
    }

    public function add(Product $objeto) {
        $sql = 'insert into product(idfamilia, product, price, imagen) values (:idfamilia, :product, :price, :imagen)';
        $params = array(
            'idfamilia' => $objeto->getIdfamilia(),
            'product' => $objeto->getProduct(),
            'price' => $objeto->getPrice(),
            'imagen' => $objeto->getImagen()
        );
        $resultado = $this->db->execute($sql, $params);
        if($resultado) {
            $id = $this->db->getId();
            $objeto->setId($id);
        } else {
            $id = 0;
        }
        return $id;
    }
    
    public function addImagen(Product $objeto) {
        $sql = 'update product set imagen = :imagen where id = :id';
                          
        $params = array(
            'imagen' => $objeto->getImagen(),
            'id' => $objeto->getId()
        );
        $resultado = $this->db->execute($sql, $params);
        if($resultado) {
            $filasAfectadas = $this->db->getRowNumber();
        } else {
            $filasAfectadas = -1;
        }
        return $filasAfectadas;
    }    

    public function edit(Product $objeto) {
        $sql = 'update product set idfamilia = :idfamilia, product = :product,
        price = :price, imagen = :imagen  where id = :id';
                          
        $params = array(
            'id' => $objeto->getId(),
            'idfamilia' => $objeto->getIdfamilia(),
            'product' => $objeto->getProduct(),
            'price' => $objeto->getPrice(),
            'imagen'=> $objeto->getImagen()
        );
        $resultado = $this->db->execute($sql, $params);
        if($resultado) {
            $filasAfectadas = $this->db->getRowNumber();
        } else {
            $filasAfectadas = -1;
        }
        return $filasAfectadas;
    }

    public function get($id) {
        $sql = 'select * from product where id = :id';
        $params = array(
            'id' => $id
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        $sentencia = $this->db->getStatement();
        $objeto = new Product();
        if($resultado && $fila = $sentencia->fetch()) {
            $objeto->set($fila);
        } else {
            $objeto = null;
        }
        return $objeto;
    }
    
    public function getAllProduct() {
        $sql = 'select * from product order by product';
        $resultado = $this->db->execute($sql);
        $objetos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $objeto = new Product();
                $objeto->set($fila);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }
    
    public function getAllProductFamilia($idfamilia) {
        $sql = 'select * from product where idfamilia = :idfamilia order by product';
        $params = array(
            'idfamilia' => $idfamilia
        );
        $resultado = $this->db->execute($sql,$params);
        $objetos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $objeto = new Product();
                $objeto->set($fila);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }

    public function remove($id) {
        $sql = 'delete from product where id = :id';
        $params = array(
            'id' => $id
        );
        $resultado = $this->db->execute($sql, $params);
        if($resultado) {
            $filasAfectadas = $this->db->getRowNumber();
        } else {
            $filasAfectadas = -1;
        }
        return $filasAfectadas;
    }
}