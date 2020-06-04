<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GTProj</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https:/code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/css/gtproj.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https:/fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div data-target="<?=base_url()?>" id="base_url" hidden></div>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-2" id="search-go">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Busqueda" aria-label="Search" data-toggle="tooltip" data-placement="bottom" title="Búsuqeda por comas, separe cada palabra con una coma">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-success navbar-badge">3</span>
        </a>
        
      </li> -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link"  href="<?=base_url()?>/home/news ">
          <i class="fas fa-info-circle"></i>
          
        </a>
        
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Panel de <?=empty($user) ? "usuario" : $user['username']?></span>
          <div class="dropdown-divider"></div>
          <?php
          if (empty($user)) {
          
          ?>
          <a href="<?=base_url()?>/user/login" class="dropdown-item">
            <i class="fas fa-sign-in-alt mr-2"></i> Iniciar sesión
          </a>
          <?php
          }
          else {
          
          ?>
          <div class="dropdown-divider"></div>
          <!-- <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 solicitudes
            <span class="float-right text-muted text-sm">12 horas</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-hand-peace mr-2"></i> 3 nuevos likes
            
          </a> -->
          <div class="dropdown-divider"></div>
          <a href="<?=base_url()?>/user/logout" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Salir
            
          </a>
          
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <a href="<?=base_url()?>/user?id=<?=$user['id']?>" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Mi perfil
            
          </a>
          
          <div class="dropdown-divider"></div>
          
        </div>
        <?php
          }
        ?>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" >
      <img src="<?=base_url()?>/assets/img/gtproj.png" alt="Gt proj" style="background-color: white;" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">GTProj</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url()?>" class="nav-link <?=$home?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Cuadrícula
                
              </p>
            </a>
            
          </li>
          <?php
            if (!empty($user)) {
              # code...
            
          ?>
          <li class="nav-item">
            <a href="<?=base_url()?>/collection/mycollection" class="nav-link <?=$collection?>">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Mi colección
                
              </p>
            </a>
          </li>
          <?php
          }
          ?>
         <!--  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-stream"></i>
              <p>
                Timeline
                
              </p>
            </a>
            
          </li> -->
  
          <li class="nav-header"><?= isset($contextual_name) ? $contextual_name : "Contextual"?></li>
              <div id="taglist-delimitator">
            
              <?php
              if (isset($contextual)) {
                foreach ($contextual as $value) {
                  echo '<li class="nav-item"><a href="'.$value['url'].'" class="nav-link"><p>'.$value['nav'].'</p></a></li>';
                }
                echo "</div>";
                echo '<li class="nav-item"><a id="offset" current-page="0" class="nav-link"><span>Ver más etiquetas</span>&nbsp;&nbsp;&nbsp;<span class="pull-right-container"><i class="fa fa-plus pull-right"></i></span></a></li>';
              }
              
              ?>
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <?php
    if (!empty($message)) {
      # code...
    
    ?>
      <div class="alert alert-<?=$message['type']?> alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon <?= $message['symbol']?>"></i> Mensaje</h5>
        <?=$message['message']?>.
      </div>
    <?php 
    }
    ?>
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $header_name ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php
              if (!empty($breadcrum)) {
                 foreach ($breadcrum as $key => $value) {
                  echo "<li class='breadcrumb-item active'><a href='".$value."'>".$key."</a></li>";
                }
              }
               
              ?>
              <li class="breadcrumb-item active"><?= $header_name?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>  