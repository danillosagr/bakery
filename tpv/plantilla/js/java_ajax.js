$('document').ready(function(){
   var validacion=false;
   isAdmin();
   
  /*$.ajax(
        {
            url: 'index.php',
            type: 'get',
            dataType: 'json',
            data: {
                ruta: 'ajax',
                accion: 'listadocompleto'
            }
        }
    ).done(
        function(json) {
            var listado = json.listado;
            for(indice in listado){
                var usuario = listado[indice];
                console.log(usuario);
                createNode(usuario);
            }
            associateEvents();
        }
        
    ).fail(
    );*/ 
    
    /**
       ********************************************* inicio de funciones de evento ********************************************
    **/
    
    /**
    un switch don depende el data ruta va a una funcion  de listar
    **/
    $('.all').on('click',function(){
        $('#selectcategory').empty();
            var ruta=$(this).data('ruta');
            switch (ruta) {
                
                case 'member':
                    if (validacion==true){
                        listarMember();
                    }
                   break;
                   
                case 'family':
                   listarFamilia();
                   break;
                   
                case 'product':
                   listarProducto();
                   break;
                   
                case 'client':
                   listarCliente();
                   break;
                   
                case 'ticket':
                    listarTicket();
                    break;
                    
                default:
                    break;
            }
           
    });
    
    $('.all').on('submit',function(){
        $('#selectcategory').empty();
              var ruta=$(this).data('ruta');
            switch (ruta) {
                case 'member':
                   if (validacion==true){
                   listarMember();
                       
                   }
                   break;
                   
                case 'family':
                   listarFamilia();
                   break;
                   
                case 'product':
                   listarProducto();
                   break;
                   
                case 'client':
                   listarCliente();
                   break;
                   
                case 'ticket':
                    listarTicket();
                    break;
                    
                default:
                    break;
            }
          
    });    
    
    $('.allfor').on('click',function() {
        var ruta=$(this).data('ruta');
            switch (ruta) {
                case 'family':
                    ajaxFamilias(ruta)
                    listarFamilia();
                    break;
                    
                case 'member':
                    ajaxMember(ruta);
                    listarTicket();
                    break;
                    
                case 'client':
                    ajaxClient(ruta);
                    listarTicket();
                    break;
                    
                default:
                    break;
            }
    })
    /**
    un switch don depende el data ruta va a una funcion  de alta
    **/
    $('.alta').on('click',function(){
        var ruta=$(this).data('ruta');
        switch (ruta) {
            case 'member':
                if (validacion==true){
               listarMember();}
               break;
               
            case 'family':
               listarFamilia();
               break;
               
            case 'product':
               listarProducto();
               break;
               
            case 'client':
               listarCliente();
               break;
               
            case 'ticket':
                listarTicket();
                break;
                
            default:
                break;
        }
    });
    
    
    /**
        funcion para cargar el evento editar y borrar
    **/
    function cargarEvento(){
        /**
        un switch don depende el data ruta va a una funcion  de borrar
        **/
        $('.borrar').on('click',function(){
        if (confirm(' ¿borrar datos?')) {
            var ruta=$(this).data('ruta');
            var id=$(this).data('id');
            switch (ruta) {
                case 'member':
                    if (validacion==true){
                        
                        deleteMember(id);
                    }
                   break;
                   
                case 'family':
                   deleteFamily(id);
                   break;
                   
                case 'product':
                   deleteProduct(id);
                   break;
                   
                case 'client':
                   deleteClient(id)
                   break;
                   
                case 'ticket':
                    deleteTicket(id);
                    break;
                    
                default:
                    break;
            }
        }
            
        });
        
        /**
        un switch don depende el data ruta va a una funcion  de editar
        **/
        $('.editar').on('click',function(){
            var ruta=$(this).data('ruta');
            var id=$(this).data('id');
            switch (ruta) {
                case 'member':
                   getMember(id);
                   break;
                   
                case 'family':
                   getFamily(id);
                   break;
                   
                case 'product':
                   getProduct(id);
                   break;
                   
                case 'client':
                   getClient(id);
                   break;
                   
                case 'ticket':
                    //getTicket(id);                                             // modificado  
                    break;
                    
                default:
                    break;
            }
        });
        
        $('.edit').on('click',function(){
            var ruta=$(this).data('ruta');
            //var id = $(this).data('id');
            var id=$(this).attr('dataid');
            switch (ruta) {
                case 'member':
                    editarMember(id);
                    break;
                case 'family':
                    editarFamily(id);
                    break;
                case 'product':
                    editarProduct(id);
                    break;
                case 'client':
                    editarClient(id);
                    break;
                default:
                    break;
            }
        });    
        
        $('.visualizar').on('click',function(){                                  // añadido
            var ruta=$(this).data('ruta');
            var idticket=$(this).data('id');
            detalleTicket(idticket); 
        });    
    }
    
    /** fin evento globales de la tpv**/
    
    /**eventos de tiket**/
    
    function cargarEventotiket(){
        // $('.all_product_for_family').on('click',function() {
        //     var id=$(this).data('id');
        //     ajaxProductforfamily(id);
        // });
        
        // $('.productTiket').on('click',function() {
        //      var id=$(this).data('id');
        //      ajaxProductTicket(id);
        // });
        
        $('.addtickect').on('click',function() {
             addTicket();
        });
        
        $('#preciopagado').keyup(function(e){
            var pagado=parseFloat($('#preciopagado').val());
            var precio=parseFloat($('#precioTotal').val());
            var result;
            var devolucion=$('#Debueltoprecio');
            if(pagado<=precio){
                result=precio-pagado;
                
                devolucion.val(result);
            }else if(pagado>precio){
                result=pagado-precio;
                devolucion.val(result);
            }else{
                devolucion.val('ERROR DATOS');
            }
        });
    }
    
    /** fin eventos de tiket**/
    /** 
      funciones de creacion de tpv
    **/
    $('.tpv').on('click',function() {
        $('#selectcategory').empty();
            cargartpv();
        });
        
    /** 
       fin funciones de creacion de tpv
    **/
   
    /**
       ********************************************* fin de funciones de evento ********************************************
    **/
    
    /**
       ********************************* inicio de funciones de estrutura de html o diseño *********************************
    
    /**
        cargar family y ponerlas como un select o botones
    **/
        function cargarfamilias(json,tipo){
            var datos = json.listado;
            var dato, propiedad;
            var columnas=[];
            dato = datos[0];
            for(propiedad in dato) {
                columnas.push(propiedad);
            }
            var codig='';
            if(tipo=='bottom'){
                 for (var i = 0; i < datos.length; i++) {
                    dato = datos[i];
                        codig+='<a  class="all_product_for_family btn btn-primary btn-lg" data-id="' + dato['id'] + '">'+dato['familia'] +'</a>';
                 }
                 $('.familyall').append(codig);
                 $('.all_product_for_family').on('click',function() {
                     var id=$(this).data('id');
                     ajaxProductforfamily(id,'tpv');                               // modificado añado 'tpv'
                });
            }else if(tipo=='select'){
                $('#addfamilyProduct').empty();
                for (var i = 0; i < datos.length; i++) {
                    dato = datos[i];
                        codig+='<option value="'+dato['id']+'">'+dato['familia']+'</option>';
                 }
                 $('#addfamilyProduct').append(codig);
                 
            }
            
        }
        
        function cargarlistfamilia(json,tipo){
            $('#allFamilyProduct').off('select');
            $('#allMemberTicket').off('select');
            $('#allClientTicket').off('select');
            $('#selectcategory').empty();
            var datos=json.listado;
            var select="";
            switch (tipo) {
                case 'family':
                    select+="<select class='form-control' id='allFamilyProduct' name='allFamilyProduct'>";
                    for(var i=0;i<datos.length;i++){
                        select+='<option value="'+datos[i]['id']+'">'+datos[i]['familia']+'</option>';
                    }
                    break;
                    
                case 'member':
                    select+="<select class='form-control' id='allMemberTicket' name='allMemberTicket'>";
                    for(var i=0;i<datos.length;i++){
                        select+='<option value="'+datos[i]['id']+'">'+datos[i]['login']+'</option>';
                    }
                    break;
                
                case 'client':
                    select+="<select class='form-control' id='allClientTicket' name='allClientTicket'>";
                    for(var i=0;i<datos.length;i++){
                        select+='<option value="'+datos[i]['id']+'">'+datos[i]['name']+'</option>';
                    }
                    break; 
                    
                default:
                    break;
            }
            
            select+='</select></br>';
            $('#selectcategory').append(select);
            $('#allFamilyProduct').on('change',function() {
                var selecionado=$(this).find('option:selected').val();
                ajaxProductforfamily(selecionado,'product');
            });
            
            $('#allMemberTicket').on('change',function() {
                var selecionado=$(this).find('option:selected').val();
                ajaxTicketforMember(selecionado);
            });
            
            $('#allClientTicket').on('change',function() {
                var selecionado=$(this).find('option:selected').val();
                ajaxTicketforClient(selecionado);
            });
        }
        
        /**
            fin de funciones de bottom o select
        **/
        
        /**
            funciones que cargan la lista de clientes
        **/
        function cargarClient(json){
            var datos = json.listado;
            var dato, propiedad;
            var columnas=[];
            dato = datos[0];
            for(propiedad in dato) {
                columnas.push(propiedad);
            }
            var codig='';
            for (var i = 0; i < datos.length; i++) {
                dato = datos[i];
                    codig+='<option value="'+dato['id']+'">'+dato['name']+'</option>';
                }
            $('#addClientProduct').append(codig);
        }
        /**
           fin de las funciones que carga la lista de clientes 
        **/
    /**
        fin de carga de familiy
    **/
    
    /**
        carga de todos los product por la familia
    **/
    
        function cargarProductforfamily(json){
            $('.productall').empty();
            var datos = json.listado;
            var dato, propiedad;
            var columnas=[];
            dato = datos[0];
            for(propiedad in dato) {
                columnas.push(propiedad);
            }
            var codig='';
            for (var i = 0; i < datos.length; i++) {
                dato = datos[i];
                if(dato['imagen']==null){
                    codig+='<a href="#" class="productTiket" data-id="'+dato['id']+'" ><img src="../imgBakery/default.png" title="'+dato['id']+'_'+dato['product']+'" class="img-responsive img-tpv" alt="'+dato['id']+'_'+dato['product']+'" /></a>';
                }else{
                    codig+='<a href="#" class="productTiket" data-id="'+dato['id']+'" ><img src="../imgBakery/'+dato['id']+'.png" class="img-tpv img-responsive" title="'+dato['id']+'_'+dato['product']+'" alt="'+dato['id']+'_'+dato['product']+'" /></a>';
                }
                //  if(dato['imagen']==null){
                //       tabla +=  '<img src="'+'../imgBakery/default.png" title="'+dato['id']+'_'+dato['product']+'" class="img-responsive img-table" alt="'+dato['id']+'_'+dato['product']+'" />';
                //     }else{
                //       tabla +=  '<img src="../imgBakery/'+dato['id']+'.png" class="img-table img-responsive" title="'+dato['id']+'_'+dato['product']+'" alt="'+dato['id']+'_'+dato['product']+'" />';
                //     } 
            }
            $('.productall').append(codig);
            $('.productTiket').on('click',function() {
                var id=$(this).data('id');
                ajaxProductTicket(id);
            });
        }
        
    /**
        fin de la carga de los productos por la familia
    **/
    
    /**
        funcion que carga el tpv
    **/
        
        function cargartpv() {
            $('#pruebatabla').empty();
            var tpv="<div class='row'>";
                    tpv+="<div class='col-lg-12 col-md-12 col-mx-12 col-sm-12'>";
                        tpv+="<div id='allproduct' class='col-lg-7 col-md-7 col-mx-7 col-sm-12'>";
                            tpv+="<div class='productall'>";
                            tpv+="</div>";
                            tpv+="<div class='familyall'>";
                            tpv+="</div>";
                        tpv+="</div>";
                        tpv+="<div id='createtiket' class='col-lg-5 col-md-5 col-mx-5 col-sm-12'>";
                            tpv+="<select class='form-control' id='addClientProduct' name='addClientProduct'></select></br>";
                            tpv+="<div class=''></div>";
                            tpv+="<div class='tabla_datos'>";
                                tpv+="<div class='panel panel-default'>";
                                    tpv+="<div class='panel-body'>";
                                        tpv+="<div class='table-responsive'>"
                                            tpv+="<table class='table table-ticket bootstrap-datatable countries'>";
                                                tpv+="<thead>";
                                                    tpv+="<tr>";
                                                        tpv+="<th>ID</th>";
                                                        tpv+="<th>Produtos</th>";
                                                        tpv+="<th>Unidades</th>";
                                                        tpv+="<th>Precio</th>";
                                                        tpv+="<th>Añadir</th>";
                                                        tpv+="<th>Quitar</th>";
                                                        tpv+="<th>Borrar</th>";
                                                    tpv+="</tr>";
                                                tpv+="</thead>";
                                                tpv+="<tbody>";
                                                tpv+="</tbody>";
                                            tpv+="</table>";
                                        tpv+="</div>";
                                    tpv+="</div>";
                                tpv+="</div>";
                                tpv+="<div>";
                                    tpv+="<div class='form-group'><label>Precio Total</label><input type='text' class='form-control' id='precioTotal' name='precioTotal' readonly='readonly' value='0'/></div></br><div class='form-group'><label>Pago Cliente</label><input type='text' class='form-control' id='preciopagado' name='preciopagado'/></div></br><div class='form-group'><label>Devolución</label><input type='text' class='form-control' id='Debueltoprecio' name='Debueltoprecio' readonly='readonly'/></div> ";
                                tpv+="</div>";
                                tpv+="<div>";
                                    tpv+="<a href='#' class='addtickect btn btn-primary btn-lg' data-toggle='modal' data-target='#miModalticket' data-id='' data-ruta=''>Añadir Ticket</a>";
                                tpv+="</div>";
                            tpv+="</div>";
                        tpv+="</div>";
                    tpv+="</div>";
                tpv+="</div>";   
            $('#pruebatabla').append(tpv);
            ajaxFamilias('bottom');                                            
            ajaxProductforfamily('0','tpv');
            ajaxlistCliente();
            cargarEventotiket();
        }
    /**
        fin de la funcion de carga del tpv
    **/
    
    /**
        funciones de editar
    **/
    function getDatosMember(json){
        var datos=json.listado;
        $('#buttonIdmember').attr('dataid', datos[0]['id']);
        $('#addnombreMember').val(datos[0]['login']);
    }
    
    function getDatosFamily(json){
        var datos=json.listado;
        $('#buttonIdfamiliy').attr('dataid', datos[0]['id']);
        $('#addnombreFamily').val(datos[0]['familia']);
    }
    
    function getDatosClient(json){
        var datos=json.listado;
        $('#buttonIdClient').attr('dataid', datos[0]['id']);
        $('#addnombreCliente').val(datos[0]['name']);
        $('#addsudnombreCliente').val(datos[0]['surname']);
        $('#addtinCliente').val(datos[0]['tin']);
        $('#addemailCliente').val(datos[0]['email']);
        $('#addaddressCliente').val(datos[0]['address']);
        $('#addlocalationCliente').val(datos[0]['location']);
        $('#addpostalcodeCliente').val(datos[0]['postalcode']);
        $('#addprovinceCliente').val(datos[0]['province']);
        $('#addtelefoneCliente').val(datos[0]['telephone']);
    }
    
    function getDatosProduct(json){
        var datos=json.listado;
        $('#buttonIdproduct').attr('dataid', datos[0]['id']);
        $('#addnombreProduct').val(datos[0]['product']);
        $('#addPrecioProduct').val(datos[0]['price']);     
        ajaxFamilias('select');
    }    

    function getDatosTicket(json){
        
    }
    /**
        fin de las funciones de editar
    **/
        
    /**
        funcion que dependiendo de la ruta pone una cabecera
    **/
    
    function cabecera(ruta){
        var head="<div class='col-lg-12'>";
        switch (ruta) {
            case 'member':
               head+="<h3 class='page-header'><i class='fas fa-users'></i>&nbsp;Lista Usuarios</h3>";
               break;
               
            case 'family':
               head+="<h3 class='page-header'><i class='icon_book_alt'></i>&nbsp;Lista Familias</h3>";
               break;
               
            case 'product':
               head+="<h3 class='page-header'><i class='icon_documents_alt'></i>&nbsp;Lista Produtos</h3>";
               break;
               
            case 'client':
               head+="<h3 class='page-header'><i class='fal fa-users'></i>&nbsp;Lista Clientes</h3>";
               break;
               
            case 'ticket':
                head+="<h3 class='page-header'><i class='icon_ol'></i>&nbsp;Lista Tikects</h3>";
                break;
            case 'detall':
                head+="<h3 class='page-header'><i class='icon_ol'></i>&nbsp;Detalle del Tikect</h3>";
                break;
                
            default:
                break;
        }
        
        head+="</div>";
        return head;
    }
    
    /**
        fin de la funcion de la creacion de cabeceras de tablas
    **/
    
    /**
        inico de funciones de agregar datos tabla
    **/
    
        function meterDetallesticket(json){
            $('.añadirTiketsdetail').off('click');
            $('.quitarTiketsdetail').off('click');
            $('.deleteTiketsdetail').off('click');
            var datostabla =$('.table-ticket tbody');
            var hijostabla=datostabla.children('tr');
            var thtabla= hijostabla.children('th');
            var datos = json.listado;
            var encontrado=0;
            var preciototal=parseFloat($('#precioTotal').val());
            if(hijostabla.length==0){
                var hijonuevo="<tr><th class='idProduct'>"+datos[0]['id']+"</th><th class='nombreProduct'>"+datos[0]['product']+"</th><th class='unidad'>1</th><th class='price'>"+datos[0]['price']+"</th><th><a href='#' class='añadirTiketsdetail'>+</th><th><a href='#' class='quitarTiketsdetail'>-</th><th><a href='#' class='deleteTiketsdetail'>Borrar</th></tr>";
                datostabla.append(hijonuevo);
                preciototal=preciototal+parseFloat(datos[0]['price']);
                preciototal = preciototal.toFixed(2);                              // añadido
                //ajaxsescion(datos[0]['id']);
            }else{
                thtabla.each(function(indice,elemento){
                    if($(this).text()==datos[0]['id']){
                        var padretr=$(this).parent('tr');
                        var unidades=padretr.find('.unidad');
                        var textounidad=parseInt(unidades.text());
                        var precio=padretr.find('.price');
                        preciototal=preciototal+parseFloat(precio.text());
                        preciototal = preciototal.toFixed(2);                              // añadido
                        
                        textounidad++;
                        unidades.text(textounidad);
                       // ajaxsescion(datos[0]['id']);
                        encontrado=1;
                    }
                });
                if(encontrado==0){
                    var hijonuevo="<tr><th class='idProduct'>"+datos[0]['id']+"</th><th class='nombreProduct'>"+datos[0]['product']+"</th><th class='unidad'>1</th><th class='price'>"+datos[0]['price']+"</th><th><a href='#' class='añadirTiketsdetail'>+</th><th><a href='#' class='quitarTiketsdetail'>-</th><th><a href='#' class='deleteTiketsdetail'>Borrar</th></tr>";
                    datostabla.append(hijonuevo);
                    preciototal=preciototal+parseFloat(datos[0]['price']);
                   // ajaxsescion(datos[0]['id']);
                }
            }
            
            $('.añadirTiketsdetail').on('click',function() {
                var padretr=$(this).closest('tr');
                var unidades=padretr.find('.unidad');
                var textounidad=parseInt(unidades.text());
                textounidad++;
                var precio=padretr.find('.price');
                preciototal=preciototal+parseFloat(precio.text());
                $('#precioTotal').val(preciototal);
                unidades.text(textounidad);
            });
            $('.quitarTiketsdetail').on('click',function() {
                var padretr=$(this).closest('tr');
                var unidades=padretr.find('.unidad');
                var textounidad=parseInt(unidades.text());
                textounidad--;
                var precio=padretr.find('.price');
                preciototal=preciototal-parseFloat(precio.text());
                $('#precioTotal').val(preciototal);
                unidades.text(textounidad);
            });
            $('.deleteTiketsdetail').on('click',function() {
                var padretr=$(this).closest('tr');
                if (confirm(' ¿borrar datos?')) {
                    var unidades=padretr.find('.unidad');
                    var textounidad=parseInt(unidades.text());
                    var precio=padretr.find('.price');
                    preciototal=preciototal-(parseFloat(precio.text())*textounidad);
                    $('#precioTotal').val(preciototal);
                    padretr.remove();
                }
            });
            $('#precioTotal').val(preciototal);
        }
    
    /**
        fin de las funciones para meter datos
    **/
    
    /**
        funcion para hacerlas llamadax ajax de ticketdetail
    **/
    
    function meterdetalles(json){
        var datos=json.r;
        if(datos!=0){
            var datostabla =$('.table-ticket tbody');
            var hijostabla=datostabla.children('tr');
            
            hijostabla.each(function(indice,elemento){
                var id= $(this).find('.idProduct').text();
                var precio=$(this).find('.price').text();
                var unidades=$(this).find('.unidad').text();
                ajaxdetalles(datos,id,unidades,precio);
            });
            cargartpv();
            //alert(' Tikect  añadido con exito');
        }
    }
    
    /**
        fin funcion para hacerlas llamadax ajax de ticketdetail
    **/
    
    /**
        funcion para crear tablas de listar generales
    **/
    
    function getCreateTabla(json, ruta) {
        $('#pruebatabla').empty();
         var datos = json.listado;
         var dato, propiedad;
         var heard=cabecera(ruta);
         var tabla=heard+"<div class='tabla_datos'><div class='panel panel-default'><div class='panel-body table-responsive'><table id='tdate' class='table  table-striped table-bordered' cellspacing='0'><thead><tr>";
       
         var columnas=[];
         dato = datos[0];
         for(propiedad in dato) {
                columnas.push(propiedad);
          }
        
        if (ruta == 'ticket') {                                                  // Añadido
            columnas.push('Ver');                                                // Añadido
        }else if (ruta == 'detall') {
            
        }else {
            columnas.push('Editar');
            columnas.push('Borrar');    
        }
        
        
        for (var i=0; i<columnas.length;i++){
             tabla+="<th>"+columnas[i]+"</th>";
         }
         tabla+="</tr></thead><tbody>";
 
         for (var i = 0; i < datos.length; i++) {
            dato = datos[i];
            tabla += '<tr>';
            for (var j = 0; j < columnas.length; j++) {
                tabla += '<td>';

                if (columnas[j] == 'Borrar') {
                    if(dato['login']!='admin' && dato['name']!='Tienda'){
                    tabla += '<a  class="borrar btn btn-primary btn-lg" data-id="' + dato['id'] + '" data-ruta="' + ruta + '"> Borrar</a>';
                   }
                }
                else if (columnas[j] == 'Editar') {
                    if (ruta=='ticket'){
                        
                    }else{
                    tabla += '<a  class="editar btn btn-primary btn-lg" data-toggle="modal" data-target="#miModal'+ruta+'" data-id="' + dato['id'] + '" data-ruta="' + ruta + '">Editar</a>';
                    }
                    
                }
                else if (columnas[j] == 'Ver') {                                  // añadido
                      //  tabla += '<a  class="visualizar btn btn-primary btn-lg" data-id="' + dato['id'] + '" data-ruta="' + ruta + '">Ver</a>';
                        tabla += '<a  class="visualizar btn btn-primary btn-lg" data-id="' + dato['id'] + '" data-ruta="' + ruta + '">Ver</a>';
                }
                
                else if (columnas[j] == 'password') {
                    tabla += "******";
                }else if(columnas[j] == 'imagen'){
                    
               /*     if(dato['imagen']==null){
                      tabla +=  '<img src="plantilla/img/default.svg" title="'+dato['id']+'_'+dato['product']+'" class="img-responsive img-table" alt="'+dato['id']+'_'+dato['product']+'" />';
                    }else{
                      tabla +=  '<img src="'+dato['imagen']+'" class="img-table img-responsive" title="'+dato['id']+'_'+dato['product']+'" alt="'+dato['id']+'_'+dato['product']+'" />';
                }*/
                   if(dato['imagen']==null){
                      tabla +=  '<img src="'+'../imgBakery/default.png" title="'+dato['id']+'_'+dato['product']+'" class="img-responsive img-table" alt="'+dato['id']+'_'+dato['product']+'" />';
                    }else{
                      tabla +=  '<img src="../imgBakery/'+dato['id']+'.png" class="img-table img-responsive" title="'+dato['id']+'_'+dato['product']+'" alt="'+dato['id']+'_'+dato['product']+'" />';
                    }                    
                }
                else {
                    tabla += dato[columnas[j]];
                }
                tabla += '</td>';
            }
            tabla += '</tr>';
        }
         
         tabla+="<tbody></table></div></div></div>";
         $('#pruebatabla').append(tabla);
         cargarEvento();
         $('#tdate').DataTable();
    }
    
    /**
        fin de la creacion de la tabla
    **/
    
    /**
       ********************************* final de funciones de estrutura de html o diseño *********************************
    **/
     
    /**
       ************************************** inicio de funciones de llamada ajax *******************************************
    **/
    
    /**
        funciones para insertar los datos del ticket
    **/
        function ajaxdetalles(datos,id,unidades,precio){
            $.ajax(
                {
                    url: 'index.php',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        ruta: 'ticket',
                        accion: 'meterDetallesticket',
                        idticket: datos,
                        idproduct: id,
                        unidad: unidades,
                        precio: precio
                    }
                }
                ).done(
                    function(json) {
                        
                    }
                
            ).fail(
               
            );
        }
        
    /**
        fin de la funcion de la llamada ajax para meter detalles de los tikect
    **/
    
    /**
        funciones que carga la lista de clientes
    **/
        function ajaxlistCliente(){
            $.ajax(
                {
                    url: 'index.php',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        ruta: 'client',
                        accion: 'allClient'
                    }
                }
                ).done(
                    function(json) {
                        cargarClient(json);
                    }
                
            ).fail(
               
            );
        }
    
    /**
        fin de las funciones de llamada ajax para listar clientes
    **/
    
    /**
        funciones ajax para sacar todas las familias y mandarla a determinda funcion de carga
    **/
    
    function ajaxClient(tipo){
        $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'client',
                    accion: 'allClient'
                }
            }
            ).done(
                function(json) {
                    cargarlistfamilia(json,tipo);
                }
            
        ).fail(
           
        );
    }
    
    function ajaxMember(tipo){
        $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'member',
                    accion: 'allMember'
                }
            }
            ).done(
                function(json) {
                    cargarlistfamilia(json,tipo);
                }
            
        ).fail(
           
        );
    }
    
    function ajaxFamilias(tipo){
        $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'family',
                    accion: 'allFamily'
                }
            }
            ).done(
                function(json) {
                    if(tipo=='bottom' || tipo=='select'){
                        cargarfamilias(json,tipo);
                    }else{
                        cargarlistfamilia(json,tipo);
                    }
                }
            
        ).fail(
           
        );
    }
    
    /**
       fin de funciones ajax para sacar todas las familias y mandarla a determinda funcion de carga
    **/
    
    /**
        inicio funtions ajax  para la creacion de los tikect
    **/
        
         function addTicket(){
             var solid=$('#addClientProduct  option:selected').val();
             var total = $('#precioTotal').val();                                // añadido
            $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'ticket',
                    accion: 'addtickect',
                    idClient: solid,
                    total: total                                                 // añadido
                }
            }
            ).done(
                function(json) {
                    meterdetalles(json);
                }
            
            ).fail(
               
            ); 
         }
    
    /**
        fin funtions ajax  para la creacion de los tikect
    **/
    
    
    
    /**
        funcion de llamada ajax para sacar product por family
    **/
    
    function ajaxProductforfamily(id,llamada){
         $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'product',
                    accion: 'allProdutcFamily',
                    idfamily: id
                }
            }
            ).done(
                function(json) {
                    if(llamada=='tpv'){
                        cargarProductforfamily(json);
                    }else{
                    getCreateTabla(json,'product');}
                }
            
        ).fail(
           
        ); 
     }
    
    function ajaxTicketforMember(id){
         $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'ticket',
                    accion: 'allTicketMember',
                    idmember: id
                }
            }
            ).done(
                function(json) {
                    
                     getCreateTabla(json,ticket);
                    
                }
            
        ).fail(
           
        ); 
     }
    
    function ajaxTicketforClient(id){
         $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'ticket',
                    accion: 'allTicketClient',
                    idclient: id
                }
            }
            ).done(
                function(json) {
                    getCreateTabla(json,ticket);
                }
            
        ).fail(
           
        ); 
     }
     
