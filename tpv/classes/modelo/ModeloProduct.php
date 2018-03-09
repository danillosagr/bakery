<?php

class ModeloProduct extends Modelo {
    function getProduct() {
        $manager = new ManagerProduct($this->getDataBase());
        return $manager->getAllProduct();
    }
    
    function getProductParaJson(){
        $products = $this->getProduct();
        $array = array();
        foreach($products as $product) {
            $array[] = $product->getAttributesValues();
        }
        return $array;
    } 
    
    function getProductforfamily($id) {
        $manager = new ManagerProduct($this->getDataBase());
        return $manager->getAllProductFamilia($id);
    }
    
    function getProductforfamilyParaJson($id){
        $products = $this->getProductforfamily($id);
        $array = array();
        foreach($products as $product) {
            $array[] = $product->getAttributesValues();
        }
        return $array;
    }
    
    function deleteProduct($id){
        $manager = new ManagerProduct($this->getDataBase());
        return $manager->remove($id);
    }
    
    function get($id){
        $manager= new ManagerProduct($this->getDataBase());
        $datos=$manager->get($id);
        $array[] = $datos->getAttributesValues();
        return $array;
    }
    
    function add(Product $product){
        $manager = new ManagerProduct($this->getDataBase());
        $resultado = $manager->add($product);
        if($resultado > 0) {
            return $resultado;
        }
        return -1;
    }    
    
    function editProduct($product){
        $manager= new ManagerProduct($this->getDataBase());
        $resultado = $manager->edit($product);
        return $resultado;        
    } 

 
}