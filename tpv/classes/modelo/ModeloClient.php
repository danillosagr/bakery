<?php

class ModeloClient extends Modelo {
    
    function getClient() {
        $manager = new ManagerClient($this->getDataBase());
        return $manager->getAllTim();
    }
    
    function getClientParaJson(){
        $clients = $this->getClient();
        $array = array();
        foreach($clients as $client) {
            $array[] = $client->getAttributesValues();
        }
        return $array;
    }
    
    function deleteClient($id){
        $manager = new ManagerClient($this->getDataBase());
        return $manager->remove($id);
    }
    
    function add(Client $client){
        $manager = new ManagerClient($this->getDataBase());
        $resultado = $manager->add($client);
        if($resultado > 0) {
            return $client->getId();
        }
        return -1;
    }  
    
    function editClient($client){
        $manager= new ManagerClient($this->getDataBase());
        $resultado = $manager->edit($client);
        return $resultado;        
    }   
    
    function get($id){
        $manager= new ManagerClient($this->getDataBase());
        $datos=$manager->get($id);
       $array[] = $datos->getAttributesValues();
        return $array;
    }    
}