<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Educacion y Derechos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/jpg" href="/images/imagenes/favicon.jpg" />
  <script type='text/javascript' src='<?php echo base_url();?>js/enloszapatos.js'></script>
  <link rel="stylesheet" href="<?php echo base_url();?>formoid_files/formoid1/formoid-solid-blue.css" type="text/css" />
  <script type="text/javascript" src="<?php echo base_url();?>formoid_files/formoid1/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>formoid_files/formoid1/formoid-solid-blue.js"></script>

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-3.3.6/css/bootstrap.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/formoid-solid-blue.css" type="text/css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<link rel="stylesheet" href="https://formoid.net/lib/form.css" type="text/css">
<script type="text/javascript" src="<?php echo base_url();?>js/formoid-solid-blue.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-3.3.6/css/alerts.css" />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-2.2.0.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/enloszapatos.js'></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('SharedAdmin/header');?>
  <?php 
   if($tipo == 'Recursos'){
        $this->load->view('SharedAdmin/main');
   }else{
       $this->load->view('SharedAdmin/maingral');
   }
   ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

    
    <div id="educaciondiv">
    <br>
    <br>
    <div align="center" id="alert">
                <?php
                if ($flag != null){
                    switch ($flag) {
                        case "0":
                            echo "<div id='alerta' class='alert-danger'>El nombre de la imagen ya existe</div>";
                            
                            break;
                        case "1":
                            echo '<div id="alerta" class="alert-danger">El nombre del pdf ya existe</div>';
                            break;
                        case "2":
                            echo '<div id="alerta" class="alert-danger">Error al cargar imagen</div>';
                            break;
                        case "3":
                            echo '<div id="alerta" class="alert-danger">Error al cargar pdf</div>';
                            break;
                        case "4":
                            echo '<div id="alerta" class="alert-success">Guardado correctamente</div>';
                            break;
                        case "5":
                            echo '<div id="alerta" class="alert-danger">Formato de pdf invalido</div>';
                            break;
                        case "6":
                            echo '<div id="alerta" class="alert-danger">Formato de imagen invalido</div>';
                            break;
                        default:
                            break;
                    }
                    
                }
                ?>
                    <script languaje="javascript">
                        setTimeout(function(){
                             $("#alerta").slideToggle("slow");
                        },3000);
                    </script>
                </div>
<form action="updateforoeyd"  enctype="multipart/form-data" class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post">

    <div class="title">
        <h2>Educación y Derechos</h2>
    </div>

        <div class="element-input">
            <label class="title">
                <span class="required">*</span>
            </label>
            <div class="item-cont">
                <input class="large" type="text" name="titulo" required="required" placeholder="Titulo"/>
                <span class="icon-place"></span>
            </div>
        </div>


        <div class="element-textarea">
            <label class="title">
                <span class="required">*</span>
            </label>
            <div class="item-cont">
                <textarea class="medium" name="descripcion" cols="20" rows="5" required="required" placeholder="Descripción"></textarea>
                <span class="icon-place"></span>
            </div>
        </div>


        <div class="element-file" title="Imagen">
            <label class="title">
                <span class="required">*</span>
            </label>
            <div class="item-cont">
                <label class="large">
                    <div class="button">Imagen</div>
                    <input type="file" class="file_input" name="imagen" required="required"/>
                    <div class="file_text">No file selected</div>
                    <span class="icon-place"></span>
                </label>
            </div>
        </div>


        <div class="element-file" title="Pdf">
            <label class="title">
                <span class="required">*</span>
            </label>
            <div class="item-cont">
                <label class="large">
                    <div class="button">PDF</div>
                    <input type="file" class="file_input" name="pdf" required="required"/>
                    <div class="file_text">No file selected</div>
                    <span class="icon-place"></span>
                </label>
            </div>
        </div>

        <div class="submit">
            <input type="submit" value="Guardar"/>
        </div>
    </form>
</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="<?php echo base_url();?>css/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>css/dist/js/demo.js"></script>
</body>
</html>























