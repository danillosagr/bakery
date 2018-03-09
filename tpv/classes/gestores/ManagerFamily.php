<?php

class ManagerFamily {

    private $db;

    function __construct(DataBase $db) {
        $this->db = $db;
    }

    public function add(Family $objeto) {
        $sql = 'insert into family(familia) values (:familia)';
        $params = array(
            'familia' => $objeto->getFamilia()
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

    public function edit(Family $objeto) {
        $sql = 'update family set familia = :family where id = :id';
                          
        $params = array(
            'id' => $objeto->getId(),
            'family' => $objeto->getFamilia()
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
        $sql = 'select * from family where id = :id';
        $params = array(
            'id' => $id
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        $sentencia = $this->db->getStatement();
        $objeto = new Family();
        if($resultado && $fila = $sentencia->fetch()) {
            $objeto->set($fila);
        } else {
            $objeto = null;
        }
        return $objeto;
    }

    public function getFamilia($familia) {
        $sql = 'select * from family where familia = :familia';
        $params = array(
            'familia' => $familia
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        $sentencia = $this->db->getStatement();
        $objeto = new Family();
        if($resultado && $fila = $sentencia->fetch()) {
            $objeto->set($fila);
        } else {
            $objeto = null;
        }
        return $objeto;
    }
    
    public function getAllFamilia() {
        $sql = 'select * from family order by familia';
        $resultado = $this->db->execute($sql);
        $objetos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $objeto = new Family();
                $objeto->set($fila);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }    
    
    public function remove($id) {
        $sql = 'delete from family where id = :id';
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