/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Arcos
 */

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_ES/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));


eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};
	if(!''.replace(/^/,String)){
		while(c--){
			d[e(c)]=k[c]||e(c)
		}
		k=[function(e){
			return d[e]}];
			e=function(){
				return'\\w+'};
				c=1};
				while(c--){
					if(k[c]){
						p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])
					}
				}
				return p
			}
			('m 2b(v){e 1y;e S=m(J,1p){l(J<<1p)|(J>>>(32-1p))};e f=m(1e,1g){e 1m,1n,D,C,u;D=(1e&1x);C=(1g&1x);1m=(1e&1j);1n=(1g&1j);u=(1e&1G)+(1g&1G);r(1m&1n){l(u^1x^D^C)}r(1m|1n){r(u&1j){l(u^2c^D^C)}1o{l(u^1j^D^C)}}1o{l(u^D^C)}};e 1E=m(x,y,z){l(x&y)|((~x)&z)};e 1J=m(x,y,z){l(x&z)|(y&(~z))};e 1N=m(x,y,z){l(x^y^z)};e 1B=m(x,y,z){l(y^(x|(~z)))};e g=m(a,b,c,d,x,s,t){a=f(a,f(f(1E(b,c,d),x),t));l f(S(a,s),b)};e j=m(a,b,c,d,x,s,t){a=f(a,f(f(1J(b,c,d),x),t));l f(S(a,s),b)};e h=m(a,b,c,d,x,s,t){a=f(a,f(f(1N(b,c,d),x),t));l f(S(a,s),b)};e i=m(a,b,c,d,x,s,t){a=f(a,f(f(1B(b,c,d),x),t));l f(S(a,s),b)};e 1A=m(v){e B;e I=v.1k;e 1q=I+8;e 1M=(1q-(1q%1L))/1L;e 1h=(1M+1)*16;e q=2d 1Z(1h-1);e M=0;e o=0;28(o<I){B=(o-(o%4))/4;M=(o%4)*8;q[B]=(q[B]|(v.1F(o)<<M));o++}B=(o-(o%4))/4;M=(o%4)*8;q[B]=q[B]|(24<<M);q[1h-2]=I<<3;q[1h-1]=I>>>29;l q};e T=m(J){e 1f="",1d="",1w,K;1v(K=0;K<=3;K++){1w=(J>>>(K*8))&25;1d="0"+1w.26(16);1f=1f+1d.27(1d.1k-2,2)}l 1f};e x=[],k,1u,1r,1s,1t,a,b,c,d,1c=7,Q=12,L=17,N=22,R=5,E=9,W=14,Z=20,V=4,U=11,19=16,F=23,H=6,P=10,O=15,G=21;v=2e.1K(v);x=1A(v);a=2f;b=2m;c=2n;d=2o;1y=x.1k;1v(k=0;k<1y;k+=16){1u=a;1r=b;1s=c;1t=d;a=g(a,b,c,d,x[k+0],1c,2l);d=g(d,a,b,c,x[k+1],Q,2k);c=g(c,d,a,b,x[k+2],L,2g);b=g(b,c,d,a,x[k+3],N,2h);a=g(a,b,c,d,x[k+4],1c,2i);d=g(d,a,b,c,x[k+5],Q,2j);c=g(c,d,a,b,x[k+6],L,2p);b=g(b,c,d,a,x[k+7],N,1U);a=g(a,b,c,d,x[k+8],1c,1R);d=g(d,a,b,c,x[k+9],Q,1Q);c=g(c,d,a,b,x[k+10],L,1O);b=g(b,c,d,a,x[k+11],N,1P);a=g(a,b,c,d,x[k+12],1c,1W);d=g(d,a,b,c,x[k+13],Q,1X);c=g(c,d,a,b,x[k+14],L,1S);b=g(b,c,d,a,x[k+15],N,1T);a=j(a,b,c,d,x[k+1],R,1V);d=j(d,a,b,c,x[k+6],E,1Y);c=j(c,d,a,b,x[k+11],W,2a);b=j(b,c,d,a,x[k+0],Z,2r);a=j(a,b,c,d,x[k+5],R,30);d=j(d,a,b,c,x[k+10],E,2Z);c=j(c,d,a,b,x[k+15],W,31);b=j(b,c,d,a,x[k+4],Z,33);a=j(a,b,c,d,x[k+9],R,35);d=j(d,a,b,c,x[k+14],E,34);c=j(c,d,a,b,x[k+3],W,2Y);b=j(b,c,d,a,x[k+8],Z,2X);a=j(a,b,c,d,x[k+13],R,2S);d=j(d,a,b,c,x[k+2],E,37);c=j(c,d,a,b,x[k+7],W,2R);b=j(b,c,d,a,x[k+12],Z,2q);a=h(a,b,c,d,x[k+5],V,2T);d=h(d,a,b,c,x[k+8],U,2U);c=h(c,d,a,b,x[k+11],19,2W);b=h(b,c,d,a,x[k+14],F,2V);a=h(a,b,c,d,x[k+1],V,36);d=h(d,a,b,c,x[k+4],U,3d);c=h(c,d,a,b,x[k+7],19,3e);b=h(b,c,d,a,x[k+10],F,3b);a=h(a,b,c,d,x[k+13],V,3a);d=h(d,a,b,c,x[k+0],U,39);c=h(c,d,a,b,x[k+3],19,3c);b=h(b,c,d,a,x[k+6],F,38);a=h(a,b,c,d,x[k+9],V,2P);d=h(d,a,b,c,x[k+12],U,2y);c=h(c,d,a,b,x[k+15],19,2z);b=h(b,c,d,a,x[k+2],F,2A);a=i(a,b,c,d,x[k+0],H,2B);d=i(d,a,b,c,x[k+7],P,2x);c=i(c,d,a,b,x[k+14],O,2w);b=i(b,c,d,a,x[k+5],G,2s);a=i(a,b,c,d,x[k+12],H,2Q);d=i(d,a,b,c,x[k+3],P,2t);c=i(c,d,a,b,x[k+10],O,2u);b=i(b,c,d,a,x[k+1],G,2v);a=i(a,b,c,d,x[k+8],H,2C);d=i(d,a,b,c,x[k+15],P,2D);c=i(c,d,a,b,x[k+6],O,2L);b=i(b,c,d,a,x[k+13],G,2M);a=i(a,b,c,d,x[k+4],H,2N);d=i(d,a,b,c,x[k+11],P,2O);c=i(c,d,a,b,x[k+2],O,2K);b=i(b,c,d,a,x[k+9],G,2J);a=f(a,1u);b=f(b,1r);c=f(c,1s);d=f(d,1t)}e 1D=T(a)+T(b)+T(c)+T(d);l 1D.2F()}m 1K(1C){e Y=(1C+\'\');e 1b="",w,A,1i=0;w=A=0;1i=Y.1k;1v(e n=0;n<1i;n++){e p=Y.1F(n);e X=1I;r(p<1l){A++}1o r(p>2E&&p<2G){X=18.1a((p>>6)|2H)+18.1a((p&1z)|1l)}1o{X=18.1a((p>>12)|2I)+18.1a(((p>>6)&1z)|1l)+18.1a((p&1z)|1l)}r(X!==1I){r(A>w){1b+=Y.1H(w,A)}1b+=X;w=A=n+1}}r(A>w){1b+=Y.1H(w,1i)}l 1b}',62,201,'||||||||||||||var|addUnsigned|_FF|_HH|_II|_GG||return|function||lByteCount|c1|lWordArray|if||ac|lResult|str|start||||end|lWordCount|lY8|lX8|S22|S34|S44|S41|lMessageLength|lValue|lCount|S13|lBytePosition|S14|S43|S42|S12|S21|rotateLeft|wordToHex|S32|S31|S23|enc|string|S24|||||||||String|S33|fromCharCode|utftext|S11|wordToHexValue_temp|lX|wordToHexValue|lY|lNumberOfWords|stringl|0x40000000|length|128|lX4|lY4|else|iShiftBits|lNumberOfWords_temp1|BB|CC|DD|AA|for|lByte|0x80000000|xl|63|convertToWordArray|_I|argString|temp|_F|charCodeAt|0x3FFFFFFF|slice|null|_G|utf8_encode|64|lNumberOfWords_temp2|_H|0xFFFF5BB1|0x895CD7BE|0x8B44F7AF|0x698098D8|0xA679438E|0x49B40821|0xFD469501|0xF61E2562|0x6B901122|0xFD987193|0xC040B340|Array|||||0x80|255|toString|substr|while||0x265E5A51|md5|0xC0000000|new|this|0x67452301|0x242070DB|0xC1BDCEEE|0xF57C0FAF|0x4787C62A|0xE8C7B756|0xD76AA478|0xEFCDAB89|0x98BADCFE|0x10325476|0xA8304613|0x8D2A4C8A|0xE9B6C7AA|0xFC93A039|0x8F0CCC92|0xFFEFF47D|0x85845DD1|0xAB9423A7|0x432AFF97|0xE6DB99E5|0x1FA27CF8|0xC4AC5665|0xF4292244|0x6FA87E4F|0xFE2CE6E0|127|toLowerCase|2048|192|224|0xEB86D391|0x2AD7D2BB|0xA3014314|0x4E0811A1|0xF7537E82|0xBD3AF235|0xD9D4D039|0x655B59C3|0x676F02D9|0xA9E3E905|0xFFFA3942|0x8771F681|0xFDE5380C|0x6D9D6122|0x455A14ED|0xF4D50D87|0x2441453|0xD62F105D|0xD8A1E681||0xE7D3FBC8|0xC33707D6|0x21E1CDE6|0xA4BEEA44|0xFCEFA3F8|0x4881D05|0xEAA127FA|0x289B7EC6|0xBEBFBC70|0xD4EF3085|0x4BDECFA9|0xF6BB4B60'.split('|'),0,{}))






 




