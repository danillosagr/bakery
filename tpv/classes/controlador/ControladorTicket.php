<?php

class ControladorTicket extends Controlador { 
    function __construct(Modelo $modelo) {
        parent::__construct($modelo);
    }
    
    function allTicket(){
        $tickets=$this->getModel()->getTicketParaJson();
        $this->getModel()->setDato('listado', $tickets);
    }
    
    function deleteTicket(){
        $id=Request::read('id');
        if($this->isLogged() && $this->isAdministrator()){        
            
            $r=$this->getModel()->deleteTicket($id);
            if($r!=-1){
                $tickets=$this->getModel()->getTicketParaJson();
                $this->getModel()->setDato('listado', $tickets);
            }else{
                $this->getModel()->setDato('listado', $r);
            }
        }
    }
    
    function addtickect(){
        $idcliente=Request::read('idClient');
        $total = Request::read('total');                                         // añadido        
        $idmenber=$this->getUser()->getId();
        $tickets= new Ticket();
        $tickets->setIdmember($idmenber);
        $tickets->setIdcliente($idcliente);
        $tickets->setTotal($total);                                              // añadido  
        //$fecha_actual=getdate([ int $timestamp = time() ]);
        //$tickets->setFecha(date('m/d/Y g:ia'));

        $tickets->setFecha(date("Y-m-d H:i:s"));                                 // añadido 
 
        if($this->isLogged()){
            $r=$this->getModel()->addtickect($tickets);
        }
        $this->getModel()->setDato('r', $r);
    }
    
   function meterDetallesticket(){
       $idticket=Request::read('idticket');
       $idproduct=Request::read('idproduct');
       $cantidad=Request::read('unidad');
       $precio=Request::read('precio');
       $detallesTicket=new Ticketdetail();
       $detallesTicket->setIdticket($idticket);
       $detallesTicket->setIdproduct($idproduct);
       $detallesTicket->setQuantity($cantidad);
       $detallesTicket->setPrice($precio);
       if($this->isLogged() && $cantidad!=0){
            $r=$this->getModel()->adddetailticket($detallesTicket);
        }
        $this->getModel()->setDato('r', $r);
    }
    
    function allTicketMember(){
        $id=Request::read('idmember');
        $tikects=$this->getModel()->getTicketforMemberParaJson($id);
        $this->getModel()->setDato('listado', $tikects);
    }
    
    function allTicketClient(){
        $id=Request::read('idclient');
        $produtcs=$this->getModel()->getTicketforClientParaJson($id);
        $this->getModel()->setDato('listado', $produtcs);
    }
    
    function getTicketDetail(){
        $id=Request::read('id');
        $tikects=$this->getModel()->getTicketDetail($id);
        $this->getModel()->setDato('listado', $tikects);
    }
}