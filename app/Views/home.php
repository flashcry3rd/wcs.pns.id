<!--
=========================================================
* Soft UI Dashboard - v1.0.6
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php 
header("Access-Control-Allow-Origin: *");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/logo_pns_web.png">
  <title>
    PNS | Weight Scale System
  </title>
  <meta http-equiv="origin-trial" content="AiM0rMslVx2jumsJjQ144QeZTScNmGVMYzBuXoaMQwCd7UHWbQH8Rg20adCN7XWaTMai4HvsUIyx3+blPPiupwEAAABreyJvcmlnaW4iOiJodHRwczovL3VuamF2YXNjcmlwdGVyLXdlYi1zZXJpYWwtZXhhbXBsZS5nbGl0Y2gubWU6NDQzIiwiZmVhdHVyZSI6IlNlcmlhbCIsImV4cGlyeSI6MTU5Njk3OTA1NX0=">
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
  <!--     Fonts and icons     -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" /> -->
  <!-- <link href="./assets/fonts/google-font.css" rel="stylesheet" /> -->
  
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
  <script src="./assets/fonts/42.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
</head>

<style>

#loading-menu{
    display: block;
    background: white;
    position: absolute;
    width: 100%;
      height: 100%;
    z-index: 10000;
    background-color: rgba(255,255,255,0.1); /* Black w/ opacity */
    
}
 
/* cyrillic-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSKmu1aB.woff2') format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSumu1aB.woff2') format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* greek-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSOmu1aB.woff2') format('woff2');
  unicode-range: U+1F00-1FFF;
}
/* greek */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSymu1aB.woff2') format('woff2');
  unicode-range: U+0370-03FF;
}
/* hebrew */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS2mu1aB.woff2') format('woff2');
  unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
}
/* vietnamese */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSCmu1aB.woff2') format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSGmu1aB.woff2') format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2') format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSKmu1aB.woff2') format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSumu1aB.woff2') format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* greek-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSOmu1aB.woff2') format('woff2');
  unicode-range: U+1F00-1FFF;
}
/* greek */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSymu1aB.woff2') format('woff2');
  unicode-range: U+0370-03FF;
}
/* hebrew */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS2mu1aB.woff2') format('woff2');
  unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
}
/* vietnamese */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSCmu1aB.woff2') format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSGmu1aB.woff2') format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2') format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSKmu1aB.woff2') format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSumu1aB.woff2') format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* greek-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSOmu1aB.woff2') format('woff2');
  unicode-range: U+1F00-1FFF;
}
/* greek */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSymu1aB.woff2') format('woff2');
  unicode-range: U+0370-03FF;
}
/* hebrew */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS2mu1aB.woff2') format('woff2');
  unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
}
/* vietnamese */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSCmu1aB.woff2') format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSGmu1aB.woff2') format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2') format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* cyrillic-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSKmu1aB.woff2') format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
/* cyrillic */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSumu1aB.woff2') format('woff2');
  unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}
/* greek-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSOmu1aB.woff2') format('woff2');
  unicode-range: U+1F00-1FFF;
}
/* greek */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSymu1aB.woff2') format('woff2');
  unicode-range: U+0370-03FF;
}
/* hebrew */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS2mu1aB.woff2') format('woff2');
  unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
}
/* vietnamese */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSCmu1aB.woff2') format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSGmu1aB.woff2') format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  font-stretch: 100%;
  src: url('./assets/fonts/gstatic/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2') format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}