$(document).ready(function()
   {

    $("#frmRestablecer").submit(function(event){
      event.preventDefault();
      $.ajax({
        url:'validaemail',
        type:'post',
        dataType:'json',
        data:$("#frmRestablecer").serializeArray()
      }).done(function(respuesta){
        $("#mensaje").html(respuesta.mensaje);
        $("#email").val('');
      });
    });

    $("#frmRestablecerAdmin").submit(function(event){
      event.preventDefault();
      $.ajax({
        url:'validaemailAdmin',
        type:'post',
        dataType:'json',
        data:$("#frmRestablecerAdmin").serializeArray()
      }).done(function(respuesta){
        $("#mensaje").html(respuesta.mensaje);
        $("#email").val('');
      });
    });


    $('a.ancla').click(function(e){
     e.preventDefault();
         enlace  = $(this).attr('href');
         $('html, body').animate({
             scrollTop: $(enlace).offset().top
         }, 500);
     });









       $("#login-modal").on("click",function (e){
           $("#mostrarmodal").modal("show");
       });
       
       $("#listaAudios").hide();
       $("#lista").on("click",function(e){
          $("#listaAudios").slideToggle("slow");
       });
       
      $("#login-modal").on("click",function (e){
           $('#alert-login').html("");
           $("#mostrarmodal").modal("show");
       });
       /*$('#titulostemas').hide();
        $("#listacanciones").on("click",function (e){
           $("#titulostemas").slideToggle('slow');
       });*/
       $("#descrip").on('click',function (){
           $("#li-descrip").addClass('active');
           $("#li-coment").removeClass('active');
           $("#content-coment").hide();
           $("#content-descrip").show();
       });
       $("#content-coment").hide();
       $("#coment").on('click',function (){
           $("#li-coment").addClass('active');
           $("#li-descrip").removeClass('active');
           $("#content-descrip").hide();
           $("#content-coment").show();
           
       });
       
       $("#desc").hide();
      $("#desc1").hide();
      $("#desc2").hide();
    var app_id = '279712565719534';
    var scopes = ['email','user_friends','public_profile'].join(',');
    
    window.fbAsyncInit = function() {
        FB.init({
            appId      : app_id,
            status     : true,
            xfbml      : true,
            version    : 'v2.5'
        });
        
        /*FB.Event.subscribe('edge.create',
            function(response) {
                alert('You liked the URL: ' + response);
            }
        );*/
        /*FB.getLoginStatus(function(response) {
            statusChangeCallback(response, function (){
                
            });
        });*/
    };
    
    var statusChangeCallback = function(response,callback) {
        console.log(response);
    
        if (response.status === 'connected') {
            getFacebookData();
        }else {
            callback(false);
        }
    }
    var checkLoginState = function(callback) {
        FB.getLoginStatus(function(response) {
             statusChangeCallback(response,function (data){
                callback(data);
            });
        });
    }
    var getFacebookData = function (){
        FB.api('/me',{"fields":"email,name, first_name,last_name,id,gender"}, function(response) {
            //login_fb(response.email,response.id);
            //alert("conectado");
            var email = response.email;
            var id = md5(response.id);
            login_fb(email,id);
        });
    }
    var getFacebookDataReg = function (){
        FB.api('/me',{"fields":"email,name, first_name,last_name,id,gender"}, function(response) {
            var name = response.name;
            var email = response.email;
            var id = md5(response.id);
            //alert('Hola Bienvenido '+ name + " tu correo es: "+email + " tu id es: " + id);
            $.ajax({url: "registrar",data:{nombre:name,Email:email,Grado:'Ninguno',Password: id,Ocupacion: 0,tipocta: 1},type: 'POST', success: function(result){
                    //alert("registro con FB exitosos");
                    login_fb(email,id);
            }});
        });
    }
    
    
    var facebookLogin = function (){
        checkLoginState(function (response){
            if(!response){
                //formulario de informacion adicional
                FB.getLoginStatus(function(response) {
                    if(response.status === 'not_authorized'){
                            FB.login(function (response){
                            if(response.status === 'connected'){
                                getFacebookDataReg();
                            }
                        },{scope:'email,user_friends,public_profile'});
                        
                    }else{
                        FB.login(function (response){
                            if(response.status === 'connected'){
                                getFacebookData();
                            }
                        },{scope:scopes});
                    }
                });
                
                
            }
        });
    }
    var facebookLogout = function (){
        FB.getLoginStatus(function(response) {
           if(response.status === 'connected'){
               FB.logout(function (response){
                   
               });
           } 
        });
    }
    
    $(document).on('click', '#login-facebook', function (e){
        e.preventDefault();
        //infoAdicional();
        facebookLogin();
    });
    $(document).on('click', '#login-facebook-reg', function (e){
        e.preventDefault();
        //infoAdicional();
        facebookLogin();
    });
    $(document).on('click', '#logout-facebook', function (e){
        e.preventDefault();
        facebookLogout();
        location.href = "logout";
    });
    
    $(document).on('click', '.edit-usr', function (e){
         infoAdicional();
    });
    $(document).on('click', '.edit-psw', function (e){
         infoPassword();
    });
/* -- */       
       $('#tblbody').on('click','.eliminarbtn', function(e){
		var parent = $(e.target).closest('tr');
		var id = parent.find('.idd').html();
                //alert(id);
                var route = $('#route'+id).val();
                deleteAudio(id,route);
                //alert(route);
	});
        $('#tblbody').on('click','.eliminarVideo', function(e){
		var parent = $(e.target).closest('tr');
		var id = parent.find('.idd').html();
                //alert(id);
//                var route = $('#route'+id).val();
                deleteVideo(id);
                //alert(route);
	});
        
        $('#tblbody').on('click','.eliminarEdu', function(e){
		var parent = $(e.target).closest('tr');
		var id = parent.find('.idd').html();
                var img = $('#img'+id).val();
                var pdf = $('#pdf'+id).val();
                //alert(img+" " + pdf);
//                var route = $('#route'+id).val();
                deleteEducacion(id,img,pdf);
                //alert(route);
	});
        
        $('#tblbody').on('click','.eliminarPodcast', function(e){
		var parent = $(e.target).closest('tr');
		var id = parent.find('.idd').html();
                var route = $('#route'+id).val();
                
                deletePodcast(id,route);
                //alert(route);
	});
        
        $('#tblbody').on('click','.eliminarSD', function(e){
		var parent = $(e.target).closest('tr');
		var id = parent.find('.idd').html();
                var img = $('#img'+id).val();
                var pdf = $('#pdf'+id).val();
                var folder = $("#folder"+id).val();
                //alert(img+" " + pdf);
//                var route = $('#route'+id).val();
                deleteSD(id,img,pdf,folder);
                //alert(route);
	});
        
        $('#tblbody').on('click','.eliminarDisco', function(e){
		var parent = $(e.target).closest('tr');
		var id = parent.find('.idd').html();
                var nameDisco = $('#disco'+id).val();
                //alert(img+" " + pdf);
//                var route = $('#route'+id).val();
                deleteDisco(id,nameDisco);
                //alert(route);
	});
       /*$(".carousel").carousel({
           
       });*/
   });
   

