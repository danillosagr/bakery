<?php

class Ticket {

    private $id, $fecha, $idmember, $idcliente, $total;
    
    function __construct($id = null, $fecha = null, $idmember = null, $idcliente = null, $total = null) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->idmember = $idmember;
        $this->total = $total;                                                    // añadido
        $this->idcliente = $idcliente;
    }

    function getId() {
        return $this->id;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getIdmember() {
        return $this->idmember;
    }

    function getIdcliente() {
        return $this->idcliente;
    }
    
    function getTotal() {                                                         // añadido
        return $this->total;
    }    

    function setId($id) {
        $this->id = $id;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setIdmember($idmember) {
        $this->idmember = $idmember;
    }

    function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    function setTotal($total) {                                                  // añadido
        $this->total = $total;
    }
    
    /* común a todas las clases */

    function getAttributes(){
        $atributos = [];
        foreach($this as $atributo => $valor){
            $atributos[] = $atributo;
        }
        return $atributos;
    }

    function getValues(){
        $valores = [];
        foreach($this as $valor){
            $valores[] = $valor;
        }
        return $valores;
    }
    
    function getAttributesValues(){
        $valoresCompletos = [];
        foreach($this as $atributo => $valor){
            $valoresCompletos[$atributo] = $valor;
        }
        return $valoresCompletos;
    }
    
    function read(){
        foreach($this as $atributo => $valor){
            $this->$atributo = Request::read($atributo);
        }
    }
    
    function set(array $array, $pos = 0){
        foreach ($this as $campo => $valor) {
            if (isset($array[$pos]) ) {
                $this->$campo = $array[$pos];
            }
            $pos++;
        }
    }    
    
    public function __toString() {
        $cadena = get_class() . ': ';
        foreach($this as $atributo => $valor){
            $cadena .= $atributo . ': ' . $valor . ', ';
        }
        return substr($cadena, 0, -2);
    }    
}