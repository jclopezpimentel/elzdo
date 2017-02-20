
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="Admins/<?=$nombre."/".$foto ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$nombre ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">PRINCIPAL</li>
        <li class="treeview">
          <a href="#">
            <i class="fa"></i> <span>Pagina Web</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a target="_blank" href="http://enloszapatosdelotro.com.mx"><i class="fa fa-circle-o"></i>Ir a la página</a></li>
          </ul>
        </li>
        <?php if($SD == 1){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-suitcase"></i> <span>Secuencias Didacticas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="admiSD"><i class="fa fa-circle-o"></i> Crear</a></li>
            <li class="active"><a href="deleteSD"><i class="fa fa-circle-o"></i> Opciones</a></li>
          </ul>
        </li>
        <?php }?>
        <?php if($ED == 1){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-balance-scale"></i>
            <span>Educación y Derechos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Admin_educationyderechos"><i class="fa fa-circle-o"></i>Crear</a></li>
            <li><a href="Admin_educationyderechos_eliminar"><i class="fa fa-circle-o"></i>Opciones</a></li>
          </ul>
        </li>
        <?php }?>
        <?php if($PR == 1){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-simplybuilt"></i>
            <span>Promo Radio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="AdmipromoRadio"><i class="fa fa-circle-o"></i>Crear</a></li>
            <li><a href="deletePodcast"><i class="fa fa-circle-o"></i>Opciones</a></li>
          </ul>
        </li>
        <?php } ?>
        <?php if($AC == 1){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-audio-o"></i>
            <span>Audio Cuentos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="AudioAdmin"><i class="fa fa-circle-o"></i>Crear</a></li>
            <li><a href="deleteAudios"><i class="fa fa-circle-o"></i>Opciones</a></li>
          </ul>
        </li>
        <?php }?>
        <?php if($CN == 1){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-music"></i>
            <span>Canciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="AdminDisco"><i class="fa fa-circle-o"></i>Crear</a></li>
            <li><a href="agregarDisco"><i class="fa fa-circle-o"></i>Agregar</a></li>
            <li><a href="borrarDisco"><i class="fa fa-circle-o"></i>Opciones</a></li>
          </ul>
        </li>
        <?php } ?>
        <?php if($VD == 1){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-film"></i>
            <span>Videos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admivideos"><i class="fa fa-circle-o"></i>Crear</a></li>
            <li><a href="deleteVideos"><i class="fa fa-circle-o"></i>Opciones</a></li>
          </ul>
        </li>
        <?php } ?>
        <?php if($LB == 1){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Libro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="adminLibro"><i class="fa fa-circle-o"></i>Crear</a></li>
            <li><a href="deleteLibro"><i class="fa fa-circle-o"></i>Opciones</a></li>
          </ul>
        </li>
        <?php }?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-history"></i>
            <span>Historial</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="historialAdmin"><i class="fa fa-circle-o"></i>Descargas</a></li>
          </ul>
        </li>
        <!--
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        -->


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