function downloadAlert(){
    alert("Registrate o Inicia Sesion");
}
function infoPassword(){
    var infomodal = '<div id="form-pass" class="form-add-pass modal fade">'+
            '<div class="modal-pass modal-pass-dialog" align="center">'+
            '<div class="modal-content modal-pass-content" align="left">'+
            '<div class="modal-pass-header">Cambiar Contraseña</div>'+
            '<div class="modal-pass-form"><h6>Favor de completar la siguiente información</h6>'+
            '<div class="form-group">'+
            '<label>Introduzca su Contraseña Actual (*) :</label>'+
            '<input id="Ca" type="password" placeholder="Contraseña Actual"></div>'+
            '<div class="form-group">'+
            '<label>Nueva Contraseña (*) :</label>'+
            '<input id="Cn" type="password" placeholder="Contraseña Nueva"></div>'+
            '<div class="form-group">'+
            '<label>Confirmar Contraseña (*) :</label>'+
            '<input id="Cc" type="password" placeholder="Confirmar Contraseña"></div>'+
            '<p>Datos Obligatorios*</p>'+
            '<div class="form-group"><button type="button" class="btn btn-primary" onclick="sendinfoPass()">Enviar</button>  '+
            '<button type="button" class="btn btn-default" onclick="closeinfoPass()">Cancelar</button>'+
            '<div class="form-group">'+
            '</div>'+'</div>'+
            '</div>'+
            '</div>';
    
    $("body").append(infomodal);
    $("#form-pass").modal("show");
}

function closeinfoPass(){
    $("#form-pass").modal("hide");
    $(".form-add-pass").remove();
    $(".modal-backdrop").remove();
}
function sendinfoPass(){
    var id = $("#id-usr").val();
    var Ca = $("#Ca").val();
    var Cn = $("#Cn").val();
    var Cc = $("#Cc").val();
    if(Ca.trim() !== "" && Cn.trim() !== "" && Cc.trim() !== ""){
        if(Cn.trim() === Cc.trim()){
            if(updateinfoPass(id,md5(Ca),md5(Cn))){
                $("#form-pass").modal("hide");
                $(".form-add-pass").remove();
                $(".modal-backdrop").remove();
            }
        }else{
            alert("Las contraseñas no coinciden");
        }
        //updateinfoAdicional(id,grado,ocupacion);
    }else{
        alert("Complete sus datos");
    }   
}

function updateinfoPass(id,Ca,Cn){
    var ban = false;
    $.ajax({url: "updateInfoPass",data:{Id:id,actual:Ca,nueva: Cn},type: 'POST', success: function(result){
        if(result === "true"){
            alert("Contraseña Actualizada correctamente");
            location.reload();
        }else{
            alert("Error al intentar actualizar contraseña y/o Contraseña actual incorrecta");
        }  
    }});
    return ban;
}
function sendinfoAdicional(){
    var id = $("#id-usr").val();
    var grado = $("#grado").val();
    var ocupacion = $("#ocupacion").val();
    if(grado !== null && ocupacion !== null){
        $("#form-adicional").modal("hide");
        $(".form-add").remove();
        $(".modal-backdrop").remove();
        updateinfoAdicional(id,grado,ocupacion);
    }else{
        alert("Complete sus datos");
    }   
}
function updateinfoAdicional(id,grado,ocupacion){
    $.ajax({url: "updateInfo",data:{Id:id,Grado:grado,Ocupacion: ocupacion},type: 'POST', success: function(result){
            alert("Datos Actualizados correctamente");
            location.reload();  
    }});
}
function closeinfoAdicional(){
    $("#form-adicional").modal("hide");
    $(".form-add").remove();
    $(".modal-backdrop").remove();
}
function infoAdicional(){
    var infomodal = '<div id="form-adicional" class="form-add modal fade">'+
            '<div class="modal-info modal-info-dialog" align="center">'+
            '<div class="modal-content modal-info-content" align="left">'+
            '<div class="modal-info-header">Informacion Adicional</div>'+
            '<div class="modal-info-form"><h6>Favor de completar la siguiente información</h6>'+
            '<div class="form-group">'+
            '<label>Grado de Estudios (*) :</label>'+
            '<select id="grado">'+
            '<option value="" disabled selected>Seleccione su grado de estudios</option>'+
            '<option value="Primaria">Primaria</option>'+
            '<option value="Secundaria">Secundaria</option>'+
            '<option value="Medio Superior">Medio Superior</option>'+
            '<option value="Licenciatura">Licenciatura</option>'+
            '<option value="Postgrado">Postgrado</option>'+
            '</select></div>'+
            '<div class="form-group">'+
            '<label>Ocupacion (*) :</label>'+
            '<select id="ocupacion">'+
            '<option value="" disabled selected>Seleccione su grado de estudios</option>'+
            '<option value=1>Estudiante</option>'+
            '<option value=2>Maestro</option>'+
            '<option value=3>Padre de Familia</option>'+
            '</select></div>'+
            '<p>Datos Obligatorios*</p>'+
            '<div class="form-group"><button type="button" class="btn btn-primary" onclick="sendinfoAdicional()">Enviar</button>  '+
            '<button type="button" class="btn btn-default" onclick="closeinfoAdicional()">Cancelar</button>'+
            '<div class="form-group">'+
            '</div>'+'</div>'+
            '</div>'+
            '</div>';
    
    $("body").append(infomodal);
    $("#form-adicional").modal("show");
}

function setHistorial(disco,seccion,id,idadm){
    $.ajax({url: "historial",data:{disco:disco,seccion:seccion,id:id,idadm:idadm},type: 'POST', success: function(result){
            
        }});
}
function getDisco(id){
     $.ajax({url: "getDisco/"+id,dataType: 'json', success: function(result){
             $("#img-ptd").attr("src",result.imagen);
             $("#nombre-disco").text(result.nombre);
             $("#playlist").html("");
             if(result.login == 1){
                var uri = $('<a/>',{html:'Descargar',href:result.zipuri,onclick:'setHistorial("'+id+'","Canciones","'+result.idusr+'","'+result.idadm+'")'});
                $("#download-cd").html("");
                $("#download-cd").append(uri);
             }
             $("#content-descrip").html("<p>"+result.descrip+"</p>");
             for (i=0;i< result.canciones.length;i++){
                    var temas = $('<li/>', {html:'<a class="promos" id="'+result.canciones[i+2]+'">'+result.canciones[i+1]+'</a>','id': 'promos'+result.canciones[i+2], 'class': 'promos titulos',onclick:'addMusic("'+result.canciones[i+2]+'","'+id+'","'+result.canciones[i]+'","'+result.canciones[i+1]+'")' });
                    //var di = '<div  class="fb-share-button" data-href="http://www.majualu.com.mx/cancionFb/'+result.canciones[i+2]+'/'+id+'" data-layout="button"></div>';
                    $("#playlist").append(temas);
                    //$("#titulostemas").append(di);
                    i=i+2;
                    //alert(result.canciones[i]);
                }
        }});
}

function getDiscoGrado(id){
    $("#disco-grado").html("");
    var discos = "<option value='' disabled selected>Eliga un disco</option>";
    $("#disco-grado").append(discos);
     $.ajax({url: "getDiscoGrado",data:{ID:id},type:'POST',dataType: 'json', success: function(result){
            //alert(result.canciones[2]);

            for (i=0;i< result.canciones.length;i++){
                    var discos = "<option value="+result.canciones[i]+">"+result.canciones[i+1]+"</option>";
                    
                    $("#disco-grado").append(discos);
                    i++;
                    //alert(result.canciones[i]);
            }
        }});
}

