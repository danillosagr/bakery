$('document').ready(function(){
	
/* **********************	Variables globales   *****************************************/
 	var mensajes = [
 		'Ok',
 		'El campo no tiene la longitud correcta',
 		'El campo no tiene el formato correcto',
 		'Tiene que seleccionar un valor',
 		'Las claves no coinciden',
 		'El formato del DNI no es correcto',
 		'El formato del NIE no es correcto',
 		'formato incorrecto de CIF',
 		'formato incorrecto'], 
 		letras = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'],
 		letrasToNum = ['A','B','C','D','E','F','G','H','J','U','V'],
 		letrasToLetra = ['N','P','Q','R','S','W'],
 		digitosLetras = ['0','A','B','C','D','E','F','G','H','J'],
 		digitos = []; 		
		
	var expPassw = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_]/,  //valida password	
		expEmail = /.{1,}@[a-z]{1,}\.[a-zA-Z\d]{1,}$/,           //valida email
		expTel = /^[9|6|7][0-9]{8}$/,                            //valida teléfono
		expNumEnt = /^\d*$/,                                     //valida números enteros
		expCp = /^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/,              //valida códigos postales españoles
	//	expUsu = /^[a-z\d_]{5,40}$/,                             //valida usuario con 5 caracteres mínimo y 40 máx.
		expUsu = /^[a-zA-Z\d_]{5,40}$/,
		expNif = /^[0-9]{8}[A-Z]$/,
    	expNie = /^[XYZ][0-9]{7}[A-Z]$/,
 		expText = /^[a-zA-Z ]*$/,	         //exp regular para que el campo nombre sólo pueda contener letras
		expNum = /^[0-9]+(\.[0-9]+)?$/;		//exp regular para que el campo pvp sólo pueda contener números y decimales 
				
		
		
 	//Formulario Alta Usuarios	
 	var	minuser = 5,
		maxuser = 40,
		minpass = 6,
		maxpass = 15;
	
	//Formulario Alta Clientes
	var minnomb = 5,
		maxnomb = 40,
		mindoc = 9,
		maxdoc = 9,
		minloc = 5,
		maxloc = 40,
		mincp = 5,
		maxcp = 5,
		minemail = 1,
		maxemail = 100,
		mintel = 9,
		maxtel = 9;
		
	//Formulario Alta Familias
	var minfam = 1,
		maxfam = 40;	
	

/* **********************	Selección de elementos   **************************************/
 	var errorform = $('#errorForm'),
 		mensaje = $('.exigido'),
  		btn1 = $('#btn1');
 	
 	//Formulario Alta Usuarios
 	var user = $('#user'),
 		pass = $('#passw'),
		pass2 = $('#passw2'),
		formAddMember = $('#formAddMember');

	//Formulario Alta Clientes
	var nombre = $('#name'),
		apellido = $('#surname'),
		documento = $('#document'),
		direccion = $('#address'),
		localidad = $('#location'),
		codpostal = $('#cp'),
		provincia = $('#province'),
		email = $('#email'),
		telefono = $('#telef'),
		formAddClient = $('#formAddClient');
		
 	//Formulario Alta Familias
 	var familia = $('#familia'),
		formAddFamily = $('#formAddFamily');	
		
 	//Formulario Alta Productos
 	var producto = $('#product'),
 		precio = $('#price'),
 		familia2 = $('#familia2'),
		formAddProduct = $('#formAddProduct');			
		

/* **********************	Asignación de eventos   **************************************/
	btn1.on('click',recargar);
	
	//Formulario Alta Usuarios
	user.on('focusout', {campo: user, min: minuser, max: maxuser, exp: expUsu},validateExp);	
	pass.on('focusout', {campo: pass, min: minpass, max: maxpass, exp: expPassw},validateExp);
	pass2.on('focusout',{campo: pass, verifi: pass2},validatePass);
	formAddMember.on('submit',verifyForm); 	
 	
 	//Formulario Alta Clientes
	nombre.on('focusout', {campo: nombre, min: minnomb, max: maxnomb},validateText);
	documento.on('focusout',{campo: documento},validateDocu);
	localidad.on('focusout', {campo: localidad, min: minloc, max: maxloc},validateText);
	codpostal.on('focusout', {campo: codpostal, min: mincp, max: maxcp, exp: expCp},validateExp);
	email.on('focusout', {campo: email, min: minemail, max: maxemail, exp: expEmail},validateExp);
	telefono.on('focusout', {campo: telefono, min: minemail, max: maxemail, exp: expTel},validateExp);	
	formAddClient.on('submit',verifyForm1); 
 
  	//Formulario Alta Familias
	familia.on('focusout', {campo: familia, min: minfam, max: maxfam, exp: expText},validateExp);  	
	formAddFamily.on('submit',verifyForm2); 	
  	
   	//Formulario Alta Productos
	producto.on('focusout', {campo: producto, min: minnomb, max: maxnomb, exp: expText},validateExp);  
	precio.on('focusout', {campo: precio, min: minemail, max: maxcp, exp: expNum}, validateExp);	
	familia2.on('focusout',{campo: familia2, min: minfam, max: maxfam},validateText);  	
	formAddProduct.on('submit',verifyForm3); 
 
 
/* **********************	Funciones generales   **************************************/
  	
 	//Crea los span en los input para indicar que son obligatorios y añadir mensajes de error .
 	mensaje.each(function(indice, elemento){					
		var span = '<span>*</span>';
        $(this).after(span);                           
    });
    
	function longitud(campo,min,max){
		var campoV = campo.val();
		var long = campoV.length;
		if (long < min || long > max){
			return false;
		}else {
			return true;
		}
		
	}
	
	function verificaExpReg(campo,exp) {
		var campoV = campo.val();		
		if (campoV.match(exp)) {
			return true;
		}else {
			return false;			
		}
	}	
	
    function isNumber(cadena) {
	    var numero = parseInt(cadena);
	    if (!isNaN(numero)) {                     // isNaN (Not a Number) devuelve true si NO es número y false si SI es número
	        return true;
	    } else {
	        return false;
	    }
    }
    
	function sacarCadena(cadena,pos,long){
		var digito = cadena.substr(pos,long);
		return digito;
	}    

    function verificaDNI(dni){
		var dig1 = sacarCadena(dni,0,1)
		var letra = sacarCadena(dni,8,1);
		var num = sacarCadena(dni,0,8)
		var	numN = parseInt(num);
		var numC = numN.toString();
		if (dig1 == '0'){
			var longitud = 7;
		}else {
			var longitud = 8;
		}
		if(numC.length == longitud){
			var letraDni = letra.toUpperCase();
			var posLetra = letras.indexOf(letraDni, 0);
			var resto = numN % 23;
			if (resto == posLetra){
				return true;
			}else {
				return false;
			}
		}else {
			return false;
		}
    }
    
    function verificaNIE(campo,dig){
    	switch(dig) {
    		case "X":
    			var dig1 = 0;
    			break;
    		case "Y":
    		    var dig1 = 1;
    			break;
    		case "Z":
    			var dig1 = 2;    		
    			break;
    	}
    	var num = sacarCadena(campo,1,8);
    	var docu = dig1+num;
    	if (verificaDNI(docu)){
    		return true;
    	}else {
    		return false;
    	}
    }  
    
    function calculaDCcif(valor){
    	digitos.length = 0;
    	for (var i = 0; i < 8; i++){
    		var dig = sacarCadena(valor,i,1);
    		digN = parseInt(dig);
    		digitos[i] = digN;
    	}
    	var sumPar = 0;
    	for (var i = 1; i < 7; i++){
    		i = i +1;
    		sumPar = sumPar + digitos[i];
    	}
    	var sumImpar = 0;
    	var opeImp = 0;
    	var y = 0;
    	for (var i = 1; i < 8; i++){
    		opeImp = digitos[i]*2;
    		if (opeImp < 10){
    			sumImpar = sumImpar + opeImp;
    		}else {
    			var opeImpC = opeImp.toString();
				var digC1 = sacarCadena(opeImpC,0,1);
				var digC2 = sacarCadena(opeImpC,1,1);				
				var digN1 = parseInt(digC1);		
				var digN2 = parseInt(digC2); 
				sumImpar = sumImpar + digN1 + digN2;   			
    		}
    		i = i + 1;
    	}
		var res = sumPar + sumImpar;
		var resC = res.toString();
		var posic = resC.length;
		var uni = sacarCadena(resC,posic-1,1);
		var uniN = parseInt(uni);
		var dc = 10 - uniN;
		return dc;
    }    

	function recargar(){
		window.location.href = "index.php?ruta=index&accion=index";	
	}    
    

/* ****************	 Funciones para validar campo cuando pierde el foco   ******************/
  
	function validateText(e){
		$(this).next().text('')		
		var campo = e.data.campo;
		var min = e.data.min;
		var max = e.data.max;		
		if (longitud(campo,min,max)){
			$(this).next().text(mensajes[0]);
			return true;			
		}else {
			$(this).next().text(mensajes[1]);						
			return false;			
		}
	}
	
 	function validateExp(e){
		$(this).next().text(''); 		
 		var campo = e.data.campo;
 		var min = e.data.min;
 		var max = e.data.max; 		
 		var exp = e.data.exp; 		
		if (longitud(campo,min,max)){ 		
			if (verificaExpReg(campo,exp)) {
				$(this).next().text(mensajes[0]);				
			}else {
				$(this).next().text(mensajes[2]);				
			} 	
		}else {
			$(this).next().text(mensajes[1]);			
		}			
	} 	
	
	function validatePass(e){
		var campo = e.data.campo;
		var verifi = e.data.verifi;
		var campo1 = campo.val();
		var verifi1 = verifi.val();
 		if (campo1 === verifi1){
			$(this).next().text(mensajes[0]);
 			return true;
 		}else {
 			$(this).next().text(mensajes[4]);
			return false;
 		}
	}
	
	function validateLong(e){
 		var campo = e.data.campo;
 		var min = e.data.min;
 		var max = e.data.max;
		var campoV = campo.val();
		var long = campoV.length;
		if (long < min || long > max){
			$(this).next().text(mensajes[1]);			
			return false;
		}else {
			$(this).next().text(mensajes[0]);			
			return true;
		} 		
	}
	
	function validateDocu(e){
		$(this).next().text('');		
		var campo = e.data.campo;
		var campoOk = validateDocuF(campo);
		if (campoOk){
			$(this).next().text(mensajes[0]);
		}else {
			$(this).next().text(mensajes[8]);
		}
	}			
	
	
/* ****************	Funciones para validar al pulsar botón "Guardar (Submit)" ****************/
 
	function verifyForm(e){
		var userOk = validateExpF(user,minuser,maxuser);
		var passOk = validateExpF(pass,minpass,maxpass);
		var pass2Ok = validatePassF(pass,pass2);
		if (userOk && passOk && pass2Ok) {

		}else {
			errorform.text('Hay errores, revise el formulario')
			e.preventDefault();	
		}
	}	
	
	function verifyForm1(e){
		var nombreOk = validateTextF(nombre,minnomb,maxnomb);
		var documentoOk = validateDocuF(documento);
		var localidadOk = validateTextF(localidad,minloc,maxloc);
		var codpostalOk = validateExpF(codpostal,mincp,maxcp,expCp);
		var emailOk = validateExpF(email,minemail,maxemail,expEmail);
		var telefonoOk = validateExpF(telefono,mintel,maxtel,expTel);		
		
		if (nombreOk && documentoOk && localidadOk && codpostalOk && emailOk && telefonoOk) {

		}else {
			errorform.text('Hay errores, revise el formulario')
			e.preventDefault();	
		}
	}
	
	function verifyForm2(e){
		var familiaOk = validateExpF(familia,minfam,maxfam,expText);
		if (familiaOk) {

		}else {
			errorform.text('Hay errores, revise el formulario')
			e.preventDefault();	
		}
	}
	
	function verifyForm3(e){
		var productoOk = validateExpF(producto,minnomb,maxnomb,expText);
		var precioOk = validateExpF(precio, minemail, maxcp, expNum);
		var familiaOk = validateTextF(familia, minfam, maxfam);
		
		
		if (productoOk && precioOk && familiaOk) {

		}else {
			errorform.text('Hay errores, revise el formulario')
			e.preventDefault();	
		}
	}
	
	function validateTextF(campo,min,max){
		if (longitud(campo,min,max)){
			return true;			
		}else {
			return false;			
		}
	}	

	function validateExpF(campo,min,max,exp){
		if (longitud(campo,min,max)){ 	
			if (verificaExpReg(campo,exp)) {
				return true;
			}else {
				return false;
			} 	
		}else {
			return false;
		}			
	}	
	
 	function validatePassF(campo,verifi){
		var campoV = campo.val();
		var verifiV = verifi.val();
 		if (campoV === verifiV){
			$(this).next().text(mensajes[0]);
 			return true;
 		}else {
 			$(this).next().text(mensajes[4]);
			return false;
 		}
	}	
	
	function validateLongF(campo, min, max){
		var campoV = campo.val();
		var long = campoV.length;
		if (long < min || long > max){
			$(this).next().text(mensajes[1]);			
			return false;
		}else {
			$(this).next().text(mensajes[0]);			
			return true;
		} 		
	}
	
	function validateDocuF(campo){
		$(this).next().text('');		
		var campoV = campo.val();
		var long = 9;
		if (longitud(campo,long)){
			var dig1 = sacarCadena(campoV,0,1);
			if (isNumber(dig1)){
				if(verificaDNI(campoV)){
					return true;
				}else {
					return false;
				}
			}else {
				var dig8 = sacarCadena(campoV,8,1);
				dig1 = dig1.toUpperCase();
				dig8 = dig8.toUpperCase();
				if (dig1 == 'X' || dig1 == 'Y' || dig1 == 'Z'){
					if (verificaNIE(campoV,dig1)){
						return true;
					}else {
						return false;
					}
				}else {
					var posLetra = letrasToLetra.indexOf(dig1, 0);              
					if (posLetra == -1){                                        //El digito 1(letra) no esta en Letra -> letra
						var posLetra = letrasToNum.indexOf(dig1, 0);
						if (posLetra == -1){                                    // El digito 1(letra) no esta en Letra -> Número 
							return false;                    
						}else {
							var dc = calculaDCcif(campoV);
							if (dc == dig8){
								return true;	
							}else {
								return false;
							}
						}  
					}else {
						var dc = calculaDCcif(campoV);	
						var dcL = digitosLetras[dc];
						if (dcL== dig8){
							return true;	
						}else {
							return false;
						}
					} 
				}
			}
		}else {
			$(this).next().text(mensajes[1]);						
			return false;			
		}
	}	
	
});