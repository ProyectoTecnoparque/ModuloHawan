<?php
if (!isset($_SESSION['tipo_usuario'])) {
  header("Location: " . base_url());
  die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio Hawah</title>
  <link rel="icon" href="<?php echo base_url('public/dist/img/TRAVELL.png'); ?>" type="image/ico" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo base_url('/public/dist/css/font.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->

  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('/public/dist/css/adminlte.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/daterangepicker/daterangepicker.css') ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/summernote/summernote-bs4.min.css') ?>">

  <!-- jQuery -->
  <script src="<?php echo base_url('/public/plugins/jquery/jquery.min.js'); ?>"></script>
  <!-- sweetalert2 -->
  <script src="<?php echo base_url('/public/plugins/sweetalert2/sweetalert2.all.min.js'); ?>"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Datatables
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>"> -->

  <link rel="stylesheet" href="//cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">

  <script src="<?php echo base_url('/public/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>


  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/toastr/toastr.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!--  Preloader 
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div> -->
        
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" >
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo base_url('Inicio') ?>" class="nav-link">INICIO</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" type="button" id="abrir_chat">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notificaciones</span>
              <div class="dropdown-divider"></div>
              <a type="button" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 nuevos mensajes
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 solicitudes de amigos
                <span class="float-right text-muted text-sm">12 horas</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 nuevos reportes
                <span class="float-right text-muted text-sm">2 d??as</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">Mirar todas las notificaciones</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-success elevation-4" >
      <!-- Brand Logo -->
      <a href="<?php echo base_url('Inicio'); ?>" class="brand-link">
        <img src="<?php echo base_url('public/dist/img/TRAVELL.png');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; background-color: white;">
        <span class="brand-text font-weight-light"><?php echo $_SESSION['tipo_usuario']; ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">

            <a href="<?php echo base_url('Inicio/cargarVistaInicio'); ?>" class="d-block"><?php echo explode(" ", $_SESSION["nombres"])[0] . " " . explode(" ", $_SESSION["apellidos"])[0]; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

            <?php if ($_SESSION['tipo_usuario'] == "Administrador") { ?>
              <li class="nav-item <?php echo (isset($modulo_selected) && $modulo_selected == 'Usuarios') ? 'menu-is-opening menu-open' : ''; ?> ">
                <a href="#" class="nav-link <?php echo (isset($modulo_selected) && $modulo_selected == 'Usuarios') ? 'active' : ''; ?> ">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview  ">

                  <li class="nav-item">
                  <a href="<?php echo base_url('/ModuloUsuarios/RegistrarAdministrador') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'BuscarUsuarios') ? 'active' : ''; ?> ">
                      <i class="nav-icon fas fa-user-plus fa-xs"></i>
                      <p>Registrar Administrador</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo base_url('/ModuloUsuarios/BuscarUsuarios') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'BuscarUsuarios'); ?> ">
                      <i class="nav-icon fas fa-address-book"></i>
                      <p>Buscar Usuarios</p>
                    </a>
                  </li>

                </ul>
              </li>

            <?php } ?>

            <!-- <li class="nav-item <?php echo (isset($modulo_selected) && $modulo_selected == 'Puntos') ? 'menu-is-opening menu-open' : ''; ?> ">
              <a href="#" class="nav-link <?php echo (isset($modulo_selected) && $modulo_selected == 'Puntos') ? 'active' : ''; ?> ">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Puntos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <?php if ($_SESSION['tipo_usuario'] == "Usuario") { ?>

                  <li class="nav-item">
                    <a href="<?php echo base_url('/ModuloPuntos/Puntos') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'Puntos') ? 'active' : ''; ?> ">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>Historial Puntos</p>
                    </a>
                  </li>

                <?php } ?>
                  <?php if ($_SESSION['tipo_usuario'] == "Administrador") { ?>

                  <li class="nav-item">
                    <a href="<?php echo base_url('/Historial'); ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'Puntos') ? 'active' : ''; ?> ">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>Niveles Puntos</p>
                    </a>
                  </li>

                <?php } ?>
              </ul>

                <?php if ($_SESSION['tipo_usuario'] == "Administrador") { ?>

                  <li class="nav-item">
                    <a href="<?php echo base_url('/ModuloPuntos/Puntos') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'Puntos') ? 'active' : ''; ?> ">
                      <i class="nav-icon fab fa-sellsy"></i>
                      <p>Puntos Usuarios</p>
                    </a>
                  </li>
                <?php } ?>
            </li> -->

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/Puntos');?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Niveles Puntos </span>
                  </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/Historial');?>">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>Historial Acumulados</span>
                  </a>
            </li>

            <li class="nav-item <?php echo (isset($modulo_selected) && $modulo_selected == 'Perfil') ? 'menu-is-opening menu-open' : ''; ?>">
              <a href="<?php echo base_url('/ModuloUsuarios/PerfilUsuario') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'PerfilUsuario') ? 'active' : ''; ?> ">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>Ver Perfil</p>
              </a>
            </li>
            
            

            <li class="nav-item ">
              <a href="<?php echo base_url('Inicio/cerrarSession') ?>" class="nav-link">
                <i class="nav-icon fas fa-door-open"></i>
                <p>
                  Cerrar sesion
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- chat -->
    <div class="col-3 " style="float: right; ">
      <div class="card direct-chat direct-chat-primary d-none mt-3" id="div_chat">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
          <h3 class="card-title">Chat </h3>

          <div class="card-tools">
            <span title="3 New Messages" class="badge badge-primary">3</span>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
              <i class="fas fa-comments"></i>
            </button>
            <button type="button" class="btn btn-tool" id="btn_cerrar">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
          <!-- Conversations are loaded here -->
          <div class="direct-chat-messages">

          </div>
          <!--/.direct-chat-messages-->

          <!-- Contacts are loaded here -->
          <div class="direct-chat-contacts">
            <ul class="contacts-list">
              <li>
                <a href="#">
                  <img class="contacts-list-img" src="<?php echo base_url('public/dist/img/travel.png');?>" alt="User Avatar">

                  <div class="contacts-list-info">
                    <span class="contacts-list-name">
                      Count Dracula
                      <small class="contacts-list-date float-right">2/28/2015</small>
                    </span>
                    <span class="contacts-list-msg">How have you been? I was...</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
              <!-- End Contact Item -->
              <li>
                <a href="#">
                  <img class="contacts-list-img" src="<?php echo base_url('public/dist/img/travel.png');?>" alt="User Avatar">

                  <div class="contacts-list-info">
                    <span class="contacts-list-name">
                      Sarah Doe
                      <small class="contacts-list-date float-right">2/23/2015</small>
                    </span>
                    <span class="contacts-list-msg">I will be waiting for...</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
              <!-- End Contact Item -->
              <li>
                <a href="#">
                  <img class="contacts-list-img" src="<?php echo base_url('public/dist/img/travel.png') ?>" alt="User Avatar">

                  <div class="contacts-list-info">
                    <span class="contacts-list-name">
                      Nadia Jolie
                      <small class="contacts-list-date float-right">2/20/2015</small>
                    </span>
                    <span class="contacts-list-msg">I'll call you back at...</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
              <!-- End Contact Item -->
              <li>
                <a href="#">
                  <img class="contacts-list-img" src="<?php echo base_url('public/dist/img/avatar.png') ?>" alt="User Avatar">

                  <div class="contacts-list-info">
                    <span class="contacts-list-name">
                      Nora S. Vans
                      <small class="contacts-list-date float-right">2/10/2015</small>
                    </span>
                    <span class="contacts-list-msg">Where is your new...</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
              <!-- End Contact Item -->
            </ul>
            <!-- /.contacts-list -->
          </div>
          <!-- /.direct-chat-pane -->
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
    </div>

  