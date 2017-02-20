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
        <title>ELZDO &#8211; Educación y Derechos</title>
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
                       <section class="row" id="container">
                           <div id="content" role="main" class="col-md-8">
                               <div><h1 class="entry-title">Educación y Derechos</h1></div>
                               <div id="post-543" class="post-543 page type-page status-publish hentry">
                                   
                                    <div class="entry-content">
                                        <div style="margin-top: 5%">  <?php
                                            if(count($data) >0){
                                                  foreach ($data as $key):
                                                    $imagen = base_url().$key['imagen'];
                                                    echo '<div class="row">';
                                                    echo '<div class="col-md-3">';
                                                    echo '<div>';
                                                    echo '<p class="imged"><img class="img-responsive maxSize" src ="'.$imagen.'" width="200" height="200"></p>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                    echo '<div class="col-md-9">';
                                                    echo '<h3>'.$key['titulo'].'</h3>';
                                                    echo '<p>'.nl2br($key['descripcion']).'</p>';
                                                    if($login){ ?>
                                                        <a style="color:white;text-decoration:none;" target="_blank" href="<?=$key['pdfPath']?>" onclick="setHistorial(<?=$key['id']?>,'Educacion y derecho',<?=$id?>,<?=$key['administrador']?>)"><button class="btn btn-primary">Descargar</button></a>
                                                    <?php }else{ ?>
                                                        <button class="btn btn-primary"><a style="color:white;text-decoration:none;" target="_blank" onclick="downloadAlert()">Descargar</a></button>
                                                    <?php }
                                                    echo '</div>';
                                                    echo '</div>';
                                                    echo '<div class="element-separator"><hr></div>';
//                                                    echo "<tr>";
//                                                        echo "<td rowspan= '2'> <img class='img-responsive' src="."$imagen"." width='200' height='200'> </td>";
//                                                        echo "<td><a href=".$key['pdfPath']." target='_blank'><h1>".$key['titulo']."</h1></a></td>";
//                                                    echo "</tr>";
//                                                    echo "<tr><td><h4>".$key['descripcion']."</h4></td></tr>";
                                                  //    $imagen = base_url().$key['imagen'];
                                                  //   echo "<p> <a href=".$key['url']." title=".$titulo = $key['titulo']." class='titleed'>".$titulo = $key['titulo']."</a></p><p class='imged'><img src="."$imagen"." width='300' height='197'></p></div>";
                                                  //   echo "</tr>"
                                                 endforeach;
                                                ////$mysqli->close();
                                                //echo "<div>";
                                            }
                                            else{
                                                echo '<p><h3>No hay contenido disponible</h3></p>';
                                            }
                                                ?>
                                            

                                        </div>
                                    </div>
                                    <div>
                                        <a id="fb-cancion" href="javascript: void(0);"onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://enloszapatosdelotro.com.mx/educacionyderechos','popup', 'toolbar=0, status=0, width=650, height=450');"><img width=150px class="img-responsive" src="<?php echo base_url();?>images/imagenes/boton_compartir_facebook.png"></a>
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
                                        <div class="fb-comments" data-href="http://enloszapatosdelotro.com.mx/educacionyderechos" data-numposts="5"></div>
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
