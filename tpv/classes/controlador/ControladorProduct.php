<?php

class ControladorProduct extends Controlador { 
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
    
    function allProdutc(){
        
        $produtcs=$this->getModel()->getProductParaJson();
        $this->getModel()->setDato('listado', $produtcs);
    }
    
    function allProdutcFamily(){
        $id=Request::read('idfamily');
        if($id=='0'){
            $produtcs=$this->getModel()->getProductParaJson();
            $this->getModel()->setDato('listado', $produtcs);
        }else{
            $produtcs=$this->getModel()->getProductforfamilyParaJson($id);
            $this->getModel()->setDato('listado', $produtcs);
        }
    }

    function deleteProduct(){
        $id=Request::read('id');
        if($this->isLogged() && $this->isAdministrator()){        
            
            $r=$this->getModel()->deleteProduct($id);
            if($r!=-1){
                $products=$this->getModel()->getProductParaJson();
                $this->getModel()->setDato('listado', $products);
            }else{
                $this->getModel()->setDato('listado', $r);
            }
        }
    }    

    function getProduct(){
        $id=Request::read('id');
        if($this->isLogged()){        
            $product=$this->getModel()->get($id);
            $this->getModel()->setDato('listado', $product);
        }
    }
    
    function getProductSeccion(){
        $id=Request::read('id');
        if($this->isLogged()){ 
            // $session=$this->getSesion();
            // $session->set()
            $product=$this->getModel()->get($id);
            $this->getModel()->setDato('listado', $product);
        }
    }
    
    function viewAddProduct(){
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
        $modeloFamilias = new ModeloFamily; 
        $datosFamilia = $modeloFamilias->getFamilyParaJson();
        $familias = '<option value="">Seleccione....</option>';
        foreach ($datosFamilia as $dato) {
            $selected = '';
            $familias.='<option data-id="' . $dato['id'] .'"' . $selected . 'value=' . $dato['id'] . '>' . $dato['familia'] . '</option>';
        }
            

        if($this->islogged()){
            $mensaje1 = '';  
            $mensaje2 = '';
            $r = Request::read('res');
            $r2 = Request::read('res2');
            $this->getModel()->setDato('archivo','plantilla/_formProduct.html');
            $this->getModel()->setDato('menusuario', $menusuario);
            $this->getModel()->setDato('familias', $familias);            
            $this->getModel()->setDato('usuario', $this->getUser()->getLogin());    
            if ($r > 0) {
                $mensaje1 = '
                    <div class="col-lg-12 text-center" id="mensaje">
                         <h3>Producto dado de alta con nº de id: ' . $r . '</h3>
                    </div>';                
            }elseif($r < 0) {
                $mensaje1 = '
                    <div class="col-lg-12 text-center" id="mensaje">
                         <h3>Error, no se ha dado de alta</h3>
                    </div>';                
            }         
            $this->getModel()->setDato('mensaje1', $mensaje1);   
            if ($r2 == '-1') {
                $mensaje2 = ' ;
                    <div class="col-lg-12 text-center" id="mensaje1">
                         <h3>Error, no se ha subido la foto</h3>
                    </div>';                
            }elseif ($r2 == 'ok') {
                $mensaje2 = ' ;               
                    <div class="col-lg-12 text-center" id="mensaje1">
                         <h3>La foto se ha subido correctamente</h3>
                    </div>';                
            }   
            $this->getModel()->setDato('mensaje2', $mensaje2);              
        }else {
            $this->getModel()->setDato('archivo', 'plantilla/_index.html');             
        }
   
    }      

    function addProduct() {
        $product = new Product();
        $product->read();
        $r = -3;
        if (($product->getProduct() !== '' )) {
            $r = $this->getModel()->add($product); 
            
            if($r !== null){
                $r1 = $this->subirFoto($r);   
                echo Util::varDump($r1);
                if ($r1 !== false){
                    $r2 = 'ok';
                     $product->setId($r);
                     $product->setImagen($r);
                     $r2 = $this->getModel()->editProduct($product);
                }else {
                    $r2 = '-1';
                }
            } 
        } else {
            $this->index(); 
        }    
        header('Location: index.php?ruta=oldproduct&accion=viewaddProduct&res=' . $r . '&res2=' . $r2);
        exit();                                    
                                            
    }     
    
    function allFamily(){
        $familias = new ModeloFamily; 
        $this->getModel()->setDato('listado', $familias->getFamilyParaJson());
    } 

    function subirFoto($idProducto) {
        if($this->isLogged()) {
            $subir = new FileUpload('foto', $idProducto . '.png', '../imgBakery', 2 * 1024 * 1024, FileUpload::SOBREESCRIBIR);
            $r = $subir->upload();
            return $r;
        } else {
            $this->index();
        }
    }
    
    function verFoto() {
        $idProducto = Request::read('id');
        if($this->isLogged()) {
            header('Content-type: image/*');
            $archivo = '../../imgBakery/' . $idProducto;
            if(!file_exists($archivo)) {
                $archivo = '../../imgBakery/default.png';
            }
            readfile($archivo);
            exit();
        } else {
            $this->index();
        }
    }   
    
    function editProduct(){
                
        if($this->isLogged()){
            $idProduct = Request::read('idProduct');
            $nombre = Request::read('nombre');
            $pvp = Request::read('pvp');
            $familia = Request::read('familia');  

            $product = new Product();
            $product->setId($idProduct);
            $product->setProduct($nombre);
            $product->setPrice($pvp);
            $product->setIdfamilia($familia); 
            $r = $this->getModel()->editProduct($product);
            if($r!==-1){
                $products=$this->getModel()->getProductParaJson();
                $this->getModel()->setDato('listado', $products);
            }else{
                $this->getModel()->setDato('listado', $products);
            }                
        }else {
            $this->getModel()->setDato('r', false);
        }  
       
    }   
    

    
}