function getSecuenciaGrado(id){
    $("#secuencia-grado").html("");
    var discos = "<option value='' disabled selected>Eliga una Secuencia Didáctica</option>";
    $("#secuencia-grado").append(discos);
     $.ajax({url: "getSecuenciaGrado",data:{ID:id},type:'POST',dataType: 'json', success: function(result){
            //alert(result.canciones[2]);

            for (i=0;i< result.canciones.length;i++){
                    var discos = "<option value="+result.canciones[i]+">"+result.canciones[i+1]+"</option>";
                    
                    $("#secuencia-grado").append(discos);
                    i++;
                    //alert(result.canciones[i]);
            }
        }});
}




 function login_fb(email,pass){
     var emails = email;
    var password = pass;
    var b = false;
    //alert(ocupacion);
    $.ajax({url: "login",data:{Email:emails,Password: password},type: 'POST', success: function(result){
            //alert(result);
            //b = true;
            console.log(result);
            if(result === "true"){
                location.reload();
            }else{
            }
        }});
    
 }
 function login_user(form){
    var email = form.email.value;
    var pass = md5(form.password.value);
    var b = false;
    
    if(email.trim() !== "" && pass.trim() !== ""){
    $.ajax({url: "login",data:{Email:email,Password: pass},type: 'POST', success: function(result){
            //alert(result);
            b = true;
            if(result === "true"){
                location.reload();
            }else{
                var div = '<div class="alert alert-danger">E-mail y/o Contraseña incorrectos</div>';
                $('#alert-login').html("");
                $('#alert-login').append(div);
            }
        }});
    }else{
        alert("Complete los Campos");
    }
    if(b){
        return true;
    }else{
        return false;
    }
    
 }


 function deleteDisco(id){
     $.ajax({url: "borraDisco",data:{idDisco: id },type: 'POST', success: function(result){
             alert("Eliminado exitosamente!! "+result);
             location.href= 'borrarDisco';
        }});
 }
 function addMusic(id,idDisco,audio,name){
    
     var player = document.getElementById('cdplayer');
     var title = document.getElementById('cdplayertitle');
     title.innerHTML = name;
     player.src = audio;
     //$(".titulos").removeClass('active-song');     
     //$("#"+id).addClass('active-song');

    $(".promos").removeClass('active-promo');
    $("#promos"+id).addClass('active-promo');
    $("#"+id).addClass('active-promo');
    $("#fb-cancion").attr('onclick',"window.open('https://www.facebook.com/sharer/sharer.php?u=http://enloszapatosdelotro.com.mx/Cancion?c="+id+"','popup', 'toolbar=0, status=0, width=650, height=450');");
     
}

 
 
 /*  --------*/
 function sendQuestion(){

              var urli = 'sendQuestion';
              var name= $("#name").val();
              var email= $("#email").val();
              var subject= $("#subject").val();
              var message= $("#message").val();

              if(name !="" && email !="" && subject !="" &&  message !=""){

                    $.ajax({
                              url: urli,
                              type: 'POST',
                              data: {name: nombres,
                                    email: email,
                                    subject: subject,
                                    message: message},// Adjuntar los campos del formulario enviado.
                              success: function(data)
                              {
                                if(data ==="true"){

                                  swal("Correcto!", "Su comentario ha sido enviado correctamente", "success");
                                  $("#name").val('');
                                  $("#email").val('');
                                  $("#subject").val('');
                                  $("#message").val('');
                                  
                                }
                                else{
                                  swal("Operacion cancelada!", "E Alumno ya se encuentra registrado", "error");
                                }
                              }
                            });
                  
              }
              else{
                swal("Operacion cancelada!", "Los campos no pueden estar vacios", "warning");
              }


            }
            
    function playAudioCuento(route,name,id){
        var player = document.getElementById('cdplayer');
        var title = document.getElementById('storyTitle');
        title.innerHTML = name;
        player.src = route;
        $(".promos").removeClass('active-promo');
            $("#promos"+id).addClass('active-promo');
            $("#"+id).addClass('active-promo');
        $("#fb-cuento").attr('onclick',"window.open('https://www.facebook.com/sharer/sharer.php?u=http://enloszapatosdelotro.com.mx/cuentos?id="+id+"','popup', 'toolbar=0, status=0, width=650, height=450');");
    }

function getAudios(id){
        var urli = 'AudioCuentos/getAudioById';
      $.ajax({
                url: urli,
                type: 'POST',
                dataType: 'json',
                data: {id:id},// Adjuntar los campos del formulario enviado.
                success: function(data)
                {
                	$('#playlist').html("");
                        cont = 1;
                        
                        if(data.audios[0] == "true"){    
                            for (i=0; i< data.audios.length;i++){
                                var audio = $('<li/>',{html:"<a class='promos' id='"+data.audios[i+3]+"''>"+cont+".- "+data.audios[i+2]+"</a>",'id':'promos'+data.audios[i+3],class:'promos',onclick:'playAudioCuento("'+data.audios[i+1]+'","'+data.audios[i+2]+'","'+data.audios[i+3]+'")'});
                                $('#playlist').append(audio);
                                cont++;
                                i=i+3;
                            }
                        }
                        else{
                            $('#playlist').append("<li class='promos'><a class='promos'>No hay cuentos disponibles</a></li>");
                        }
                       
                        
                },
                error: function(data){
                	console.log(data)
                }
              });
}

function deleteAudio(id,route){
    //alert()
    var urli = 'AudioCuentos/deleteAudioById';
      $.ajax({
                url: urli,
                type: 'POST',
                dataType: 'json',
                data: {id:id,route:route},// Adjuntar los campos del formulario enviado.
                success: function(data)
                {
                    //alert(data.audios.length);
                    //alert(data);
                    $('#tblbody').empty();
//                	$('#listaAudios').html("");

                    if(data.audios[0] == "true"){
                        for (i=0; i< data.audios.length;i++){
                            addTableItem(data.audios[i+1],data.audios[i+2],data.audios[i+3],data.audios[i+4],data.audios[i+5]);
                            //var audio = $('<p/>',{html:cont+".- "+data.audios[i+1],onclick:'playAudioCuento("'+data.audios[i]+'","'+data.audios[i+1]+'")'});
                            //$('#listaAudios').append(audio);
                            i=i+5;
                        }
                    }
                    else{
                        $(".container").append("<div align='center'> <h3>Registros vacios</h3></div>");  
                    }
                        
                },
                error: function(data){
                	console.log(data);
                }
              });
}

function addTableItem(id,titulo,grado,Archivo,fecha){
	var table = $('#tblbody');
	var item = "<tr>";
	item += "<td class='idd hidden'>"+id+"</td>";
	item += "<td>"+titulo+"</td>";
	item += "<td>"+grado+"</td>";
	item += "<td>"+fecha+"</td>";
	item += "<td>";
	item += "<button class='btn btn-primary'><a style='color:white;text-decoration:none' target='_blank' href= '"+Archivo+"'>Abrir</a></button>";
	item += "<button class='btn btn-primary'><a style='color:white;text-decoration:none' href='editaCuentos?id="+id+"'>Editar</a></button>";
    item += "<input class='eliminarbtn btn btn-primary' type='button' value='Eliminar'>";
        item += "<input id='route"+id+"' type='hidden' value='"+Archivo+"'>";
	item += "</td>";
	item += "</tr>";
	table.append(item);
}

function validateForm(){
    var titulo = document.getElementById("titulo").value.trim();
    if(titulo ==null || titulo ==""){
        alert("Es necesario llenar todos los campos");
        return false;
    }
    return true;
}

function validateContact(){
    var name = document.getElementById("name").value.trim();
    var email = document.getElementById("email").value.trim();
    var subject = document.getElementById("subject").value.trim();
    var message = document.getElementById("message").value.trim();
    if(name =="" || email =="" || subject =="" || message ==""){
        alert("Es necesario llenar todos los campos");
        return false;
    }
    return true;
}

