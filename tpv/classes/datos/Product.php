<?php

class Product {
   
    private $id, $idfamilia, $product, $price,$imagen;
    
    function __construct($id = null, $idfamilia = null, $product = null, $price = null, $imagen=null) {
        $this->id = $id;
        $this->idfamilia = $idfamilia;
        $this->product = $product;
        $this->price = $price;  
        $this->imagen=$imagen;
    }
    function getId() {
        return $this->id;
    }

    function getIdfamilia() {
        return $this->idfamilia;
    }

    function getProduct() {
        return $this->product;
    }

    function getPrice() {
        return $this->price;
    }
    
    function getImagen(){
        return $this->imagen;
    }
    function setId($id) {
        $this->id = $id;
    }

    function setIdfamilia($idfamilia) {
        $this->idfamilia = $idfamilia;
    }

    function setProduct($product) {
        $this->product = $product;
    }

    function setPrice($price) {
        $this->price = $price;
    }
     
    function setImagen($imagen){
        $this->imagen=$imagen;
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