</style>
<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main" data-color="success">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" target="_blank">
        <img src="./assets/img/logo_pns_web.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Weight Scale System</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <? foreach($menu as $m){ 

          if(null !== session()->get('menu') && session()->get('menu')==$m['link_menu']){ 
            $active="active" ; 
          }else if(null == session()->get('menu') && $m['id']==1){ 
            $active="active";
          }else{ 
            $active="";
          } 
          
          ?>
        <li class="nav-item">
          <a class="nav-link pointer <?=$active?>" style="cursor: pointer;" data-link = "<?= $m['link_menu'] ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="<?= $m['icon'] ?>" style="color: black"></i>
            </div>
            <span class="nav-link-text ms-1"><?= $m['nama_menu'] ?></span>
          </a>
        </li>
        <? } ?>

      </ul>
    </div>
    <?php if(session()->get('username') != 'superhero'):?>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
        <div class="full-background" style="background-image: url('/assets/img/curved-images/white-curved.jpg')"></div>
        <div class="card-body text-start p-3 w-100">
          <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
            <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
          </div>
          <div class="docs-info">
            <h6 class="text-white up mb-0">Butuh bantuan ?</h6>
            <p class="text-xs font-weight-bold">Silahkan download manual berikut</p>
            <a href="<?= base_url() ?>/assets/Buku Panduan.pdf" target="_blank" class="btn btn-white btn-sm w-100 mb-0">Buku Panduan</a>
          </div>
        </div>
      </div>

      <div class="row" style="padding-top: 1em;">
      <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-12 md-2">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © 2023, 
                <a class="font-weight-bold" target="_blank">Patama Nusantara Sakti</a>
               
              </div>
            </div>
        
          </div>
        </div>
        </div>
    </div>
    <?php endif;?>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <!-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol> -->
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <!-- Status online -->
                <a href="javascript:;" class="nav-link text-body font-weight-bold  mb-0 me-2">
                    <i class="ni ni-circle-08 me-sm-1"></i>
                    <span class="d-sm-inline d-none"><?= session()->get('nama') ?></span>
                </a>
              
            </li>
            <li class="nav-item d-flex align-items-center">
              
              <a class="status-online-btn btn btn-outline-success btn-sm mb-0 me-2" ><i class="fa fa-circle me-sm-1"></i> Online</a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <!-- setting -->
              <!-- <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a> -->
              
              <a class="status-online btn btn-secondary btn-sm mb-0 me-3" href="<?= base_url() ?>/logout"><i class="fa fa-sign-out me-sm-1"></i> Logout</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4" >
   
      <div id="page-item" style="overflow-y: auto; overflow-x: hidden">
      
      
      </div>
      <div id="root"></div>

      <file-formats-modal id="files-requeriments"></file-formats-modal>
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="./scripts/JSPrintManager.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
            
    </script>
    <!-- Github buttons -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/main.js"></script>
    <script>
      $(document).ready(function(){
        
        $(".pointer").click(function(){
            var link = $(this).data('link');

            $(".pointer").removeClass("active");
            $(this).addClass("active");
            $("#page-item").load("home"+link);

        })
        var ses_menu = "<? if(null !== session()->get('menu')){ echo session()->get('menu') ; }else{ echo "";} ?>";
        if(ses_menu==""){
          $("#page-item").load("home/dashboard");
        }else{
          $("#page-item").load("home"+ses_menu);
        }


        const checkOnlineStatus = async () => {
          let options = {
              method: 'GET',
              headers: {
                  'Content-Type': 
                      'application/json;charset=utf-8' ,
                  'Access-Control-Allow-Origin': '*' 

              }
          }
          try {
              // const online = await fetch("http://api.pns.co.id/index.php/android/check2");
              const online = await fetch("<?=base_url() ?>/home/check2");
              return online.status >= 200 && online.status < 300; // either true or false
          } catch (err) {
              return false; // definitely offline
          }
       
          // fetch('http://api.pns.co.id/index.php/android/check', options)
          //   .then(response => response.json())
          //   .then(data => console.log(data));
        };
        var autoHitung = setInterval(async () =>{
          const result = await checkOnlineStatus();
          if(result==false){
            $(".status-online-btn").removeClass("btn-outline-success");
            $(".status-online-btn").addClass("btn-outline-danger");
            $(".status-online-btn").html("Offline");
          }else{
            $(".status-online-btn").removeClass("btn-outline-danger");
            $(".status-online-btn").addClass("btn-outline-success");
            $(".status-online-btn").html("Online");
            await $.ajax({
              url: "<?=base_url()?>/home/sync2"
            })
          }
        }, 30000);
        
      })
     
        
        
    </script>
    
</body>

</html>