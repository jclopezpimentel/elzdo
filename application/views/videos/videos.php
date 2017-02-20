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
        <title>ELZDO &#8211; Videos</title>
        <link rel="icon" type="image/jpg" href="/images/imagenes/favicon.jpg" />
        <!--- css boostrap -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-3.3.6/css/bootstrap-theme.min.css" />
        <!--- js JQuery -->
        <script type='text/javascript' src='<?php echo base_url();?>js/jquery-2.2.0.min.js'></script>
        <!--- js boostrap -->
        <script type='text/javascript' src='<?php echo base_url();?>js/bootstrap-3.3.6/js/bootstrap.min.js'></script>
        <!--- css y js enloszapatosdelotro -->
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
                    <section id="container" class="row">
                        <div id="content" role="main" class="col-md-8">
                           <div><h1 class="entry-title">Videos</h1></div>
                                <h3>Bienvenido a la sección de videos.</h3>
                                <div class="breadcrums">
                                    <select onChange="recargarvalores(this.value)" class="disco-list" name="s1" id="s1">
                                        <?php 
                                            if(count($categoria) >0){
                                        ?>
                                        <option value="" disabled selected>Seleccione una categoria</option>
                                        <?php
                                            
                                                foreach ($categoria as $key):
                                                 echo "<option  value='".$key['id']."'>".$key['categoria']."</option>";
                                                endforeach;
                                            }
                                            else{
                                                echo '<option value="" disabled selected>No hay categorías disponibles</option>';
                                            }
                                        ?>
                                    </select>
                                    <i class="glyphicon glyphicon-menu-right" ></i>
                                    <select name="s2" class="disco-list" id="s2" onchange="loadvideos(this.value)">
                               
                                    </select>
                                </div>
                               <div id="post-543" class="post-543 page type-page status-publish hentry">
                                  
                                    <div class="entry-content">
                                            <p class="disco-list">Videos (Click sobre la imagen para ver video):</p>
                                        <div name="contenido" id="contenido" class="embed-container row">
                                            <?php 
                                            if(count($videosUrl) >0){
                                            ?>
                                            <?php
                                                $cont=0;
                                                foreach ($videosUrl as $key):
                                                  $imgs= explode("/", $key['url']);
                                                ?>
                                                <div onclick="showVideo('<?=$key['url']?>','<?=$key['id']?>')" class="col-sm-6 col-md-4">
                                                <a href="#videoplay" class="ancla"><img class="galeria-video img-responsive" src="http://i1.ytimg.com/vi/<?=$imgs[4]?>/hqdefault.jpg"></a>
                                                <h6 class="Mini" id="Minivideo<?=$key['id']?>"><?=$key['titulo']?></h6>
                                                </div>
                                                <?php $cont++; 
                                                if($cont == 6){
                                                  break;
                                                }
                                                endforeach;
                                            }
                                            else{
                                                echo '<h4>No hay videos disponibles</h4>';
                                            }
                                            ?>
                                        </div>
                                        <A id="videoplay"></A><div id="content-video-play">

                                            <?php 
                                                if(count($videosUrl) >0){
                                            ?>
                                            <?php
                                                $cont=0;
                                                foreach ($videosUrl as $key):
                                                  $imgs= explode("/", $key['url']);
                                                ?>
                                                <p class="disco-list">Video Más Reciente:</p>
                                                <iframe width='100%' height='340' src="<?=$key['url']?>" frameborder='0' allowfullscreen> </iframe>
                                                <?php $cont++; 
                                                if($cont == 1){
                                                  break;
                                                }
                                                endforeach;
                                            }?>
                                            </div>
                                    </div>
                               </div>
                               <div id="comments" class=""> 			
                                   <h3 id="comments-title"><i class="glyphicon glyphicon-pencil"></i>
                                        Deja un comentario:			
                                   </h3>
                                   <div class="row">
                                            <div id="fb-root"></div>
                                            <script>(function(d, s, id) {
                                              var js, fjs = d.getElementsByTagName(s)[0];
                                              if (d.getElementById(id)) return;
                                              js = d.createElement(s); js.id = id;
                                              js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.7";
                                              fjs.parentNode.insertBefore(js, fjs);
                                            }(document, 'script', 'facebook-jssdk'));</script>
                                    </div>
                                    <div class="fbdiv1">
                                        <div class="fb-comments" data-href="http://enloszapatosdelotro.com.mx/videos" data-numposts="5"></div>
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
<!--                    <div>
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.7";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                    </div>
                    <div class="fbdiv1">
                        <div class="fb-comments" data-href="https://www.facebook.com/AutoMatic-Software/educacion" data-width="1000" data-numposts="5"></div>
                    </div>-->
                </div>
                <?php $this->load->view('Shared/footer');?>
            </div>
        </div>
        
    </body>
</html>
