<?php

class Enrutador {
    
    private $rutas = array();

    function __construct() {
        $this->rutas['index'] = new Ruta('ModeloMember', 'VistaGen', 'ControladorMember');
        $this->rutas['member']=new Ruta('ModeloMember','VistaAjax','ControladorMember');
        $this->rutas['family']= new Ruta('ModeloFamily','VistaAjax','ControladorFamily');
        $this->rutas['client']= new Ruta('ModeloClient','VistaAjax','ControladorClient');
        $this->rutas['product']= new Ruta('ModeloProduct','VistaAjax','ControladorProduct');
        $this->rutas['ticket']= new Ruta('ModeloTicket','VistaAjax','ControladorTicket');
        $this->rutas['oldclient']= new Ruta('ModeloClient','VistaGen','ControladorClient'); 
        $this->rutas['oldfamily']= new Ruta('ModeloFamily','VistaGen','ControladorFamily'); 
        $this->rutas['oldproduct']= new Ruta('ModeloProduct','VistaGen','ControladorProduct');  
     
    }

    function getRoute($ruta) {
        if (!isset($this->rutas[$ruta])) {
            return $this->rutas['index'];
        }
        return $this->rutas[$ruta];
    }
}