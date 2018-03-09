<?php

class ManagerFacturas {
    
    private $db;

    function __construct(DataBase $db) {
        $this->db = $db;
    }
    
    public function getAllFecha() {
        $sql = 'select t.id, t.fecha, t.total, c.name, c.surname, m.login  
                from ticket t, client c, member m
                where t.idcliente = c.id and t.idmember = m.id
                order by t.fecha;';
        $resultado = $this->db->execute($sql);
        $objetos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $objeto = new Facturas();
                $objeto->set($fila);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }    
    
    
}