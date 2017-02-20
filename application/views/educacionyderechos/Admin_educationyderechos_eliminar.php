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
  <link rel="stylesheet" href="<?php echo base_url();?>css/enloszapatos.css" />

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
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-2.2.0.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/bootstrap-3.3.6/js/bootstrap.min.js'></script>
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
    <!-- Main content -->
    <section class="content">
            <div class="container">
			<div align="center"><h1>Educacion y Derecho</h1></div>
			<?php if (count($data) >0) {?>
			

			<table id="tableAudios" class="table table-bordered">
				<?php 
          if($tipo == "Recursos"){
						echo "<tr>";
							echo "<thead>";
                                                        echo "<th class='hidden'>Id</th>";
                                                        echo "<th>Portada</th>";
							echo "<th>Titulo</th>";
							echo "<th>Descripcion</th>";
                                                        echo "<th>Fecha</th>";
                                                        echo '<th>Opciones</th>';
							echo "</thead>";
						echo "</tr>";
					?>
					<tbody id="tblbody">
						<?php foreach($data as $educacion){
							echo "<tr>";
                                                                echo "<td class='idd hidden'>".$educacion['id']."</td>";
                                                                echo "<td><img src='".$educacion['imagen']."' class='img-sm'></td>";
								echo "<td>".$educacion['titulo']."</td>";
                                                                echo "<td>".$educacion['descripcion']."</td>";
								echo "<td>".$educacion['fecha']."</td>";
								echo "<td>";
									echo "<button class='btn btn-primary'><a style='color:white;text-decoration:none' target='_blank' href='".$educacion['pdfPath']."'>Abrir</a></button>";
                  echo "<button class='btn btn-primary'><a style='color:white;text-decoration:none' href='editaED?id=".$educacion['id']."'>Editar</a></button>";
									echo "<input class='eliminarEdu btn btn-primary' type='button' value='Eliminar'>";
                                                                        echo "<input id='img".$educacion['id']."' type='hidden' value='".$educacion['imagen']."'>";
                                                                        echo "<input id='pdf".$educacion['id']."' type='hidden' value='".$educacion['pdfPath']."'>";
								echo "</td>";
							echo "</tr>";
						}
          }else{
              echo "<tr>";
              echo "<thead>";
                                                        echo "<th class='hidden'>Id</th>";
                                                        echo "<th>Portada</th>";
              echo "<th>Titulo</th>";
              echo "<th>Descripcion</th>";
                                                        echo "<th>Fecha</th>";
                                                        echo '<th>Administrador</th>';
              echo "</thead>";
            echo "</tr>";
          ?>
          <tbody id="tblbody">
            <?php foreach($data as $educacion){
              echo "<tr>";
                                                                echo "<td class='idd hidden'>".$educacion['id']."</td>";
                                                                echo "<td><img src='".$educacion['imagen']."' class='img-sm'></td>";
                echo "<td>".$educacion['titulo']."</td>";
                                                                echo "<td>".$educacion['descripcion']."</td>";
                echo "<td>".$educacion['fecha']."</td>";
                echo "<td>".$educacion['nombre']."</td>";
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
                                        echo "<th>Portada</th>";
                                        echo "<th>Titulo</th>";
                                        echo "<th>Descripcion</th>";
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
                                        echo "<th>Portada</th>";
                                        echo "<th>Titulo</th>";
                                        echo "<th>Descripcion</th>";
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

<!--          <div id="educaciondiv_admin_eliminar">
            <br>
            <h1>Educación y Derechos</h1>
            <br>
            <div class="table-responsive">
                <table id="table_educacion_admin_eliminar" class="table-condensed ">
                    <?php
                        $img_eliminar = base_url()."/images/imagenes/eliminar.png";    
                        foreach ($data as $key):
                            $imagen = base_url().$key['imagen'];
                            echo "<tr>";
                                echo "<td rowspan= '2'> <img class='img-sm' src="."$imagen"." width='100' height='100'> </td>";
                                echo "<td><h3>".$key['titulo']."</h3></td>";
                                //echo "<td><a onClick='delete_educacion(".$key['pdfPath'].")' href='#'>".$key['id']."</a> </td>";
                                //echo "<td onClick='delete_educacion(".$key['id'].")'>".$key['id']."</td>";
                                echo "<td><img onClick='delete_educacion(".$key['id'].")' class='img-responsive' src="."$img_eliminar"." width='50' height='50'></td>";        
       
                            echo "</tr>";
                            echo "<tr><td><h4>".$key['descripcion']."</h4></td></tr>";

                                                  
                        endforeach;
                                           
                    ?>
                </table>
            </div>

        </div>-->
    
    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div >
</div>
<!-- ./wrapper -->

<script src="<?php echo base_url();?>css/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>css/dist/js/demo.js"></script>
</body>
</html>


























































