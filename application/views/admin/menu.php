<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url();?>">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-desktop"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="/admin/attributions">
      <i class="fas fa-clipboard-list"></i>
      <span>Attributions</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link" href="/admin/users">
      <i class="fas fa-user"></i>
      <span>Utilisateurs</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/admin/postes">
      <i class="fas fa-desktop"></i>
      <span>Postes</span></a>
  </li>
  

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>


     

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<?php if(isset($title)):?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?=$title;?></h1>
</div>
<?php endif;?>

<!-- Content Row -->
<div class="row">