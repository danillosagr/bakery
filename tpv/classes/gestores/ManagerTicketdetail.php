<?php

class ManagerTicketdetail {

    private $db;

    function __construct(DataBase $db) {
        $this->db = $db;
    }

    public function add(Ticketdetail $objeto) {
        $sql = 'insert into ticketdetail(idticket, idproduct, quantity, price) values 
        (:idticket, :idproduct, :quantity, :price)';
        $params = array(
            'idticket' => $objeto->getIdticket(),
            'idproduct' => $objeto->getIdproduct(),
            'quantity' => $objeto->getQuantity(),
            'price' => $objeto->getPrice()            
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

    public function edit(Ticketdetail $objeto) {
        $sql = 'update ticketdetail set idticket = :idticket, idproduct = :idproduct,
        quantity = :quantity, price = :price where id = :id';
                          
        $params = array(
            'idticket' => $objeto->getIdticket(),
            'idproduct' => $objeto->getIdproduct(),
            'quantity' => $objeto->getQuantity(),
            'price' => $objeto->getPrice()  
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
        $sql = 'select * from ticketdetail where id = :id';
        $params = array(
            'id' => $id
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        $sentencia = $this->db->getStatement();
        $objeto = new Ticketdetail();
        if($resultado && $fila = $sentencia->fetch()) {
            $objeto->set($fila);
        } else {
            $objeto = null;
        }
        return $objeto;
    }

    public function getAllIdticket($id) {
        //$sql = 'select * from ticketdetail where idticket = :id';
        $sql = 'select tk.id, tk.idticket, tk.idproduct, pr.product, tk.quantity, tk.price    
                from ticketdetail as tk join product as pr on tk.idproduct = pr.id 
                where tk.idticket = :id';

        $params = array(
            'id' => $id
        );
        $resultado = $this->db->execute($sql,$params);
        $objetos = array();
        
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $objeto = new Ticketdetail();
                $objeto->set($fila);
                $objetos[] = $objeto;
            }
        }
        
      //  echo Util::varDump($objetos);
    //    exit(); 
        
        return $objetos;
    }

    public function remove($id) {
        $sql = 'delete from ticketdetail where id = :id';
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