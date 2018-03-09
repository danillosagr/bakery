<?php

class ModeloMember extends Modelo {

    function addUsuario(Member $member){
        $manager = new ManagerMember($this->getDataBase());
        $resultado = $manager->add($member);
        if($resultado > 0) {
            return $member->getId();
        }
        return -1;
    }

    function login(Member $member){

        $r = -1;        
        $manager = new ManagerMember($this->getDataBase());
        $memberBD = $manager->getFromLogin($member->getLogin());
        if($memberBD === null) {
            $r = -10;
        }else {
            $verifica = Util::verificarClave($member->getPassword(), $memberBD->getPassword());
            //if($member->getPassword() === $memberBD->getPassword()) {
            if ($verifica){
                $r = $memberBD;
            }else {
                $r = -2;
            }
        }
        return $r;
    }
    
    function getMember() {
        $manager = new ManagerMember($this->getDataBase());
        return $manager->getAllLogin();
    }
    
    function getMemberParaJson(){
        $members = $this->getMember();
        $array = array();
        foreach($members as $member) {
            $array[] = $member->getAttributesValues();
        }
        return $array;
    }   
    
    function deleteMember($id){
        $manager = new ManagerMember($this->getDataBase());
        return $manager->remove($id);
    }
    
    function get($id){
        $manager= new ManagerMember($this->getDataBase());
        $datos=$manager->get($id);
        
        $array[] = $datos->getAttributesValues();
        return $array;
    }
    
    function editMember($member){
        $manager= new ManagerMember($this->getDataBase());
        $resultado = $manager->edit($member);
        return $resultado;        
    }
}