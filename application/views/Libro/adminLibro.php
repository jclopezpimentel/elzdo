<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <link rel="icon" type="image/jpg" href="/images/imagenes/favicon.jpg" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
            <div align="center" id="alert">
                <?php
                if ($flag != null){
                    switch ($flag) {
                        case "1":
                            echo '<div id="alerta" class="alert-success">Guardado Correctamente</div>';
                            
                            break;
                        case "2":
                            echo "<div id='alerta' class='alert-danger'>Error al cargar libro</div>";

                            break;
                        case "3":
                            echo '<div id="alerta" class="alert-danger">Error al cargar imagen</div>';
                            break;
                        case "4":
                            echo '<div id="alerta" class="alert-danger">Formato de libro invalido</div>';
                            break;
                        case "5":
                            echo '<div id="alerta" class="alert-danger">Formato de imagen invalido</div>';
                            break;
                        case "6":
                            echo '<div id="alerta" class="alert-danger">El nombre de la imagen ya existe</div>';
                            break;
                        case "7":
                            echo '<div id="alerta" class="alert-danger">El nombre del libro ya existe</div>';
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
        <form enctype="multipart/form-data" class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post" action="saveLibros"><div class="title"><h2>Nuevo Libro</h2></div>
                    <div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont">

                    <input class="large" type="text" name="titulo" required="required" placeholder="Titulo"/><span class="icon-place"></span></div></div>
                    <div class="element-file" title="Imagen del Libro"><label class="title"><span class="required">*</span></label><div class="item-cont"><label class="large" ><div class="button">Imagen</div>

                    <input type="file" class="file_input" name="image" required="required"/><div class="file_text">Imagen del Libro</div><span class="icon-place"></span></label></div></div>
                    <div class="element-file" title="Nuevo Libro"><label class="title"><span class="required">*</span></label><div class="item-cont"><label class="large" ><div class="button">Libro</div>

                    <input type="file" class="file_input" name="libro" required="required"/><div class="file_text">Nuevo Libro</div><span class="icon-place"></span></label></div></div>
                    <div class="element-textarea" title="Descripcion"><label class="title"><span class="required">*</span></label><div class="item-cont">

                    <textarea class="medium" name="descrip" cols="20" rows="5" required="required" placeholder="Descripcion"></textarea><span class="icon-place"></span></div></div>
                  <div class="submit"><input type="submit" value="Agregar"/></div>
        </form>
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

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>css/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>css/bootstrap-3.3.6/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url();?>css/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>css/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>css/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>css/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>css/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url();?>css/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>css/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>css/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>css/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>css/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>css/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>css/dist/js/demo.js"></script>
</body>
</html>

