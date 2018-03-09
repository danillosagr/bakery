<?php

class ControladorFamily extends Controlador { 
    
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
                            <!--  <li><a class="" href="index.php?ruta=index&accion=viewListUser">Listar</a></li> -->
                              <li><a class="all" data-ruta="member" href="#">Listar</a></li>
                            </ul>
                          </li>';
                $menusuario1 = '
                    <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                          <a class="link" href="#">                        
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
    
    function allFamily(){
        $familias=$this->getModel()->getFamilyParaJson();
        $this->getModel()->setDato('listado', $familias);
    }
    
    function deleteFamily(){
        $id=Request::read('id');
        if($this->isLogged() && $this->isAdministrator()){        
            
            $r=$this->getModel()->deleteFamily($id);
            if($r!=-1){
                $familias=$this->getModel()->getFamilyParaJson();
                $this->getModel()->setDato('listado', $familias);
            }else{
                $this->getModel()->setDato('listado', $r);
            }
        }
    }
    
    function viewAddFamily(){

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
        }
        if($this->islogged()){
            //$menusuario = '';            
            $mensaje1 = '';             
            $r = Request::read('res');
            $this->getModel()->setDato('archivo','plantilla/_formFamily.html');
            $this->getModel()->setDato('menusuario', $menusuario);
            $this->getModel()->setDato('usuario', $this->getUser()->getLogin());    
            if ($r > 0) {
                $mensaje1 = '
                    <div class="col-lg-12 text-center" id="mensaje">
                         <h3>Famila dado de alta con nº de id: ' . $r . '</h3>
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
    
    function addFamily() {
        $family = new Family();
        $family->read();
        $r = -3;
                            //echo Util::varDump($client);  
                                    
        if (($family->getFamilia() !== '' )) {
            $r = $this->getModel()->add($family);   
            if($r instanceof Family) {                  // instanceof indica si $r es un objeto de la clase Client
                $r = $r->getId();
            }    
        }else {
            $this->index(); 
        }
        header('Location: index.php?ruta=oldfamily&accion=viewaddFamily&res=' . $r);
        exit();                                    
                                            
    }  
    
    function editfamily(){
        if($this->isLogged()){
            $idFamily = Request::read('idFamily');
            $nombre = Request::read('nombre');

            $family = new Family();
            $family->setId($idFamily);
            $family->setFamilia($nombre);             
             
            $r = $this->getModel()->editFamily($family);
            
            if($r !== -1){
                $familys = $this->getModel()->getFamilyParaJson();
                $this->getModel()->setDato('listado', $familys);
            }else{
                $this->getModel()->setDato('r', $r);
            }                
        }else {
            $this->getModel()->setDato('r', false);
        }
    }
    
    function getFamily(){
        $id = Request::read('id');
        if($this->isLogged()){
            $family=$this->getModel()->get($id);
            $this->getModel()->setDato('listado', $family);
        }  
    }
}