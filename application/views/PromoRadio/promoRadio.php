<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es-ES">
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="icon" type="image/jpg" href="/images/imagenes/favicon.jpg" />
        <?php  if(isset($titulo)){?>
            <title>ELZDO &#8211; Promo Radio - <?=$titulo?></title>
          
        <?php }else{?>
          <title>ELZDO &#8211; Promo Radio</title>
        <?php }?>
        <!--- css boostrap -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-3.3.6/css/bootstrap-theme.min.css" />
        <!--- js JQuery -->
        
        <script type='text/javascript' src='<?php echo base_url();?>js/jquery-2.2.0.min.js'></script>
        <!--- js boostrap -->
        <script type='text/javascript' src='<?php echo base_url();?>js/bootstrap-3.3.6/js/bootstrap.min.js'></script>
        <!--- css y js enloszapatosdelotro -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/enloszapatos.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/styleRepro.css" />
        <script type='text/javascript' src='<?php echo base_url();?>js/enloszapatos.js'></script>
        <script type='text/javascript' src='<?php echo base_url();?>js/jsRepro.js'></script>
        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js' type='text/javascript'/>
        <script>
        
        </script>

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
                       <section id="container" class="row">
                            <div id="content" role="main" class="col-md-8">
                                
                                <div><h1 class="entry-title">Promo Radio</h1></div>
                                <div style="width: 90%;padding-left: 10%;padding-top: 5%">
                                <?php if(isset($titulo)){ ?>
                                      <div id='player'>
                                         <div id="titu"><?=$titulo?></div>
                                         <audio style="width: 100%" controls='' id='audio' preload='auto' tabindex='0' type='audio/mpeg'>
                                              <source src='<?=$url?>' type='audio/mp3'/>
                                          Hola, tu navegador no está actualizado y no puede mostrar este contenido.
                                          </audio>
                                          </div>

                                     <div id="comentarios"><?=nl2br($descripcion)?></div>
                                <?php }else{?>
                                      <div id='player'>
                                         <div id="titu"><?php if(count($lista)!=0){  echo $lista[0]['titulo'];?></div>
                                         <audio style="width: 100%" controls='' id='audio' preload='auto' tabindex='0' type='audio/mpeg'>
                                              <source src='<?php echo base_url(); echo $lista[0]['podcast'];?>' type='audio/mp3'/>
                                          Hola, tu navegador no está actualizado y no puede mostrar este contenido.
                                          </audio>
                                          </div>

                                     <div id="comentarios"><?php echo nl2br($lista[0]['descripcion']);}else{?></div>
                                     <audio style="width: 100%" controls='' id='audio' preload='auto' tabindex='0' type='audio/mpeg'>
                                    <source src='' type='audio/mp3'/>
                                Hola, tu navegador no está actualizado y no puede mostrar este contenido.
                                </audio>
                                </div>
                           <div id="comentarios"> <?php } ?></div>
                                <?php } ?>

                                <ul id='playlist' class="audio-lista">
                                    <?php
                                    if(count($lista)!=0){
                                        foreach ($lista as $key):
                                        echo "<li class='promos' id='promos".$key['id']."'><a class='promos'  id='".$key['id']."' onclick='runaudio(this.id)' >".$key['titulo']."</a></li>";
                                        endforeach;
                                    }
                                    ?>
                                </ul>
                                 </div>
                                    <?php  if(isset($titulo)){?>
                                        <div>
                                        <a id="fb-podcast" href="javascript: void(0);" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://enloszapatosdelotro.com.mx/podcasts?id=<?=$idp ?>','popup', 'toolbar=0, status=0, width=650, height=450');"><img width=150px class="img-responsive" src="<?php echo base_url();?>images/imagenes/boton_compartir_facebook.png"></a>
                                      </div>
                                      <?php }else{?>
                                        <div>
                                        <a id="fb-podcast" href="javascript: void(0);" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://enloszapatosdelotro.com.mx/promoRadio','popup', 'toolbar=0, status=0, width=650, height=450');"><img width=150px class="img-responsive" src="<?php echo base_url();?>images/imagenes/boton_compartir_facebook.png"></a>
                                      </div>
                                      <?php }?>
                                      
                                <div id="comments" class=""> 			
                                   <h3 id="comments-title"><i class="glyphicon glyphicon-pencil"></i>
                                        Deja un comentario:			
                                   </h3>
                                    <div class="fbdiv1">
                                        <div class="fb-comments" data-href="http://enloszapatosdelotro.com.mx/promoRadio" data-numposts="5"></div>
                                    </div>
                                   
                                </div>
                             </div>    
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
                        </section>
                       
                   </div>
                    
                </div>
                <?php $this->load->view('Shared/footer');?>
            </div>
        </div>
        
    </body>
</html>
