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
        <title>ELZDO &#8211; Contacto</title>
        <link rel="icon" type="image/jpg" href="/images/imagenes/favicon.jpg" />
        <!--- css boostrap -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-3.3.6/css/bootstrap.min_1.css" />
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
                           <div id="content" role="main">
                                
                               <div id="post-46" class="col-md-8 post-46 page type-page status-publish hentry">
                                    <h1 class="entry-title">Contacto</h1>
                                    <div class="entry-content">
                                        <h4></h4>
                                        <p id="contacto">Estamos siempre encantados de escuchar a nuestros clientes. No dude en ponerse en contacto con nosotros con cualquier pregunta o comentario!</p>
                                        <div role="form" class="wpcf7" id="wpcf7-f83-p46-o1" dir="ltr">
                                            <div class="screen-reader-response"></div>
                                            <form action="<?php echo base_url();?>sendQuestion" method="post" class="wpcf7-form" onsubmit="return validateContact()" required>
                                                <div class="form-group">
                                                    <p>Nombre (requerido)<br>
                                                        <span class="wpcf7-form-control-wrap your-name"><input type="text" id="name" name="name" value="" size="40" class="form-control" aria-required="true" aria-invalid="false" required></span> 
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <p>Email (requerido)<br>
                                                        <span class="wpcf7-form-control-wrap your-email"><input type="email" id="email" name="email" value="" size="40" class="form-control" aria-required="true" aria-invalid="false" required></span> 
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <p>Asunto<br>
                                                        <span class="wpcf7-form-control-wrap your-subject"><input type="text" id="subject" name="subject" value="" size="40" class="form-control" aria-invalid="false" required></span> 
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <p>Mensaje<br>
                                                        <span class="wpcf7-form-control-wrap your-message"><textarea id="message" name="message" cols="40" rows="10" class="form-control" aria-invalid="false" required></textarea></span> 
                                                    </p>
                                                </div>
                                                <p><input type="submit" value="Enviar" class="wpcf7-form-control wpcf7-submit"><img class="ajax-loader" src="http://enloszapatosdelotro.com.mx/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Enviando..." style="visibility: hidden;"></p>
                                                <div class="wpcf7-response-output wpcf7-display-none"></div>
                                            </form>
                                        </div><!--asdasd-->
                                        <p>&nbsp;</p>
                                        <div style="clear:both;"></div>
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
