<!DOCTYPE html>

<html lang="es-ES">
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <?php  if(isset($cancion)){?>
          <?php foreach ($cancion as $key):?>
            <title>ELZDO &#8211; Canciones - <?=$key['titulo']?></title>
          <?php endforeach?>
          
        <?php }else{?>
          <title>ELZDO &#8211; Canciones</title>
        <?php }?>
        <link rel="icon" type="image/jpg" href="/images/imagenes/favicon.jpg" />
        <!--- css boostrap -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-3.3.6/css/bootstrap-theme.min.css" />
        <!--- js JQuery -->
        <script type='text/javascript' src='<?php echo base_url();?>js/jquery-2.2.0.min.js'></script>
        <!--- js boostrap -->
        <script type='text/javascript' src='<?php echo base_url();?>js/bootstrap-3.3.6/js/bootstrap.min.js'></script>
        <!--- css y js enloszapatosdelotro -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/styleRepro.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/enloszapatos.css" />
        <script type='text/javascript' src='<?php echo base_url();?>js/enloszapatos.js'></script>



    </head>
    <body>
        <?php $this->load->view('Shared/modallogin');?>
        <div id="wrapper">
            <div id="topbar">
                <div id="topbar-inner" class="marco-body">
                    <div class="socials">
                        <a class="social-YouTube"  target="_blank"  rel="nofollow" href="http://www.youtube.com/alegriaypedagogia" title="YouTube">
                            
                            <img alt="YouTube" src="<?php echo base_url();?>images/imagenes/sociales/YouTube.png" />
                            
                        </a>
			<a class="social-SoundCloud"  target="_blank"  rel="nofollow" href="http://www.soundcloud.com/enloszapatosdelotro" title="SoundCloud">
                            
                            <img alt="SoundCloud" src="<?php echo base_url();?>images/imagenes/sociales/SoundCloud.png" />
			</a>
			<a class="social-Facebook"  target="_blank"  rel="nofollow" href="http://www.facebook.com/jugaryvivirlosvalores" title="Facebook">
    
                            <img alt="Facebook" src="<?php echo base_url();?>images/imagenes/sociales/Facebook.png" />
			</a>
                        <?php $this->load->view('Shared/info-user');?>
                    </div>  
                </div>
            </div>
            <?php $this->load->view('Shared/header');?>
            <div id="main">
                <div id="forbottom">
                   <div id="frontpage">
                       <section class="container row">
                           <div id="content-music" class="col-xs-12" role="main">
                              <div><h1 class="entry-title">Canciones</h1></div>
                               <div class="breadcrums">
                                    <select class="disco-list" onchange="getDiscoGrado(this.value)">
                                       <option value="" disabled selected>Eliga un grado escolar</option>
                                        <?php foreach ($grados as $key):?>
                                            <option value="<?=$key['id']?>"><?=$key['nombre']?></option>
                                        <?php endforeach?>
                                   </select>
                                   <i class="glyphicon glyphicon-menu-right"></i>
                                    <select id="disco-grado" class="disco-list" onchange="getDisco(this.value)">
                                       <option value="" disabled selected>Eliga un disco</option>
                                        
                                   </select>
                                </div>
                               <div id="presentacion-disco" class="disco-presentacion col-md-12 col-lg-9">
                                   
                                   <div class="imagen-disc col-md-6 col-lg-8">
                                       <?php if(count($discos) >0){?>
                                        <?php if(isset($discoimg)){?>
                                              <img id="img-ptd" class="img-portada img-responsive" src="<?php echo base_url();?><?=$discoimg?>">
                                          <?php }else{?>
                                              <img id="img-ptd" class="img-portada img-responsive" src="<?php echo base_url();?><?=$discos[0]['imagen']?>">
                                            <?php }?>

                                       
                                       <?php }else{?>
                                       <img id="img-ptd" class="img-portada img-responsive" src="<?php echo base_url();?>images/imagenes/notaMusical.png">
                                       <?php } ?>
                                       
                                        <?php  if(isset($cancion)){?>
                                            <?php foreach ($cancion as $key):?>
                                              <div><br>
                                        <a id="fb-cancion" href="javascript: void(0);"onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://enloszapatosdelotro.com.mx/Cancion?c=<?=$key['id']?>','popup', 'toolbar=0, status=0, width=650, height=450');"><img width=150px class="img-responsive" src="<?php echo base_url();?>images/imagenes/boton_compartir_facebook.png"></a>
                                        </div>
                                            <?php endforeach?>  
                                          <?php }else{?>
                                            <div><br>
                                            <a id="fb-cancion" href="javascript: void(0);"onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://enloszapatosdelotro.com.mx/Canciones','popup', 'toolbar=0, status=0, width=650, height=450');"><img width=150px class="img-responsive" src="<?php echo base_url();?>images/imagenes/boton_compartir_facebook.png"></a>
                                            </div>
                                          <?php }?>
                                   </div>
                                   <div class="disco-info col-md-6 col-lg-5">
                                       <?php if(count($discos) >0){?>
                                          <?php if(isset($disconame)){?>
                                              <h1 id="nombre-disco"><?=$disconame?></h1>
                                          <?php }else{?>
                                              <h1 id="nombre-disco"><?=$discos[0]['nombre']?></h1>
                                            <?php }?>

                                        
                                       <?php }else{?>
                                        <h1 id="nombre-disco">Sin Discos disponibles</h1>
                                       <?php } ?>
                                       
                                       <span>Regalanos un Me gusta a Nuestra Pagina</span>
                                       <div class="fb-like" data-href="https://www.facebook.com/JugaryVivirlosValores/" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                                       <div class="listado-music">
                                           <div class="list-title" id="listacanciones"><span class="glyphicon glyphicon-equalizer"></span>
                                           Lista de Canciones (Click sobre canción para reproducir)</div>
                                           <div class="lista-temas" id="titulostemas">
                                              <ul id='playlist' class="audio-lista">
                                               <?php if(count($discos) >0){?>
                                               <?php foreach ($musica as $key):?>
                                               
                                               <li class="promos titulos" id="promos<?=$key['id']?>" onclick="addMusic('<?=$key['id']?>','<?=$key['idDisco']?>','<?php echo base_url();?><?=$key['archivo']?>','<?=$key['titulo']?>')"><a class='promos' id="<?=$key['id']?>"><?=$key['titulo']?></a></li>
                                               
                                               <?php endforeach?>
                                               <?php }else{ ?>
                                                    <li class='promos'><a class='promos'>Sin canciones</a></li>
                                                <?php } ?>
                                               </ul>
                                              <?php if(isset($cancion)){ ?>
                                          <?php foreach ($cancion as $key):?>
                                          <h5 id="cdplayertitle"><?=$key['titulo']?></h5>
                                          <div id="player"><audio id="cdplayer" class="reproductor-mp3" controls autoload src="<?php echo base_url();?><?=$key['archivo']?>">
                                          </audio></div>
                                          <?php endforeach?>
                                       <?php }else{?>
                                          <h5 id="cdplayertitle">Eliga una Canción</h5>
                                          <div id="player"><audio id="cdplayer" class="reproductor-mp3" controls autoload src="">
                                        
                                          </audio></div>
                                        <?php } ?>
                                           </div>
                                       </div>
                                       <?php if(count($discos) >0){?>
                                        <div id="download-cd" class="btn btn-success">
                                           <?php if($login){ ?><a href="<?=$discos[0]['zip']?>" onclick="setHistorial(<?=$discos[0]['id']?>,'Canciones',<?=$id ?>,<?=$discos[0]['administrador']?>)">Descargar</a>
                                           <?php }else{?>
                                             <a onclick="downloadAlert()">Descargar</a>
                                           <?php }?>
                                       </div>
                                       <?php }?>
                                       
                                   </div>
                                   <div class="col-md-12 col-lg-12 descrip-coment">
                                       <ul class="nav nav-tabs">
                                           <li id="li-descrip" class="active"><a id="descrip">Descripción</a></li>
                                           <li id="li-coment"><a id="coment">Comentarios</a></li>
                                        </ul>
                                       <div id="content-descrip" class="col-lg-12">
                                           <?php if(count($discos) >0){?>
                                            <p><?=nl2br($discos[0]['descripcion'])?></p>
                                            <?php }else{?>
                                             <p>No hay descripción</p>
                                            <?php } ?>
                                           
                                       </div>
                                       <div id="content-coment" class="col-lg-12">
                                           <div class="fbdiv1">
                                                <div class="fb-comments" data-href="http://enloszapatosdelotro.com.mx/Canciones" data-numposts="5"></div>
                                            </div>
                                       </div>
                                   </div>
                                   
                                   <div class="col-xs-12"><h4>Productos Relacionados</h4>
                                       <div  class="col-sm-12 col-md-12 col-lg-12" align="center">
                                           <?php $max = sizeof($discos); $flag=0;?>
                                           <?php for ($i = 0; $i < $max ; $i++) {?>
                                                <div class="list-disco col-sm-3">
                                                    <div class="product-rel" align="center">
                                                        <img class="img-responsive" src="<?php echo base_url();?><?=$discos[$i]['imagen']?>" />
                                                    </div>
                                                    <h4 class="text-product-rel"><?=$discos[$i]['nombre']?></h4>
                                                    <div class="btn btn-success">
                                                        <?php if($login){ ?><a href="<?=$discos[$i]['zip']?>" onclick="setHistorial(<?=$discos[$i]['id']?>,'Canciones',<?=$id ?>,<?=$discos[$i]['administrador']?>)">Descargar</a>
                                                        <?php }else{?>
                                                            <a onclick="downloadAlert()">Descargar</a>
                                                          <?php }?>
                                                    </div>
                                                </div>
                                            <?php $flag++;     
                                                if ($flag >= 4) {
                                                    break;
                                                } }?>
                                       </div>
                                   </div>
                               </div>
                               <div style="float: left" class="col-md-12 col-lg-3">
                               <div id="secondary" class="col-md-4" role="complementary">
                                <?php if($login){ ?>
                                <img class="img-responsive" src="images/imagenes/banner-TEMPRANITO.jpg">
                                <?php }else{?>
                                
                                <div id="content-registry" >
                                    <div id="content-registry-form" >
                                        <h3 class="widget-title">Registrarse</h3>
                                        <form role="form" onsubmit="return registrar(this)">
                                         <div class="form-group">
                                           <label>Nombre Completo (*) :</label>
                                           <input id="nombre" name="nombre" type="text" class="form-control form-control2" placeholder="Nombre Completo" required>
                                         </div>
                                         <div class="form-group">
                                           <label>Email (*) :</label>
                                           <input id="correo" name="email" type="email" class="form-control form-control2" placeholder="Introduce tu email" required>
                                         </div>
                                         <div class="form-group">
                                           <label>Grado de Estudios (*) :</label>
                                           <select id="grado" name="grado" class="form-control2">
                                               <option value="" disabled selected>Seleccione su grado de estudios</option>
                                               <option value="Primaria">Primaria</option>
                                               <option value="Secundaria">Secundaria</option>
                                               <option value="Medio Superior">Medio Superior</option>
                                               <option value="Licenciatura">Licenciatura</option>
                                               <option value="Postgrado">Postgrado</option>
                                           </select>
                                         </div>
                                         <div class="form-group">
                                           <label>Contraseña (*) :</label>
                                           <input id="pass" name="password"type="password" class="form-control form-control2" placeholder="Contraseña" required>
                                         </div>
                                         <div class="form-group">
                                            <label>Confirmar contraseña (*) :</label>
                                            <input id="Cpass" name="Cpassword" type="password" class="form-control form-control2" placeholder="Confirmar contraseña" required>
                                        </div>
                                         <div class="form-group">
                                           <label>Ocupación (*) :</label>
                                           <select id="ocupacion" name="ocupacion" class="form-control2">
                                               <option value="" disabled selected>Seleccione su Ocupación</option>
                                               <option value=1>Estudiante</option>
                                               <option value=2>Profesor</option>
                                               <option value=3>Padre de Familia</option>

                                           </select>
                                         </div>
                                         <div class="form-group">
                                          <div class="col-lg-4">
                                          <button type="submit" class="btn btn-login">Enviar</button>
                                          </div>
                                        </div>
                                         <div class="form-group">
                                           <div class="col-lg-4">
                                               <button id="login-facebook-reg" type="button" class="btn btn-primary">Entrar con FB</button>
                                          </div>
                                        </div>
                                       </form>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                                </div>
                           </div>
                           
                       </section>
                   </div>
                </div>
                <?php $this->load->view('Shared/footer');?>
            </div>
        </div>
        
    </body>
</html>
