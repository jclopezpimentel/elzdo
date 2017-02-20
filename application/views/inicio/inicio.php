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
        <title>ELZDO &#8211; Audiocuentos para niños metodos pedagogicos de enseñanza</title>

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
                       <section id="miSlide" class="carousel slide">
                           <ol class="carousel-indicators">
                               <li data-target="#miSlide" data-slide-to="0" class="active"></li>
                               <li data-target="#miSlide" data-slide-to="1"></li>
                               <li data-target="#miSlide" data-slide-to="2"></li>
                               <li data-target="#miSlide" data-slide-to="3"></li>
                           </ol>
                       
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="img-responsive adaptar" src="<?php echo base_url();?>images/imagenes/sliders-Zapatos.png"/>
                                </div>
                                <div class="item">
                                    <img class="img-responsive adaptar" src="<?php echo base_url();?>images/imagenes/sliders-EducyDerechos.png"/>
                                </div>
                                <div class="item">
                                    <img class="img-responsive adaptar" src="<?php echo base_url();?>images/imagenes/sliders-valores.png"/>
                                </div>
                                <div class="item">
                                    <img class="img-responsive adaptar" src="<?php echo base_url();?>images/imagenes/sliders-Secuencias.png"/>
                                </div>
                            </div>
                                <a href="#miSlide" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a href="#miSlide" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                       </section>
                       <div>
                           <div id="front-text1" align="center"><h1>¿Que es Jugar y Vivir los Valores?</h1></div>
                       </div>
                       <div id="front-text3">
                           <blockquote><p>Es un método mediante el cual se crea armonía en las escuelas y las familias de los alumnos, a fin de generar comunidades educativas edificantes.</p></blockquote>
                       </div>
                       <div id="front-columns" class="row" align="center">
                           <div class="col-sm-6 col-lg-3">
                               <a href="#"><h3>Educación</h3></a>
                               <div class="column-image" align="center">
                                   <img class="img-responsive" src="<?php echo base_url();?>images/imagenes/widgets-1-eduyder.png" />
                                   <div class="back-div"></div>
                                   <div class="front-div"><a href="educacionyderechos">Entrar</a></div>
                               </div>
                           </div>
                           <div class="col-sm-6 col-lg-3">
                               <a href="#"><h3>Tempranito Radio</h3></a>
                               <div class="column-image" align="center">
                                   <img class="img-responsive" src="<?php echo base_url();?>images/imagenes/widgets-2-radio.png" />
                                   <div class="back-div"></div>
                                   <div class="front-div"><a href="promoRadio">Entrar</a></div>
                               </div>
                           </div>
                           <div class="col-sm-6 col-lg-3">
                               <a href="#"><h3>Audio Cuentos</h3></a>
                               <div class="column-image" align="center">
                                   <img class="img-responsive" src="<?php echo base_url();?>images/imagenes/widgets-3-audiocuento.png" />
                                   <div class="back-div"></div>
                                   <div class="front-div"><a href="audiocuentosGrado">Entrar</a></div>
                               </div>
                           </div>
                           <div class="col-sm-6 col-lg-3" align="center">
                               <a href="#"><h3>Tienda</h3></a>
                               <div class="column-image">
                                   <img class="img-responsive" src="<?php echo base_url();?>images/imagenes/widgets-4-tienda.png" />
                                   <div class="back-div"></div>
                                   <div class="front-div"><a href="#">Entrar</a></div>
                               </div>
                           </div>
                       </div>
                       <div id="rd-section" class="row">
                           <div class="col-xs-12">
                           <div class="page-fb col-md-6" align="center">
                               <div class="fb-page" data-href="https://www.facebook.com/JugaryVivirlosValores/" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/JugaryVivirlosValores/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/JugaryVivirlosValores/">Jugar y Vivir los Valores</a></blockquote></div>
                           </div>
                           <div class="page-pg col-md-6">
                               <div class="col-sm-12"><h3>Enlace a Materiales de Jugar y Vivir los Valores</h3></div>
                               <div class="col-sm-4"><img class="img-responsive" src="<?php echo base_url();?>images/imagenes/IMG_7259-225x150.jpg"></div>
                               <div class="col-sm-8"><p>Explora nuestros materiales tambien en la página http://jugaryvivirlosvalores.xoc.uam.mx</p></div>
                               <div class="col-sm-12"><p>En este enlace hay articulos, diversas evalucaciones del programa, galeria de fotos y otros materiales.</p></div>
                           </div>
                           </div>
                        </div>
                       
                   </div>
                </div>
                <?php $this->load->view('Shared/footer');?>
            </div>
        </div>
        
    </body>
</html>