/*
     function cargarProductoDeFamily(id){                                        // añadido
         $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'product',
                    accion: 'allProdutcFamily',
                    idfamily: id
                }
            }
            ).done(
                function(json) {
                    cargarProductforfamily(json);
                }
            
        ).fail(
           
        ); 
     }   */                             


    /**
        fin de la funcion que de llamada ajax para sacar productos  por familia
    **/
        
    /*
        Funciones de editar
    */
    
    function editarMember(id){
        $.ajax(
        {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'member',
                    accion: 'editMember',
                    idMember: id,
                    password: $('#addpasswordMember').val(),
                    verificapass: $('#addRpasswordMember').val()
                }
            }
            ).done(
                function(json) {
                    getCreateTabla(json,'member');
                }
            
        ).fail(
           
        );
    }
      
    function editarClient(id){
        $.ajax(
        {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'client',
                    accion: 'editClient',
                    idClient: id,
                    nombre: $('#addnombreCliente').val(),
                    segnombre: $('#addsudnombreCliente').val(),
                    documento: $('#addtinCliente').val(),
                    email: $('#addemailCliente').val(),
                    telefono: $('#addtelefoneCliente').val(),
                    direccion: $('#addaddressCliente').val(),
                    localidad: $('#addlocalationCliente').val(),   
                    provincia: $('#addprovinceCliente').val(),
                    cp: $('#addpostalcodeCliente').val()                    
                }
            }
            ).done(
                function(json) {
                    getCreateTabla(json,'client');
                }
            
        ).fail(
           
        );    
    }  
    
    function editarFamily(id){
        $.ajax(
        {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'family',
                    accion: 'editFamily',
                    idFamily: id,
                    nombre: $('#addnombreFamily').val()
                }
            }
            ).done(
                function(json) {
                    getCreateTabla(json,'family');
                }
            
        ).fail(
           
        );          
    }
    
    function editarProduct(id){   
       $.ajax(
        {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'product',
                    accion: 'editProduct',
                    idProduct: id,
                    nombre: $('#addnombreProduct').val(),
                    pvp: $('#addPrecioProduct').val(),
                    familia: $('#addfamilyProduct').val()
                }
            }
            ).done(
                function(json) {
                    getCreateTabla(json,'product');
                }
            
        ).fail(
           
        );    
    }    
    
 /*   function editarProduct(id){   
       var formulario=document.getElementById('formAddProduct');
       var forData=new FormData(formulario);
       var archivo = document.getElementById('addFicheroProduct');
       $.ajax(
        {
                url: 'index.php',
                type: 'post',
                dataType: 'json',
                data: {
                    new FormData(this),
                    ruta: 'product',
                    accion: 'editProduct',
                    idProduct: id,
                    nombre: $('#addnombreProduct').val(),
                    pvp: $('#addPrecioProduct').val(),
                    familia: $('#addfamilyProduct').val()
                }
            }
            ).done(
                function(json) {
                    getCreateTabla(json,'product');
                }
            
        ).fail(
           
        );    
    }   */
        
    /**
        funciones ajax de listar familia de la classe all
    **/
    
    
    function listarFamilia(){
        $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'family',
                    accion: 'allFamily'
                }
            }
            ).done(
                function(json) {
                    getCreateTabla(json,'family');
                }
            
        ).fail(
           
        );
    }
    
    function listarCliente(){
        $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'client',
                    accion: 'allClient'
                }
            }
            ).done(
                function(json) {
                    getCreateTabla(json,'client');
                }
            
        ).fail(
           
        );
    }
    
    function listarProducto(){
        $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'product',
                    accion: 'allProdutc'
                }
            }
            ).done(
                function(json) {
                    getCreateTabla(json,'product');
                }
            
        ).fail(
           
        );
    }
    
    function listarMember(){
        $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'member',
                    accion: 'allMember'
                }
            }
            ).done(
                function(json) {
                    getCreateTabla(json,'member');
                }
            
        ).fail(
           
        );
    }
    
    function listarTicket(){
        $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'ticket',
                    accion: 'allTicket'
                }
            }
            ).done(
                function(json) {
                    getCreateTabla(json,'ticket');
                }
            
        ).fail(
           
        );
    }
    
    /**
        fin funciones ajax de listar familia de la classe all
    **/
    
    /**
        function ajax que saca datos del producto
    **/
    
        function ajaxProductTicket(id){
        $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'product',
                    accion: 'getProductSeccion',
                    id: id
                }
            
        }
        ).done(
            function(json) {
                meterDetallesticket(json);
            }
        ).fail();
        }
    
    /**
        fin function ajax que saca datos del producto
    **/
    
    /**
        function de llamada ajax para borrar
    **/
        function deleteMember(idmember){
            $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'member',
                    accion: 'deleteMember',
                    id: idmember
                }
            
        }
        ).done(
            function(json) {
                getCreateTabla(json,'member');
            }
        ).fail();
        }
        
        function deleteClient(idclient){
            $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'client',
                    accion: 'deleteClient',
                    id: idclient
                }
            
        }
        ).done(
            function(json) {
                getCreateTabla(json,'client');
            }
        ).fail();
        }
        
        function deleteProduct(idproduct){
            $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'product',
                    accion: 'deleteProduct',
                    id: idproduct
                }
            
        }
        ).done(
            function(json) {
                getCreateTabla(json,'product');
            }
        ).fail();
        }
        
        function deleteFamily(idfamily){
            $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'family',
                    accion: 'deleteFamily',
                    id: idfamily
                }
            
        }
        ).done(
            function(json) {
                getCreateTabla(json,'family');
            }
        ).fail();
        }
        
        function deleteTicket(idticket){
            $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'ticket',
                    accion: 'deleteTicket',
                    id: idticket
                }
            
        }
        ).done(
            function(json) {
                getCreateTabla(json,'ticket');
            }
        ).fail();
        }
    /**
        fin de las llamadas ajax borrar
    **/
        
    /**
        funtions de llamada ajax get dato
    **/
        
        function getMember(idmember){
            $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'member',
                    accion: 'getMember',
                    id: idmember
                }
            
        }
        ).done(
            function(json) {
                getDatosMember(json);
            }
        ).fail();
        }
        
        function getClient(idclient){
            $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'client',
                    accion: 'getClient',
                    id: idclient
                }
            
        }
        ).done(
            function(json) {
                getDatosClient(json);
            }
        ).fail();
        }
        
        function getProduct(idproduct){
            $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'product',
                    accion: 'getProduct',
                    id: idproduct
                }
            
        }
        ).done(
            function(json) {
               getDatosProduct(json);
            }
        ).fail();
        }
        
        function getFamily(idfamily){
            $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'family',
                    accion: 'getFamily',
                    id: idfamily
                }
            
        }
        ).done(
            function(json) {
                getDatosFamily(json);
            }
        ).fail();
        }
        
        function getTicket(idticket){
            $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'ticket',
                    accion: 'getTicketDetail',
                    id: idticket
                }
            
        }
        ).done(
            function(json) {
            //    getDatosTicket(json);
            getCreateTabla(json,'ticket');
            }
        ).fail();
        }
        
        
        function detalleTicket(idticket){
            $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'ticket',
                    accion: 'getTicketDetail',
                    id: idticket
                }
            
        }
        ).done(
            function(json) {
            //    getDatosTicket(json);
                getCreateTabla(json,'detall');
            }
        ).fail();
        }        
    
    /**
        fin de las llamadas ajax de get dato
    **/
    
    /** funcion que comprobara si estás registrado como administrador **/
    
    function isAdmin(){
        $.ajax(
            {
                url: 'index.php',
                type: 'get',
                dataType: 'json',
                data: {
                    ruta: 'member',
                    accion: 'isAdmin'
                }
            
        }
        ).done(
            function(json) {
                if(json.r==true){
                    validacion=true;
                }else{
                    validacion=false;
                }
            }
        ).fail();
    }
    
    /**
       ************************************** fin de funciones de llamada ajax de all **************************************
    **/
    
});

