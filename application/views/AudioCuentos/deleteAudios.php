<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/jpg" href="/images/imagenes/favicon.jpg" />
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
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-3.3.6/css/alerts.css" />
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
  <script type='text/javascript' src='<?php echo base_url();?>js/enloszapatos.js'></script>
  
<script type='text/javascript' src='<?php echo base_url();?>js/bootstrap-3.3.6/js/bootstrap.min.js'></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-3.3.6/css/bootstrap-theme.min.css" />

<script type='text/javascript' src='<?php echo base_url();?>js/jquery-2.2.0.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/bootstrap-3.3.6/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/enloszapatos.js'></script>
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
        <div class="container">
			<div align="center"><h1>Audios</h1></div>
			<?php if (count($audios) >0) {?>
			
			<div><h3>Audio Cuentos</h3></div>

			<table id="tableAudios" class="table table-bordered">
				<?php
          if($tipo == "Recursos"){
						echo "<tr>";
							echo "<thead>";
                                                        echo "<th class='hidden'>Id</th>";
							echo "<th>Titulo</th>";
							echo "<th>Grado Escolar</th>";
							echo "<th>Fecha</th>";
                                                        echo '<th>Opciones</th>';
							echo "</thead>";
						echo "</tr>";
					?>
					<tbody id="tblbody">
						<?php foreach($audios as $audio){
							echo "<tr>";
                                                                echo "<td class='idd hidden'>".$audio['id']."</td>";
								echo "<td>".$audio['titulo']."</td>";
                                                                echo "<td>".$audio['nombre']."</td>";
								echo "<td>".$audio['fecha']."</td>";
								echo "<td>";
									echo "<button class='btn btn-primary'><a style='color:white;text-decoration:none' target='_blank' href='".$audio['Archivo']."'>Abrir</a></button>";
                  echo "<button class='btn btn-primary'><a style='color:white;text-decoration:none' href='editaCuentos?id=".$audio['id']."'>Editar</a></button>";
									echo "<input class='eliminarbtn btn btn-primary' type='button' value='Eliminar'>";
                                                                        echo "<input id='route".$audio['id']."' type='hidden' value='".$audio['Archivo']."'>";
								echo "</td>";
							echo "</tr>";
						}
          }else{
              echo "<tr>";
              echo "<thead>";
                                                        echo "<th class='hidden'>Id</th>";
              echo "<th>Titulo</th>";
              echo "<th>Grado Escolar</th>";
              echo "<th>Fecha</th>";
                                                        echo '<th>Administrador</th>';
              echo "</thead>";
            echo "</tr>";
          ?>
          <tbody id="tblbody">
            <?php foreach($audios as $audio){
              echo "<tr>";
                                                                echo "<td class='idd hidden'>".$audio['id']."</td>";
                echo "<td>".$audio['titulo']."</td>";
                                                                echo "<td>".$audio['nombre']."</td>";
                echo "<td>".$audio['fecha']."</td>";
                echo "<td>".$audio['adm']."</td>";
              echo "</tr>";
            }
          }
						?>
					</tbody>
			</table>
			<?php }
			else{
        if($tipo == "Recursos"){
                            echo '<table id="tableasignaturas" class="table table-bordered">';
				echo "<tr>";
                                    echo "<thead>";
                                    echo "<th class='hidden'>Id</th>";
                                    echo "<th>Titulo</th>";
                                    echo "<th>Grado Escolar</th>";
                                    echo "<th>Fecha</th>";
                                    echo '<th>Opciones</th>';
                                    echo "</thead>";
                                echo "</tr>";
                            echo '</table>';
                            echo '<div align="center"> <h3>Registros vacios</h3></div>';
        }else{
             echo '<table id="tableasignaturas" class="table table-bordered">';
        echo "<tr>";
                                    echo "<thead>";
                                    echo "<th class='hidden'>Id</th>";
                                    echo "<th>Titulo</th>";
                                    echo "<th>Grado Escolar</th>";
                                    echo "<th>Fecha</th>";
                                    echo '<th>Administrador</th>';
                                    echo "</thead>";
                                echo "</tr>";
                            echo '</table>';
                            echo '<div align="center"> <h3>Registros vacios</h3></div>';
        }
			} 
			?>
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

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>css/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>js/bootstrap-3.3.6/js/bootstrap.min.js"></script>
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

