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
        <?php
         if(count($imagen) >0){ 
             foreach($imagen as $key): 
             $title =$key['titulo'];
             
         endforeach;?>
         <title>ELZDO &#8211; Secuencias Didacticas - <?=$title?></title>
         <?php }else{ ?>
         <title>ELZDO &#8211; Secuencias Didacticas</title>
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
                                <div><h1 class="entry-title">Secuencias Didácticas</h1></div>
                                <div class="breadcrums">
                                         <?php
                                         if(count($imagen) >0){ 
                                             foreach($imagen as $key): 
                                             $titulo =$key['titulo'];
                                             $pdf =$key['pdf'];
                                             $ids =$key['id'];
                                             $idadmin =$key['administrador'];
                                             $portada =$key['portada'];
                                             
                                         endforeach;}
                                         ?>
                                    <select class="disco-list" onchange="getSecuenciaGrado(this.value)">
                                       <option value="" disabled selected>Eliga un grado escolar</option>
                                        <?php foreach ($grados as $key):?>
                                            <option value="<?=$key['id']?>"><?=$key['nombre']?></option>
                                        <?php endforeach?>
                                   </select>
                                    <i class="glyphicon glyphicon-menu-right"></i>
                                    <select id="secuencia-grado" class="disco-list" onchange="getSecuencia(this.value)">
                                        <option value="" disabled selected>Seleccione una Secuencia Didáctica</option>  
                                    </select>

                                </div>
                               
                               <div id="post-543" class="post-543 page type-page status-publish hentry">
                                   <!--<div><h1 class="entry-title">Bienvenida</h1></div>-->
                                   
                                    <div class="entry-content">
                                        <?php 
                                            if(count($imagen) >0 ){ 
                                        ?>
                                        <div style="margin-top: 5%">
                                            <div class="col-md-4">
                                            <?php 
                                            
                                                echo"<div><p class='imged'><img id='portada' class='img-responsive' src='".$portada."' width='200' height='197'></p></div>";

                                            ?>



                                            </div>
                                            <div class="col-md-8" >
                                                <div id="title"><h3><?=$titulo ?></h3></div>
                                                <?php if($login){ ?>
                                                    <a id="pdf" style="color:white;text-decoration: none" target="_blank" href="<?=$pdf?>" onclick="setHistorial(<?=$ids?>,'Secuencias didacticas',<?=$id ?>,<?=$idadmin ?>)"><button id="descargar" class="btn btn-primary" name="DESCARGAR">Descargar</button></a><br><br><br><br>
                                                <?php }else{?>
                                                  <button id="descargar" class="btn btn-primary" name="DESCARGAR"><a id="pdf" style="color:white;text-decoration: none" target="_blank" onclick="downloadAlert()">Descargar</a></button><br><br><br><br>
                                                <?php }?>
                                            </div>
                                            <?php if(count($imagen) >0){?>
                                                <div>
                                              <a id="fb-secuencia" href="javascript: void(0);" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://enloszapatosdelotro.com.mx/secuencia?id=<?=$ids?>','popup', 'toolbar=0, status=0, width=650, height=450');"><img width=150px class="img-responsive" src="<?php echo base_url();?>images/imagenes/boton_compartir_facebook.png"></a>
                                              </div>
                                                 <?php }else{ ?>
                                                 <div>
                                              <a id="fb-secuencia" href="javascript: void(0);" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://enloszapatosdelotro.com.mx/Bienvenida','popup', 'toolbar=0, status=0, width=650, height=450');"><img width=150px class="img-responsive" src="<?php echo base_url();?>images/imagenes/boton_compartir_facebook.png"></a>
                                              </div>
                                                 <?php }?>      
                                        </div>
                                        <?php
                                            } 
                                            else{
                                                echo '<h3>No hay secuencias didácticas disponibles</h3>';
                                            }
                                                
                                                ?>
                                    </div>
                               </div>
                               
                               <div id="comments" class=""> 			
                                   <h3 id="comments-title"><i class="glyphicon glyphicon-pencil"></i>
                                        Deja un comentario:			
                                   </h3>
                                   <div class="row">
                                            <div id="fb-root"></div>
                                    </div>
                                    <div class="fbdiv1">
                                        <div class="fb-comments" data-href="http://enloszapatosdelotro.com.mx/Bienvenida" data-numposts="5"></div>
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
