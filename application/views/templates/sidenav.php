<?php
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);
?>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href="<?= base_url('dashboard') ?>">
        <div class="d-flex align-items-center">
          <div class="cafe-logo me-2">
            <i class="material-symbols-rounded">coffee</i>
          </div>
          <span class="cafe-title">My Café</span>
        </div>
      </a>

    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">

        <!-- DASHBOARD -->
        <li class="nav-item">
          <a class="nav-link <?= ($segment1 == 'dashboard' && ($segment2 == '' || $segment2 == 'index'))
            ? 'active bg-gradient-dark text-white'
            : 'text-dark' ?>" href="<?= base_url('dashboard/index') ?>">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <!-- MENU -->
        <li class="nav-item">
          <a class="nav-link <?= ($segment2 == 'menu')
            ? 'active bg-gradient-dark text-white'
            : 'text-dark' ?>" href="<?= base_url('dashboard/menu') ?>">
            <i class="material-symbols-rounded opacity-5">restaurant_menu</i>
            <span class="nav-link-text ms-1">Daftar Menu</span>
          </a>
        </li>

                <!-- TABLES -->
        <li class="nav-item">
          <a class="nav-link <?= ($segment1 == 'history')
            ? 'active bg-gradient-dark text-white'
            : 'text-dark' ?>" href="<?= base_url('history') ?>">
            <i class="material-symbols-rounded opacity-5">receipt_long</i>
            <span class="nav-link-text ms-1">History</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($segment1 == 'user')
            ? 'active bg-gradient-dark text-white'
            : 'text-dark' ?>" href="<?= base_url('user') ?>">
            <i class="material-symbols-rounded opacity-5">person</i>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('auth/logout') ?>">
            <i class="material-symbols-rounded opacity-5">logout</i>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
      </ul>

    </div>

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
      data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?= isset($title) ? $title : 'Dashboard'; ?></li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav d-flex align-items-center  justify-content-end">

            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->