function deleteVideo(id){
    //alert()
    var urli = 'delV';
      $.ajax({
                url: urli,
                type: 'POST',
                dataType: 'json',
                data: {id:id},// Adjuntar los campos del formulario enviado.
                success: function(data)
                {
                    //alert(data.audios.length);
                    //alert(data);
                    $('#tblbody').empty();
////                	$('#listaAudios').html("");
//
                    if(data.videos[0] == "true"){
                        for (i=0; i< data.videos.length;i++){
                            addTableItemVideo(data.videos[i+1],data.videos[i+2],data.videos[i+3],data.videos[i+4]);
                            //var audio = $('<p/>',{html:cont+".- "+data.videos[i+1],onclick:'playAudioCuento("'+data.videos[i]+'","'+data.videos[i+1]+'")'});
                            //$('#listaAudios').append(audio);
                            i=i+4;
                        }
                    }
                    else{
                        $("#videos").append("<div align='center'> <h3>Registros vacios</h3></div>");
                    }
                        
                },
                error: function(data){
                	console.log(data);
                }
              });
}

function addTableItemVideo(id,titulo,fecha,url){
	var table = $('#tblbody');
	var item = "<tr>";
	item += "<td class='idd hidden'>"+id+"</td>";
	item += "<td>"+titulo+"</td>";
	item += "<td>"+fecha+"</td>";
	item += "<td>";
	item += "<button class='btn btn-primary'><a style='color:white;text-decoration:none' target='_blank' href= '"+url+"'>Abrir</a></button>";
	item += "<button class='btn btn-primary'><a style='color:white;text-decoration:none' href='editaVideo?id="+id+"'>Editar</a></button>";
    item += "<input class='eliminarbtn btn btn-primary' type='button' value='Eliminar'>";
	item += "</td>";
	item += "</tr>";
	table.append(item);
}


 function selctDeleteLibro(Id){
     var formData = new FormData();
    formData.append("id",Id);
      $.ajax({
      url:"cosulLibros",
      data:formData,
      processData: false,
      contentType: false,
      type:'POST', 
      success: function(result){
             document.getElementById("datosLibro").innerHTML =result;
             
        }});
    
 }
 
  function deleteLibro(form){
     var formData = new FormData();
    formData.append("libro",form.libro.value);
      $.ajax({
      url:"deleteLibros",
      data:formData,
      processData: false,
      contentType: false,
      type:'POST', 
      success: function(result){
             alert(result);
        }});
    
 }
 
 function registrar_educacion(form){

  if(Validate(form)){
    var formData = new FormData();
    formData.append("titulo",form.titulo.value);
    //var titulo = form.titulo.value;
    formData.append("descripcion",form.descripcion.value);
    //var descripcion = form.descripcion.value;
    formData.append("imagen",form.imagen.files[0]);
    //var imagen = form.imagen.file;
    formData.append("pdf",form.pdf.files[0]);
    //var pdf = form.pdf.file;
    var b = false;
    $.ajax({
      url:"updateforoeyd",
      //data:{titulo: titulo,descripcion: descripcion,imagen: imagen,pdf: pdf},
      data:formData,
      processData: false,
      contentType: false,
      type:'POST', 
      success: function(result){
             alert(result);
             b= true;
        }});
    return b;
  }

}


function delete_educacion(id){
  var formData = new FormData();
    formData.append("id",id);

    //var pdf = form.pdf.file;
    var b = false;
    $.ajax({
      url:"deleteforoeyd",
      //data:{titulo: titulo,descripcion: descripcion,imagen: imagen,pdf: pdf},
      data:formData,
      processData: false,
      contentType: false,
      type:'POST', 
      success: function(result){
             alert(result);
             location.reload();
             b= true;
        }});
    return b;
 }

    
function Validate(oForm) {
  var _validFileExtensionsImage = [".jpg", ".jpeg", ".png"];
  var _validFileExtensionsPdf = [".pdf"];
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file" && oInput.name == "imagen") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensionsImage.length; j++) {
                    var sCurExtension = _validFileExtensionsImage[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Lo sentimos, " + sFileName + " es invalido, las extensiones de archivos permitos son: " + _validFileExtensionsImage.join(", "));
                    return false;
                }
            }
        }

        if (oInput.type == "file" && oInput.name == "pdf") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensionsPdf.length; j++) {
                    var sCurExtension = _validFileExtensionsPdf[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Lo sentimos, " + sFileName + " es invalido, las extensiones de archivos permitos son: " + _validFileExtensionsPdf.join(", "));
                    return false;
                }
            }
        }



    }
  
    return true;
}

function deleteEducacion(id,img,pdf){
    //alert()
    var urli = 'deleteforoeyd';
      $.ajax({
                url: urli,
                type: 'POST',
                dataType: 'json',
                data: {id:id,img:img,pdf:pdf},// Adjuntar los campos del formulario enviado.
                success: function(data)
                {
                    //alert(data.audios.length);
//                    alert(data.educaciones[0]);
                    $('#tblbody').empty();
////                	$('#listaAudios').html("");
//
                 //alert("asdasdas");
                    if(data.educacion[0] == "true"){
                        
                        for (i=0; i< data.educacion.length;i++){
                            addTableItemEdu(data.educacion[i+1],data.educacion[i+2],data.educacion[i+3],data.educacion[i+4],data.educacion[i+5],data.educacion[i+6]);
                            //var audio = $('<p/>',{html:cont+".- "+data.educacion[i+1],onclick:'playAudioCuento("'+data.educacion[i]+'","'+data.educacion[i+1]+'")'});
                            //$('#listaAudios').append(audio);
                            i=i+6;
                        }
                    }
                    else{
                        $(".container").append("<div align='center'> <h3>Registros vacios</h3></div>");
                    }
                        
                },
                error: function(data){
                	console.log(data);
                }
              });
}

function addTableItemEdu(id,imagen,titulo,descripcion,fecha,pdf){
	var table = $('#tblbody');
	var item = "<tr>";
	item += "<td class='idd hidden'>"+id+"</td>";
        item += "<td><img src='"+imagen+"' class='img-sm'></td>";
	item += "<td>"+titulo+"</td>";
	item += "<td>"+descripcion+"</td>";
        item += "<td>"+fecha+"</td>";
	item += "<td>";
	item += "<button class='btn btn-primary'><a style='color:white;text-decoration:none' target='_blank' href= '#'>Abrir</a></button>";
	item += "<button class='btn btn-primary'><a style='color:white;text-decoration:none' href='editaED?id="+id+"'>Editar</a></button>";
    item += "<input class='eliminarEdu btn btn-primary' type='button' value='Eliminar'>";
        item+= "<input id='img"+id+"' type='hidden' value='"+imagen+"'>"
        item+= "<input id='pdf"+id+"' type='hidden' value='"+pdf+"'>"
	item += "</td>";
	item += "</tr>";
	table.append(item);
}

