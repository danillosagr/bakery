<?php

class ControladorClient extends Controlador { 
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
    
    function allClient(){
        $clientes=$this->getModel()->getClientParaJson();
        $this->getModel()->setDato('listado', $clientes);
    }
    
    function deleteClient(){
        $id=Request::read('id');
        if($this->isLogged() && $this->isAdministrator()){        
            
            $r=$this->getModel()->deleteClient($id);
            if($r!=-1){
                $clientes=$this->getModel()->getClientParaJson();
                $this->getModel()->setDato('listado', $clientes);
            }else{
                $this->getModel()->setDato('listado', $r);
            }
        }
    }
    
    function viewAddClient(){

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
            $this->getModel()->setDato('archivo','plantilla/_formClient.html');
            $this->getModel()->setDato('menusuario', $menusuario);
            $this->getModel()->setDato('usuario', $this->getUser()->getLogin());    
            if ($r > 0) {
                $mensaje1 = '
                    <div class="col-lg-12 text-center" id="mensaje">
                         <h3>Cliente dado de alta con nº de id: ' . $r . '</h3>
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
    
    function addClient() {
        $client = new Client();
        $client->read();
        $r = -3;
                            //echo Util::varDump($client);  
                                    
        if (($client->getTin() !== '' ) && ($client->getName() !== '')) {
            $r = $this->getModel()->add($client);   
            if($r instanceof Client) {                  // instanceof indica si $r es un objeto de la clase Client
                $r = $r->getId();
            }    
        }else {
            $this->index(); 
        }
        header('Location: index.php?ruta=oldclient&accion=viewaddClient&res=' . $r);
        exit();                                    
                                            
    }    
    
    function editClient(){
        if($this->isLogged()){
            $idClient = Request::read('idClient');
            $nombre = Request::read('nombre');
            $segnombre = Request::read('segnombre');
            $documento = Request::read('documento');
            $email = Request::read('email'); 
            $telefono = Request::read('telefono');
            $direccion = Request::read('direccion');
            $localidad = Request::read('localidad');
            $provincia = Request::read('provincia');
            $cp = Request::read('cp');    
            
            $client = new Client();  
            
            $client->setId($idClient);
            $client->setName($nombre);
            $client->setSurname($segnombre);
            $client->setTin($documento);
            $client->setAddress($direccion);
            $client->setLocation($localidad);
            $client->setPostalcode($cp);  
            $client->setProvince($provincia);
            $client->setEmail($email); 
            $client->setTelephone($telefono);

            $r = $this->getModel()->editClient($client);
            if($r!==-1){
                $clients = $this->getModel()->getClientParaJson();
                $this->getModel()->setDato('listado', $clients);
            }else{
                $this->getModel()->setDato('listado', array('res'=> -1));
            }                
        }else {
            $this->getModel()->setDato('r', false);
        }
    }

    function getClient(){
        $id = Request::read('id');
        if($this->isLogged()){
            $client=$this->getModel()->get($id);
            $this->getModel()->setDato('listado', $client);
        }
    }

}

