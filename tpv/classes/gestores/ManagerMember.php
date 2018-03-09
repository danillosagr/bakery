<?php

class ManagerMember {

    private $db;

    function __construct(DataBase $db) {
        $this->db = $db;
    }

    public function add(Member $objeto) {
        $sql = 'insert into member(login, password) values (:login, :password)';
        $params = array(
            'login' => $objeto->getLogin(),
            'password' => Util::encriptar($objeto->getPassword()),
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

    public function edit(Member $objeto) {
        $sql = 'update member set password = :password where id = :id';
        $params = array(
            'password' => Util::encriptar($objeto->getPassword()),
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

    public function editClave(Member $objeto) {
        $sql = 'update member set password = :password where id = :id';
        $params = array(
            'password' => Util::encriptar($objeto->getClave()),
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

    public function editSinClave(Member $objeto) {
        $sql = 'update member set login = :login where id = :id';
        $params = array(
            'login' => $objeto->getCorreo(),
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

    public function get($id) {
        
        $sql = 'select * from member where id = :id';
        $params = array(
            'id' => $id
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        $sentencia = $this->db->getStatement();
        $objeto = new Member();
        if($resultado && $fila = $sentencia->fetch()) {
            $objeto->set($fila);
        } else {
            $objeto = null;
        }
        return $objeto;
    }

    public function getAllLogin() {
        $sql = 'select * from member order by login';
        $resultado = $this->db->execute($sql);
        $objetos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $objeto = new Member();
                $objeto->set($fila);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }

    public function getFromLogin($login) {
        $sql = 'select * from member where login = :login';
        $params = array(
            'login' => $login
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        $sentencia = $this->db->getStatement();

        $objeto = new Member();
    
        if($resultado && $fila = $sentencia->fetch()) {
            $objeto->set($fila);
            
             echo Util::varDump($fila) . '<br>';
        } else {
            $objeto = null;
        }
        return $objeto;  
        
        
    }
    
    public function remove($id) {
        $sql = 'delete from member where id = :id';
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