<?php

class ModeloTicket extends Modelo {
    
    function getTicket() {
        $manager = new ManagerTicket($this->getDataBase());
        return $manager->getAllFecha();
    }
    
    function getFacturas() {
        $manager = new ManagerFacturas($this->getDataBase());
        return $manager->getAllFecha();
    }    
    
    function getTicketParaJson(){
        //$ticketss = $this->getTicket();
        $ticketss = $this->getFacturas();                                         // añadido
        $array = array();
        foreach($ticketss as $ticket) {
            $array[] = $ticket->getAttributesValues();
        }
        return $array;
    }   
    
    function getAllTicketMember($id){
        $manager = new ManagerTicket($this->getDataBase());
        return $manager->getAllTicketMember($id);
        
    }
    
    function getTicketforMemberParaJson($id){
        $tikets = $this->getAllTicketMember($id);
        $array = array();
        foreach($tikets as $tiket) {
            $array[] = $tiket->getAttributesValues();
        }
        return $array;
    }
    
    function getAllTicketClient($id){
        $manager = new ManagerTicket($this->getDataBase());
        return $manager->getAllTicketClient($id);
    }
    
    function getTicketforClientParaJson($id){
        $tikects = $this->getAllTicketClient($id);
        $array = array();
        foreach($tikects as $ticket) {
            $array[] = $ticket->getAttributesValues();
        }
        return $array;
    }
    
    function deleteTicket($id){
        $manager = new ManagerTicket($this->getDataBase());
        return $manager->remove($id);
    }
    
    function addtickect(Ticket $ticket){
        $manager= new ManagerTicket($this->getDataBase());
        return $manager->add($ticket);
    }
    
    function adddetailticket(Ticketdetail $ticketdetalles){
        $manager= new ManagerTicketdetail($this->getDataBase());
        return $manager->add($ticketdetalles);
    }
    
    function getdetail($id){
        $manager= new ManagerTicketdetail($this->getDataBase());
        return $manager->getAllIdticket($id);        
    }
    
    function getTicketDetail($id){
        $tikects = $this->getdetail($id);
        $array = array();
        foreach($tikects as $ticket) {
            $array[] = $ticket->getAttributesValues();
        }
        return $array;
    }
}