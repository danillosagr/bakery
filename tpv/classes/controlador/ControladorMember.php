<?php

class ControladorMember extends Controlador { 

    function __construct(Modelo $modelo) {
        parent::__construct($modelo);
    }

    function index() {
        if($this->isLogged()){
            $this->getModel()->setDato('archivo', 'plantilla/_index.html'); 
            if($this->isAdministrator()){
                $menusuario = '
                          <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_profile"></i>
                                <span>Usuarios</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                              <li><a class="" href="index.php?ruta=index&accion=viewAddUser">Alta</a></li>
                              <li><a class="all" data-ruta="member" href="#">Listar</a></li>
                            </ul>
                          </li>';
                $menusuario1 = '
                    <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                          <a class="link" href="index.php?ruta=index&accion=viewAddUser">                        
                              <i class="fa fa-shopping-cart"></i>
                              <div class="count">USUARIOS</div>
                          </a>
                        <!--  <div class="title">Purchased</div>  -->
                         </div>
                    </div>';          
                      
                $this->getModel()->setDato('menusuario', $menusuario);
                $this->getModel()->setDato('menusuario1', $menusuario1);                
            }
            $this->getModel()->setDato('usuario', $this->getUser()->getLogin());
        } else {
            $this->getModel()->setDato('archivo', 'plantilla/_login.html');
        }
    }

    function login(){
        $member = new Member();
        $member->read();          //como los name del formulario son iguales que los atributos de member, los lee y los incluye en el objeto member
        $r = -2;
        
        //echo Util::varDump($member);
        
        if (($member->getLogin() !== '' ) && ($member->getPassword() !== '')) {
            $r = $this->getModel()->login ($member);   
            if($r instanceof Member) {                                          // instanceof indica si $r es un objeto de la clase Member
                $this->getSesion()->login($r);
                $r = 1;
            } else {
                $r = -101;
                $this->getSesion()->logout();
            }
  
        }else {
            $this->index(); 
        }
        
        header('Location: index.php?op=loguear&res=' . $r);
        exit();
        
    }
    
    function logout() {
        $this->getSesion()->close();
        header('Location: index.php?op=logout');
        exit();
    }   
    
    function viewAddUser(){
        if($this->isLogged() && $this->isAdministrator()){
            $menusuario = '
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon_profile"></i>
                        <span>Usuarios</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="index.php?ruta=index&accion=viewAddUser">Alta</a></li>
                        <li><a class="all" data-ruta="member" href="#">Listar</a></li>
                    <!--    <li><a class="" href="index.php?ruta=index&accion=viewListUser">Listar</a></li> -->
                    </ul>
                </li>';   
                
            $mensaje1 = '';             
            $r = Request::read('res');
            $this->getModel()->setDato('archivo','plantilla/_formUsu.html');
            $this->getModel()->setDato('menusuario', $menusuario);
            $this->getModel()->setDato('usuario', $this->getUser()->getLogin());    
            if ($r > 0) {
                $mensaje1 = '
                    <div class="col-lg-12 text-center" id="mensaje">
                         <h3>Usuario dado de alta con nº de id: ' . $r . '</h3>
                    </div>';                
            }elseif($r < 0) {
                $mensaje1 = '
                    <div class="col-lg-12 text-center" id="mensaje">
                         <h3>Error, no se ha dado de alta</h3>
                    </div>';                
            };
            $this->getModel()->setDato('mensaje1', $mensaje1);              
        }else {
            $this->getModel()->setDato('archivo', 'plantilla/_index.html');             
        }
    }

    function addUser() {
        $member = new Member();
        $member->read();
        $r = -3;
                               //     echo Util::varDump($member);  
                                    
        if (($member->getLogin() !== '' ) && ($member->getPassword() !== '')) {
            $r = $this->getModel()->addUsuario($member);   
            if($r instanceof Member) {                  // instanceof indica si $r es un objeto de la clase Member
                $r = $r->getId();
            }    
        }else {
            $this->index(); 
        }
        header('Location: index.php?ruta=index&accion=viewaddUser&res=' . $r);
        exit();                                    
                                            
    }
   
    function allMember(){
        $members=$this->getModel()->getMemberParaJson();
        $this->getModel()->setDato('listado', $members);
    }
    
    function deleteMember(){
        $id=Request::read('id');
        if($this->isLogged() && $this->isAdministrator()){        
            
            $r=$this->getModel()->deleteMember($id);
            if($r!=-1){
                $members=$this->getModel()->getMemberParaJson();
                $this->getModel()->setDato('listado', $members);
            }else{
                $this->getModel()->setDato('listado', $r);
            }
        }
    }
    
    function isAdmin(){
        $r=$this->isAdministrator();
        $this->getModel()->setDato('r',$r);
    }
    
    function getMember(){
        $id=Request::read('id');
        
        if($this->isLogged()){        
            $member=$this->getModel()->get($id);
            $this->getModel()->setDato('listado', $member);
        }
    }
    
    function editMember(){
         if($this->isLogged() && $this->isAdministrator()){
             $member = new Member();
             $idMember = Request::read('idMember');
             $password = Request::read('password');
             $verificapass = Request::read('verificapass');
             $member->setId($idMember);
             if ($password == $verificapass){
                $member->setPassword($password);
                $r = $this->getModel()->editMember($member);
                if($r!==-1){
                    $members=$this->getModel()->getMemberParaJson();
                    $this->getModel()->setDato('listado', $members);
                }else{
                    $this->getModel()->setDato('r', $r);
                }                
             }else {
                $this->getModel()->setDato('r', false); 
             } 
             
         }else {
            $this->getModel()->setDato('r', false);
         }
         
    }
}