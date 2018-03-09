
<?php

class ModeloFamily extends Modelo {
    
    function getFamily() {
        $manager = new ManagerFamily($this->getDataBase());
        return $manager->getAllFamilia();
    }
    
    function getFamilyParaJson(){
        $families = $this->getFamily();
        $array = array();
        foreach($families as $family) {
            $array[] = $family->getAttributesValues();
        }
        return $array;
    }

    function deleteFamily($id){
        $manager = new ManagerFamily($this->getDataBase());
        return $manager->remove($id);
    }
    
    function add(Family $family){
        $manager = new ManagerFamily($this->getDataBase());
        $resultado = $manager->add($family);
        if($resultado > 0) {
            return $family->getId();
        }
        return -1;
    }  
    
    function editFamily($family){
        $manager= new ManagerFamily($this->getDataBase());
        $resultado = $manager->edit($family);
        return $resultado;        
    }    
    
    function get($id){
        $manager= new ManagerFamily($this->getDataBase());
        $datos=$manager->get($id);
        
        $array[] = $datos->getAttributesValues();
        return $array;
    }
}