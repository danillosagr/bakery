<?php

class ManagerClient {

    private $db;

    function __construct(DataBase $db) {
        $this->db = $db;
    }

    public function add(Client $objeto) {
        $sql = 'insert into client(name, surname, tin, address, location, postalcode, province, email, telephone)
        values (:name, :surname, :tin, :address, :location, :postalcode, :province, :email, :telephone)';
        $params = array(
            'name' => $objeto->getName(),
            'surname' => $objeto->getSurname(),
            'tin' => $objeto->getTin(),
            'address' => $objeto->getAddress(),
            'location' => $objeto->getLocation(),
            'postalcode' => $objeto->getPostalcode(),
            'province' => $objeto->getProvince(),
            'email' => $objeto->getEmail(),
            'telephone' => $objeto->getTelephone()            
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

    public function edit(Client $objeto) {
        $sql = 'update client set name = :name, surname = :surname,  tin = :tin, 
        address = :address, location = :location, postalcode = :postalcode, 
        province = :province, email = :email, telephone = :telephone where id = :id';
                          
        $params = array(
            'id' => $objeto->getId(),
            'name' => $objeto->getName(),
            'surname' => $objeto->getSurname(),
            'tin' => $objeto->getTin(),
            'address' => $objeto->getAddress(),
            'location' => $objeto->getLocation(),
            'postalcode' => $objeto->getPostalcode(),
            'province' => $objeto->getProvince(),
            'email' => $objeto->getEmail(),
            'telephone' => $objeto->getTelephone()
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
        $sql = 'select * from client where id = :id';
        $params = array(
            'id' => $id
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        $sentencia = $this->db->getStatement();
        $objeto = new Client();
        if($resultado && $fila = $sentencia->fetch()) {
            $objeto->set($fila);
        } else {
            $objeto = null;
        }
        return $objeto;
    }

    public function getTin($tin) {
        $sql = 'select * from client where tin = :tin';
        $params = array(
            'tin' => $tin
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        $sentencia = $this->db->getStatement();
        $objeto = new Client();
        if($resultado && $fila = $sentencia->fetch()) {
            $objeto->set($fila);
        } else {
            $objeto = null;
        }
        return $objeto;
    }
    
    public function getAllTim() {
        $sql = 'select * from client order by tin';
        $resultado = $this->db->execute($sql);
        $objetos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $objeto = new Client();
                $objeto->set($fila);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }
    
    public function getAllName() {
        $sql = 'select * from client order by subname,name';
        $resultado = $this->db->execute($sql);
        $objetos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $objeto = new Client();
                $objeto->set($fila);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }
    
    public function remove($id) {
        $sql = 'delete from client where id = :id';
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