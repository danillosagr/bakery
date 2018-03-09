<?php

class ManagerTicket {

    private $db;

    function __construct(DataBase $db) {
        $this->db = $db;
    }

    public function add(Ticket $objeto) {
        $sql = 'insert into ticket(fecha, idmember, total, idcliente) values (:fecha, :idmember, :total, :idcliente)';
        $params = array(
            'fecha' => $objeto->getFecha(),
            'idmember' => $objeto->getIdmember(),
            'idcliente' => $objeto->getIdcliente(),
            'total' => $objeto->getTotal()            
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

    public function edit(Ticket $objeto) {
        $sql = 'update ticket set fecha = :fecha, idmember = :idmember,
        idcliente = :idcliente where id = :id';
                          
        $params = array(
            'fecha' => $objeto->getFecha(),
            'idmember' => $objeto->getIdmember(),
            'idcliente' => $objeto->getIdcliente()
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
        $sql = 'select * from ticket where id = :id';
        $params = array(
            'id' => $id
        );
        $resultado = $this->db->execute($sql, $params);//true o false
        $sentencia = $this->db->getStatement();
        $objeto = new Ticket();
        if($resultado && $fila = $sentencia->fetch()) {
            $objeto->set($fila);
        } else {
            $objeto = null;
        }
        return $objeto;
    }
    
    public function getAllFecha() {
        $sql = 'select * from ticket order by fecha';
        $resultado = $this->db->execute($sql);
        $objetos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $objeto = new Ticket();
                $objeto->set($fila);
                $objetos[] = $objeto;
            }
        }
        return $objetos;
    }

    /**************** para consultar tickets por Cliente *******************************/
    function getAllTicketClient($id) {
        $sql = 'select * from client as ci left join ticket as ti on ci.id = ti.idcliente
        where ci.id = :id';
  
        $params = array(
            'id' => $id
        );             
        $resultado = $this->db->execute($sql);
        $contactosTelefonos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $member = new Member();
                $member->set($fila);
                $ticket = new Ticket();
                $ticket->set($fila, 2);
                $memberTicket[] = array('member' => $member,
                                         'ticket' => $ticket);
            }
        }
        return $memberTicket;
    }
 
    /**************** para consultar tickets por Miembro *******************************/
    function getAllTicketMember($id) {
        $sql = 'select * from member as me left join ticket as ti on me.id = ti.idmember
        where me.id = :id';
  
        $params = array(
            'id' => $id
        );             
        $resultado = $this->db->execute($sql);
        $contactosTelefonos = array();
        if($resultado){
            $sentencia = $this->db->getStatement();
            while($fila = $sentencia->fetch()) {
                $cliente = new Client();
                $cliente->set($fila);
                $ticket = new Ticket();
                $ticket->set($fila, 2);
                $clienteTicket[] = array('cliente' => $cliente,
                                         'ticket' => $ticket);
            }
        }
        return $clienteTicket;
    }    
    
    public function remove($id) {
        $sql = 'delete from ticket where id = :id';
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