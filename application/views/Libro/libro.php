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
        <title>ELZDO &#8211; Libros</title>
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
                               <div><h1 class="entry-title">Libros</h1></div>
                               <div id="post-543" class="post-543 page type-page status-publish hentry">
                                    <div class="entry-content">
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-3 buscador">
                                                <form action="" class="search-form" onkeyup="filterLibro(this)">
                                                    <div class="form-group has-feedback">
                                                        <?php
                                                        if(count($data_libro)>0){
                                                        ?>
                                                            <input type="text" class="form-control" name="search" id="search" placeholder="search">
                                                        <?php
                                                        
                                                        }
                                                        else{
                                                            ?>
                                                            <input type="text" class="form-control" name="search" id="search" placeholder="search" disabled>
                                                        <?php
                                                        
                                                        }
                                                        
                                                        ?>
                                                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div id="contentLibros">
                                    <?php 
                                    if(count($data_libro) >0){
                                    foreach ($data_libro as $datos_libro): ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img class="img-responsive imgLibro"  alt="SoundCloud" src="<?=$datos_libro['imagen'];?>" />
                                            </div>
                                            <div class="col-md-8">
                                                <p class= "pTituloLibro"><?=$datos_libro['titulo']; ?> </p>
                                                <p class="pDes"> <?=nl2br($datos_libro['Descripcion']); ?></p>
                                                <?php if($login){ ?>
                                                    <a id="pdf" style="color:white;text-decoration: none" target="_blank" href="<?=$datos_libro['pdf'];?>" onclick="setHistorial(<?=$datos_libro['id']?>,'Libros',<?=$id ?>,<?=$datos_libro['administrador']?>)"><button id="descargar" class="btn btn-primary" name="DESCARGAR">Descargar</button></a>
                                                <?php }else{?>
                                                    <button id="descargar" class="btn btn-primary"name="DESCARGAR"><a id="pdf" style="color:white;text-decoration: none" target="_blank" onclick="downloadAlert()">Descargar</a></button>
                                                <?php }?>
                                                
                                                
                                                <br>
                                                
                                            </div> 
                                            </div> 
                                            <div class="element-separator sep"><hr></div>
                                    <?php endforeach; }
                                    else{
                                        echo '<h3>No hay libros disponibles</3>';
                                    }
                                    ?>    
                                </div> 
                                        
                                    </div>
                               </div>
                               <div>
                                <a id="fb-cancion" href="javascript: void(0);"onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://enloszapatosdelotro.com.mx/revista','popup', 'toolbar=0, status=0, width=650, height=450');"><img width=150px class="img-responsive" src="<?php echo base_url();?>images/imagenes/boton_compartir_facebook.png"></a>
                                </div>
                               <div id="comments" class=""> 			
                                   <h3 id="comments-title"><i class="glyphicon glyphicon-pencil"></i>
                                        Deja un comentario:			
                                   </h3>
                                   <div class="row">
                                            <div id="fb-root"></div>
                                    </div>
                                    <div class="fbdiv1">
                                        <div class="fb-comments" data-href="http://enloszapatosdelotro.com.mx/revista" data-numposts="5"></div>
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