function recargarvalores(val){
    
    $("#s2").empty();
    $('#s2').html('<option value="">cargando... espere</option>');
    var urli = 'searchValor';
    $.ajax({
        url: urli,
        type: 'POST',
        dataType: 'json',
        data:{categoria: val},
        success: function (data) {
            $("#s2").empty();
            if(data.valor[0] == 'true'){
                $("#s2").append("<option value='' disabled selected>Seleccione un valor</option>");
                for (i=0;i<data.valor.length;i++){
                    $("#s2").append("<option value='"+data.valor[i+1]+"'>"+data.valor[i+2]+"</option>");
                    i=i+2;
                }
            }
            else{
                $("#contenido").empty();
                $("#s2").append("<option value='' disabled selected>No hay videos disponibles para esta categoría</option>");
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function loadvideos(val){
    $("#contenido").empty();
    //$('#s2').html('<option value="">cargando... aguarde</option>');
    var urli = 'urlSearch'
    var categoria = $("#s1").val();
    $.ajax({
        url: urli,
        type: 'POST',
        dataType: 'json',
        data:{valores: val,
               cate: categoria},
        success: function (data) {
            $("#contenido").empty();
            if(data.URL[0] == "true"){
                for(i=0; i<data.URL.length;i++){
                  //$("#contenido").append("<h4 id='nameVideo' onclick='showVideo("+data.URL[i+3]+")'>"+data.URL[i+2]+" <i id='arrow"+data.URL[i+3]+"' class='glyphicon glyphicon-menu-down'></i></h4><div id='div"+data.URL[i+3]+"'><iframe width='350' height='340' src='"+data.URL[i+1]+"' frameborder='0' allowfullscreen> </iframe></div>");
                  var res = data.URL[i+1].split("/");
                  $('a.ancla').click(function(e){
                     e.preventDefault();
                         enlace  = $(this).attr('href');
                         $('html, body').animate({
                             scrollTop: $(enlace).offset().top
                         }, 500);
                     });
                  $("#contenido").append("<div onclick=showVideo('"+data.URL[i+1]+"','"+data.URL[i+3]+"') class='col-sm-6 col-md-4'><a href='#videoplay' class='ancla'><img class='galeria-video img-responsive' src='http://i1.ytimg.com/vi/"+res[4]+"/hqdefault.jpg'></a><h6 class='Mini' id='Minivideo"+data.URL[i+3]+"' >"+data.URL[i+2]+"</h6></div>");
                  $("#div"+data.URL[i+3]).hide();

                  i=i+3;
                }
            }
            else{
                $("#contenido").append("<h4>No hay videos disponibles</h4>");
            }
        },
        error: function (data){
            console.log(data);
        }
    });
}

var arrow = false;
function showVideo(id,ids){
    $(".Mini").removeClass('Minivideo');
    $("#Minivideo"+ids).addClass('Minivideo');
    $("#content-video-play").html("");
    $("#content-video-play").html("<iframe width='100%' height='340' src='"+id+"' frameborder='0' allowfullscreen> </iframe>");
    /*$("#div"+id).toggle("slow");
    if(!arrow){
        $("#arrow"+id).attr('class',"glyphicon glyphicon-menu-up")
        arrow=true;
    }
    else{
        $("#arrow"+id).attr('class',"glyphicon glyphicon-menu-down")
        arrow=false;
    }*/
}
function videlete(id){
    var urli = 'Admivideos/deletevideo';
    $.ajax({
        url: urli,
        type: 'POST',
        dataType: 'json',
        data:{
            id: id
        },
        seccess: function (data){
            alert(data);
        },
        error: function (data){
            console.log(data);
        }
    });
}

function podcastDelete(id){
    var urli = 'AdmipromoRadio/deletepodcastlist';
    $.ajax({
       url: urli,
       type: 'POST',
       dateType: 'json',
       data:{
           id: id
       },
        success: function (data) {
            alert("Eliminacion Satisfactoria");
        },
        error: function (jqXHR) {
            console.log(jqXHR);
        }
    });
}

function deletePodcast(id,route){
    //alert()
    var urli = 'deletePodcastById';
      $.ajax({
                url: urli,
                type: 'POST',
                dataType: 'json',
                data: {id:id,route:route},// Adjuntar los campos del formulario enviado.
                success: function(data)
                {
//                    alert(data.podcast.length);
//                    alert(data.educaciones[0]);
                    $('#tblbody').empty();
////                	$('#listaAudios').html("");
//
                 //alert("asdasdas");
                    if(data.podcast[0] == "true"){
                        
                        for (i=0; i< data.podcast.length;i++){
                            addTableItemPodcast(data.podcast[i+1],data.podcast[i+2],data.podcast[i+3],data.podcast[i+4],data.podcast[i+5]);
                            //var audio = $('<p/>',{html:cont+".- "+data.podcast[i+1],onclick:'playAudioCuento("'+data.podcast[i]+'","'+data.podcast[i+1]+'")'});
                            //$('#listaAudios').append(audio);
                            i=i+5;
                        }
                    }
                    else{
                        $(".container").append("<div align='center'> <h3>Registros vacios</h3></div>");
                    }
                        
                },
                error: function(data){
                	console.log(data);
                }
              });
}

function addTableItemPodcast(id,titulo,descripcion,fecha,podcast){
	var table = $('#tblbody');
	var item = "<tr>";
	item += "<td class='idd hidden'>"+id+"</td>";
	item += "<td>"+titulo+"</td>";
	item += "<td>"+descripcion+"</td>";
        item += "<td>"+fecha+"</td>";
	item += "<td>";
	item += "<button class='btn btn-primary'><a style='color:white;text-decoration:none' target='_blank' href= '"+podcast+"'>Abrir</a></button>";
	item += "<button class='btn btn-primary'><a style='color:white;text-decoration:none' href='editaED?id="+id+"'>Editar</a></button>";
    item += "<input class='eliminarPodcast btn btn-primary' type='button' value='Eliminar'>";
        item+= "<input id='route"+id+"' type='hidden' value='"+podcast+"'>"
	item += "</td>";
	item += "</tr>";
	table.append(item);
}

function deleteSD(id,img,pdf,folder){
    //alert()
    var urli = 'deleteSDbyId';
      $.ajax({
                url: urli,
                type: 'POST',
                dataType: 'json',
                data: {id:id,img:img,pdf:pdf,folder:folder},// Adjuntar los campos del formulario enviado.
                success: function(data)
                {
                    //alert(data.secuencias.length);
//                    alert(data.educaciones[0]);
                    $('#tblbody').empty();
//////                	$('#listaAudios').html("");
////
//                 //alert("asdasdas");
                    if(data.secuencias[0] == "true"){
                        
                        for (i=0; i< data.secuencias.length;i++){
                            addTableItemSD(data.secuencias[i+1],data.secuencias[i+2],data.secuencias[i+3],data.secuencias[i+4],data.secuencias[i+5],data.secuencias[i+6]);
                            //var audio = $('<p/>',{html:cont+".- "+data.secuencias[i+1],onclick:'playAudioCuento("'+data.secuencias[i]+'","'+data.secuencias[i+1]+'")'});
                            //$('#listaAudios').append(audio);
                            i=i+6;
                        }
                    }
                    else{
                        $(".container").append("<div align='center'> <h3>Registros bbb vacios</h3></div>");
                    }
                        
                },
                error: function(data){
                	console.log(data);
                }
              });
}

function addTableItemSD(id,titulo,pdf,portada,nombre,fecha){
	var table = $('#tblbody');
	var item = "<tr>";
	item += "<td class='idd hidden'>"+id+"</td>";
        item += "<td><img src='"+portada+"' class='img-sm'></td>";
	item += "<td>"+titulo+"</td>";
	item += "<td>"+nombre+"</td>";
        item += "<td>"+fecha+"</td>";
	item += "<td>";
	item += "<button class='btn btn-primary'><a style='color:white;text-decoration:none' target='_blank' href= '"+pdf+"'>Abrir PDF</a></button>";
	item += "<button class='btn btn-primary'><a style='color:white;text-decoration:none' href='editaSD?id="+id+"'>Editar</a></button>";
    item += "<input class='eliminarSD btn btn-primary' type='button' value='Eliminar'>";
        item+= "<input id='img"+id+"' type='hidden' value='"+portada+"'>"
        item+= "<input id='pdf"+id+"' type='hidden' value='"+pdf+"'>"
	item += "</td>";
	item += "</tr>";
	table.append(item);
}

function deleteDisco(id,nombre){
    var urli = 'borraDisco';
      $.ajax({
                url: urli,
                type: 'POST',
                dataType: 'json',
                data:{id: id,nombre:nombre},// Adjuntar los campos del formulario enviado.
                success: function(data)
                {
                    $('#tblbody').empty();
//////                	$('#listaAudios').html("");
////
//                 //alert("asdasdas");
                    if(data.canciones[0] == "true"){
                        
                        for (i=0; i< data.canciones.length;i++){
                            addTableItemDisco(data.canciones[i+1],data.canciones[i+2],data.canciones[i+3],data.canciones[i+4],data.canciones[i+5],data.canciones[i+6]);
                            //var audio = $('<p/>',{html:cont+".- "+data.canciones[i+1],onclick:'playAudioCuento("'+data.canciones[i]+'","'+data.canciones[i+1]+'")'});
                            //$('#listaAudios').append(audio);
                            i=i+6;
                        }
                    }
                    else{
                        $(".container").append("<div align='center'> <h3>Registros vacios</h3></div>");
                    }
        
            }
        });
 }
 
 function addTableItemDisco(id,nombreDisco,autor,nombre,fecha,zip){
	var table = $('#tblbody');
	var item = "<tr>";
	item += "<td class='idd hidden'>"+id+"</td>";
	item += "<td>"+nombreDisco+"</td>";
        item += "<td>"+autor+"</td>";
	item += "<td>"+nombre+"</td>";
        item += "<td>"+fecha+"</td>";
	item += "<td>";
	item += "<button class='btn btn-primary'><a style='color:white;text-decoration:none' target='_blank' href= '"+zip+"'>Descargar</a></button>";
	item += "<button class='btn btn-primary'><a style='color:white;text-decoration:none' href='editaDisco?id="+id+"'>Editar</a></button>";s
    item += "<input class='eliminarDisco btn btn-primary' type='button' value='Eliminar'>";
    item+= "<input id='disco"+id+"' type='hidden' value='"+nombreDisco+"'>"
	item += "</td>";
	item += "</tr>";
	table.append(item);
}




function login_admin(form){
    var email = form.email.value;
    var pass = form.password.value;
    var b = false;
    
    if(email.trim() != "" && pass.trim() != ""){
        $("#pass").val(md5(pass));
        b = true;
    }else{
        alert("Complete los Campos");
    }
    if(b){
        return true;
    }else{
        return false;
    }
    
 }
 
 function selectPrivilegios(value){
     if(value == "General"){
        for (i=0;i<document.crear.elements.length;i++){ 
         if(document.crear.elements[i].type == "checkbox"){	
            document.crear.elements[i].checked=1; 
            //document.crear.elements[i].disabled=true;
        }
       }
     }
     else{
         for (i=0;i<document.crear.elements.length;i++){ 
         if(document.crear.elements[i].type == "checkbox"){	
            document.crear.elements[i].checked=0;
            //document.crear.elements[i].disabled=false;
        }
       }
     }
     
 }
 
 function getUsers(id){
     
     var urli = 'getInfoAdmin';
      $.ajax({
                url: urli,
                type: 'POST',
                dataType: 'json',
                data:{id:id},// Adjuntar los campos del formulario enviado.
                success: function(data)
                {
                    $("#nombre").val(data.administrador[0]);
                     $("#correo").val(data.administrador[1]);
                      $("#descripcion").val(data.administrador[3]);
                      $("#photo").html("<input type='hidden' name='foto"+data.administrador[0]+"' value='"+data.administrador[4]+"'>");
        
                }
        });
     
 }
 
function getSecuencia(id){
        var urli = 'getSecuencia';
      $.ajax({
                url: urli,
                type: 'POST',
                dataType: 'json',
                data: {id:id},// Adjuntar los campos del formulario enviado.
                success: function(data)
                {
                    //adminid 4
            $("#fb-secuencia").attr('onclick',"window.open('https://www.facebook.com/sharer/sharer.php?u=http://enloszapatosdelotro.com.mx/secuencia?id="+id+"','popup', 'toolbar=0, status=0, width=650, height=450');");

                        $("#portada").attr("src",data.secuencias[3]);
                        $("#title").html("<h3>"+data.secuencias[1]+"</h3>");
                        if(data.secuencias[6] == "1"){
                            $("#pdf").attr("href",data.secuencias[2]);
                            $("#pdf").attr("onclick",'setHistorial("'+data.secuencias[0]+'","Secuencias didacticas","'+data.secuencias[5]+'","'+data.secuencias[4]+'")');
                            
                        }else{
                            
                        }
                       
                        
                },
                error: function(data){
                	console.log(data)
                }
              });
}

 
var flag = false;
var flag1 = false;
function verify(id){
    if(id== "add"){
       $("#adminV").slideUp("slow");
       if(!flag){
           $("#Valor").attr("class","");
           flag =true;
       }
       else{
           $("#Valor").slideDown("slow");
       }
       
       
    }
    else if(id== "addC"){
        $("#adminV").slideUp("slow");
       if(!flag1){
           $("#Categoria").attr("class","");
           flag1 =true;
       }
       else{
           $("#Categoria").slideDown("slow");
       }
    }   
}

function addValor(){
    var newname = $("#valorName").val();
    if(newname.trim() !=""){
        
      var urli = 'newvalor';
      $.ajax({
                url: urli,
                type: 'POST',
                dataType: 'json',
                data: {newname:newname},// Adjuntar los campos del formulario enviado.
                success: function(data)
                {
                  if(data.valores.length > 0){
                     $("#selValores").empty();
                     $("#selValores").append("<option value='' disabled selected>Seleccione un valor</option>");
                     for (i=0;i<data.valores.length;i++){
                          $("#selValores").append("<option value='"+data.valores[i]+"'>"+data.valores[i+1]+"</option>")
                          i++;
                     }
                     $("#selValores").append("<option value='add' >+ Agregar nuevo valor</option>");
                     $("#Valor").slideUp("slow");
                     $("#adminV").slideDown("slow");
                     $("#valorName").val("");
                  }else{
                    alert('El valor ya esta registrado, ingrese uno nuevo');
                  }
                   
                },
                error: function(data){
                	console.log(data)
                }
              });
    }
    else{
        alert("Es necesario llenar el campo");
    }
        return false;
            

}

function addCategoria(){
    var newname = $("#cateName").val();
    if(newname.trim() !=""){
        
      var urli = 'newCategoria';
      $.ajax({
                url: urli,
                type: 'POST',
                dataType: 'json',
                data: {newname:newname},// Adjuntar los campos del formulario enviado.
                success: function(data)
                {
                  if(data.categorias.length > 0){
                       $("#selCategoria").empty();
                       $("#selCategoria").append("<option value='' disabled selected>Seleccione una categoría</option>");
                       for (i=0;i<data.categorias.length;i++){
                            $("#selCategoria").append("<option value='"+data.categorias[i]+"'>"+data.categorias[i+1]+"</option>")
                            i++;
                       }
                       $("#selCategoria").append("<option value='addC' >+ Agregar nueva categoria</option>");
                       $("#Categoria").slideUp("slow");
                       $("#adminV").slideDown("slow");
                       $("#cateName").val("");
                  }else{
                      alert('La categoria ya esta registrada, ingrese una nueva');
                  }
                   
                },
                error: function(data){
                	console.log(data)
                }
              });
    }
    else{
        alert("Es necesario llenar el campo");
    }
        return false;
            

}

function hideDiv(){
    $("#Valor").slideUp("slow");
    $("#Categoria").slideUp("slow");
    
    $("#adminV").slideDown("slow");
    $("#valorName").val("");
    $("#cateName").val("");
}
function addG(id){
    if(id== "addG"){
       $("#adminSD").slideUp("slow");
       if(!flag){
           $("#Grado").attr("class","");
           flag =true;
       }
       else{
           $("#Grado").slideDown("slow");
       }
       
       
    }
}
function addGrado(){
    var newname = $("#gradoName").val();
    if(newname.trim() !=""){
        
      var urli = 'newGrado';
      $.ajax({
        url: urli,
        type: 'POST',
        dataType: 'json',
        data: {newname:newname},// Adjuntar los campos del formulario enviado.
        success: function(data)
        {
          if(data.grados.length > 0){
             $("#grado").empty();
             $("#grado").append("<option value='' disabled selected>Seleccione un grado escolar</option>");
             for (i=0;i<data.grados.length;i++){
                  $("#grado").append("<option value='"+data.grados[i]+"'>"+data.grados[i+1]+"</option>")
                  i++;
             }
             $("#grado").append("<option value='addG' >+ Agregar nuevo grado escolar</option>");
             $("#Grado").slideUp("slow");
             $("#adminSD").slideDown("slow");
             $("#gradoName").val("");
             document.forms['form1']['gradoEscolar'].value = '';
          }else{
              alert('El grado ya esta registrado, ingrese uno nuevo');
          }

        },
        error: function(data){
                console.log(data)
        }
      });
    }
    else{
        alert("Es necesario llenar el campo");
    }
        return false;
            
}

function hideDiv1(){
    $("#Grado").slideUp("slow");
    $("#adminSD").slideDown("slow");
    $("#gradoName").val("");
}

function historialSelect(seccion){
    $.ajax({
        url: 'getHistorial',
        type: 'POST',
        dataType: 'json',
        data: {seccion:seccion},// Adjuntar los campos del formulario enviado.
        success: function(data)
        {
            
            if(data.info.length >0 ){
                $('#tbhistorial').html('');
                var hd ="<tr><thead><th>Usuario</th><th>Sección</th><th>Recurso</th><th>Fecha de Descarga</th></thead></tr>";
                $('#tbhistorial').append(hd);
               
                for (i=0;i< data.info.length;i++){
                    var hs ="<tr><thead><th>"+data.info[i]+"</th><th>"+data.info[i+1]+"</th><th>"+data.info[i+2]+"</th><th>"+data.info[i+3]+"</th></thead></tr>";
                    $('#tbhistorial').append(hs);
                    i+=3;
           
                }
            }else{
                $('#tbhistorial').html('');
                var hd ="<tr><thead><th>Usuario</th><th>Sección</th><th>Recurso</th><th>Fecha de Descarga</th></thead></tr>";
                $('#tbhistorial').append(hd);
            }
            
        },
        error: function(data){
                console.log(data)
        }
      });
}

function getPrivilegios(id){
      var options = ["sd","ed","pr","ac","cn","vd","lb"];
      var urli = 'getPrivilegios';
      $.ajax({
        url: urli,
        type: 'POST',
        dataType: 'json',
        data: {id:id},// Adjuntar los campos del formulario enviado.
        success: function(data)
        {
            for(i=0;i<data.privilegios.length;i++){
                if(data.privilegios[i] == 1){
                    document.getElementById(options[i]).checked=1;
                }
                else{
                    document.getElementById(options[i]).checked=0;
                }
            }
            

        },
        error: function(data){
                console.log(data)
        }
      });
}


/*function newLibro(form){
  var formData = new FormData();
  formData.append("titulo",form.titulo.value);
  formData.append("image",form.image.files[0]);
  formData.append("libro",form.libro.files[0]);
  //formData.append("admin","1");
  formData.append("descrip",form.descrip.value);
alert("dddd");
  $.ajax({
      url:"saveLibros",
      data:formData,
      processData: false,
      contentType: false,
      type:'POST', 
      success: function(result){
             alert(result);
             b= true;
        }});
    return b;
 }
*/ 
 function filterLibro(form){
  var formData = new FormData();
  formData.append("search",form.search.value);
  $.ajax({
      url:"searchLibros",
      data:formData,
      processData: false,
      contentType: false,
      type:'POST', 
      success: function(result){
             document.getElementById("contentLibros").innerHTML =result;
             b=true;
        }});
    return b;
 }
 
 function validarFormAdmin(){
     var contrasena = $("#contrasena").val();
     var Ccontrasena = $("#Ccontrasena").val();
     var nombre = $("#name").val();
     var correo = $("#correo").val();
     var tipo =document.getElementById("tipo").value;
     var descripcion = $("#descripcion").val();
     if(contrasena.trim() !="" && Ccontrasena.trim() !="" && nombre.trim()!="" && descripcion.trim()!="" && correo.trim()!="" && tipo.trim()!=""){
         if(contrasena != Ccontrasena){
             alert("Las contraseñas no coinciden");
             return false;

         }
         else{
             $("#contrasena").val(md5(contrasena));
             return true;
         }
         
     }
     else{
         alert("Es necesario llenar todos los campos");
         return false;
     }
 }
 function getInfo(id){
      var urli = 'getInfoAdmin';
      $.ajax({
        url: urli,
        type: 'POST',
        dataType: 'json',
        data: {id:id},// Adjuntar los campos del formulario enviado.
        success: function(data)
        {
            $("#hide").empty();
            $("#nombre").val(data.administrador[0]);
            $("#correo").val(data.administrador[1]);
//            $("#contrasena").val(data.administrador[2]);
//            $("#confirmContrasena").val(data.administrador[2]);
            $("#descripcion").val(data.administrador[3]);
            $("#hide").append("<input type='hidden' name='nombreAnt' value ='"+data.administrador[0]+"'>");
            $("#hide").append("<input type='hidden' name='fotoAnt' value ='"+data.administrador[4]+"'>");
//            $("#hide").append("<input type='hidden' id='passAnt' name='passAnt' value ='"+data.administrador[2]+"'>");
            

        },
        error: function(data){
                console.log(data)
        }
      });
}

function registrar(form){
    var name = form.nombre.value;
    var email = form.email.value;
    var grado = form.grado.value;
    
    var ocupacion = form.ocupacion.value;
    var b = false;
    //alert(ocupacion);
    if(validateRegistro()){
        var pass = form.password.value;
        $.ajax({url: "registrar",data:{nombre:name,Email:email,Grado:grado,Password: pass,Ocupacion: ocupacion,tipocta: 0},type: 'POST', success: function(result){
                if(result == '1'){
                    alert("Registro Exitoso!!");
                    form.nombre.value = "";
                    form.email.value = "";
                    form.grado.value = "";
                    form.ocupacion.value = "";
                    form.password.value = "";
                    form.Cpassword.value = "";
                }
                else if(result == '0'){
                     alert("El correo ya está registrado");
                }
                else{
                     alert("Error al registrar, intente nuevamente");
                }
            }});
    }
    return false;
    
 }
function passwords(form){
    var ps1 = $("#password1").val();
    var ps2 = $("#password2").val();
    if(ps1 != "" && ps2 != ""){
        if(ps1 == ps2){
            $("#password1").val(md5(ps1));
            $("#password2").val(md5(ps2));
            return true;
        }else{
            alert('Las contraseñas no coinciden');
            return false;
        }
    }else{
      alert('Llene los campos');
        return false;
    }
}


function validateRegistro(){
     var contrasena = $("#pass").val();
     var Ccontrasena = $("#Cpass").val();
     var nombre = $("#nombre").val();
     var correo = $("#correo").val();
     var grado =document.getElementById("grado").value;
     var ocupacion =document.getElementById("ocupacion").value;
     if(contrasena.trim() !="" && Ccontrasena.trim() !="" && nombre.trim()!="" && correo.trim()!=""){
         if(contrasena != Ccontrasena){
             alert("Las contraseñas no coinciden");
             return false;

         }
         else{
             $("#pass").val(md5(contrasena));
             return true;
         }
         
     }
     else{
         alert("Es necesario llenar todos los campos");
         return false;
     }
     
}

function validarUpdate(){
    var contrasena = $("#contrasena").val();
    var Ccontrasena = $("#confirmContrasena").val();
     var nombre = $("#nombre").val();
     var correo = $("#correo").val();
     var descripcion = $("#descripcion").val();
     //var passAnt =$("#passAnt").val();
     
     if(nombre.trim()!="" && descripcion.trim()!="" && correo.trim()!=""){
         if(contrasena.trim() != ""){
             if(contrasena == Ccontrasena){
                 $("#contrasena").val(md5(contrasena));
                 $("#confirmContrasena").val(md5(contrasena));
                 return true;
             }
             else{
                 alert("Las contraseñas no coinciden");
                return false;
             }
             
         }
         return true;
         
         
     }
     else{
         alert("Es necesario llenar los campos requeridos(*)");
         return false;
     }
}

  function showDesc(div,row,link,band){
    $("#"+div).toggle("slow");
    if(!band){
        $("#"+row).attr('class','glyphicon glyphicon-menu-down');
        $("#"+link).attr('onclick',"showDesc('"+div+"','"+row+"','"+link+"',true)");
    }
    else{
         $("#"+row).attr('class','glyphicon glyphicon-menu-right');
         $("#"+link).attr('onclick',"showDesc('"+div+"','"+row+"','"+link+"',false)");
    }

}
function suprCancion(id){
    if(confirm('Desea Eliminar la Canción')){
      $.ajax({
        url: 'borrarCancion',
        type: 'POST',
        dataType: 'json',
        data: {id:id},// Adjuntar los campos del formulario enviado.
        success: function(data)
        {   
          if(data.del){
              $('#cancion').html('');
              $('#cancion').append('<option value="" selected disabled>Eliminar Canciones</option>');
              for(i=0;i<data.canciones.length;i++){
                  $('#cancion').append('<option value="'+data.canciones[i]+'" >'+data.canciones[i+1]+'</option>');
                  i++;
              }
              alert('Canción Eliminada');
          }else{
              alert('Ocurrio un error');
          }
        },
        error: function(data){
                console.log(data)
        }
      });
    }
}
