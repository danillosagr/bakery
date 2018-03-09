<?php

class Ticketdetail {
    
    private $id, $idticket, $idproduct, $product, $quantity, $price;
    
    function __construct($id = null, $idticket = null, $idproduct = null, $product = null, $quantity = null, $price = null) {
        $this->id = $id;
        $this->idticket = $idticket;        
        $this->idproduct = $idproduct;
        $this->product = $product;        
        $this->quantity = $quantity;   
        $this->price = $price;    
    }

    function getId() {
        return $this->id;
    }

    function getIdticket() {
        return $this->idticket;
    }

    function getIdproduct() {
        return $this->idproduct;
    }

    function getQuantity() {
        return $this->quantity;
    }

    function getPrice() {
        return $this->price;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdticket($idticket) {
        $this->idticket = $idticket;
    }

    function setIdproduct($idproduct) {
        $this->idproduct = $idproduct;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    function setPrice($price) {
        $this->price = $price;
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