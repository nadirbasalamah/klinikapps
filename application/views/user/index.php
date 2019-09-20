<!DOCTYPE html>
<html lang="en">
<?php
    if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $fullname = ($this->session->userdata['logged_in']['fullname']);
    $profile_picture = ($this->session->userdata['logged_in']['profile_picture']);
    } else {
    header("location: " . base_url('User/index'));
    }
?>
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo_klinik.png');?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    User's Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>">
  <!-- CSS Files -->
  <link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.1');?>" rel="stylesheet" />
</head>
<body style="background-image:<?php echo 'url(' . base_url('assets/img/w.png') . ')'?>;">
    <div class="wrapper ">
      <div class="sidebar" data-color="azure" data-background-color="white" data-image="#">
        <div class="logo">
          <a href="#" class="simple-text logo-normal">
            <img src="<?php echo base_url('assets/img/logo_klinik.png');?>" width="82" height="86" title="Poliklinik UB" alt="Poliklinik UB">
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item active ">
              <a class="nav-link" href="#">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo base_url('User/editProfile'); ?>">
                <i class="material-icons">person</i>
                <p>Edit Profil</p>
              </a>
            </li>
            <li class="nav-item  ">
              <a class="nav-link" href="<?php echo base_url('User/viewNutritionRecord/' . $fullname); ?>">
                <i class="material-icons">content_paste</i>
                <p>Lihat Data Gizi</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
              <div class="navbar-wrapper">
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end">
                <form class="navbar-form">
               
                </form>
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">person</i>
                      <p class="d-lg-none d-md-block">
                        Akun
                      </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                      <a class="dropdown-item" href="<?php echo base_url('User/editProfile');?>">Profil</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo base_url('User/logout');?>">Log out</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
      <!-- End Navbar -->
   <br>
   <br>
   <br>
   <div class="container">
    <div class="row">
      <div class="col">
          <br>
          <br>
          <br>
        <h1 style="margin-left:30px;">Selamat Datang  <br>
          di Klinik Apps</h1>
          <p style="margin-left:30px;">Peduli Berbagi dan Mengedukasi</p>
          <button style="margin-left:31px;" type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Get Started</button>
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 style="text-align:center; " class="modal-title" id="exampleModalLabel">Guide Klinik App</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="background-color: darkcyan;color: white" class="modal-body">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
                <h6 style="text-align: right" >Login</h6>
                <p>Masukkan nama dan kata sandi yang telah didaftarkan</p>
              <img class="d-block w-100" src="<?php echo base_url('assets/img/user/halaman_login.png');?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <h6 style="text-align: right" >Sidebar Menu</h6>
                <p>Akses berbagai menu melalui sidebar</p>
              <img class="d-block w-100" src="<?php echo base_url('assets/img/user/halaman_sidebar_user.png');?>" alt="Second slide">
            </div>
            <div class="carousel-item">
                <h6 style="text-align: right" >View Nutrition Record</h6>
                <p>Lihat data gizi Anda melalui halaman Lihat Data Gizi</p>
              <img class="d-block w-100" src="<?php echo base_url('assets/img/user/halaman_nut_record_user.png');?>" alt="Third slide">
            </div>
            <div class="carousel-item">
                <h6 style="text-align: right" >User's Profile</h6>
                <p>Ubah profil Anda melalui halaman Edit Profil</p>
                <img class="d-block w-100" src="<?php echo base_url('assets/img/user/halaman_profil_user.png');?>" alt="Forth slide">
              </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   
      </div>
  </div>
    
    
  </div>
</div>

      </div>
      <div class="col">
        <br>
        <br>
        <img style="  box-shadow:  rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        " src="<?php echo  base_url('assets/img/mockup_user.png');?>" alt="Halaman Dashboard" width="495" height="355">
      </div>
    </div>
</div>
<footer>
<div class="container">
  <br>
  <br>
  <br>




<div class="d-flex justify-content-center">
    <div class="p-2 bd-highlight"><a href="https://www.instagram.com/klinik_ub/" target="_blank"><img src="<?php echo  base_url('assets/img/instagram.png');?>" alt="Instagram" width="35" height="35"></a></div>
    <div class="p-2 bd-highlight"><a href="https://poliklinik.ub.ac.id" target="_blank"><img src="<?php echo  base_url('assets/img/internet.png');?>" alt="Poliklinik UB Website" width="35" height="35"></a></div>
    <div class="p-2 bd-highlight"><a href="https://gmail.com" target="_blank"><img src="<?php echo  base_url('assets/img/email.png');?>" alt="Email Poliklinik UB" width="35" height="35"></a></div>
    <div class="p-2 bd-highlight"><a href="https://www.youtube.com/channel/UC3kzWE0yWG8c5ZS_-OWQaUA" target="_blank"><img src="<?php echo  base_url('assets/img/youtube.png');?>" alt="Youtube" width="35" height="35"></a></div>
    <div class="p-2 bd-highlight"><a href="https://api.whatsapp.com/send?phone=081333999121&text=Selamat%20Pagi&source=&data=" target="_blank"><img src="<?php echo  base_url('assets/img/whatsapp.png');?>" alt="WhatsApp" width="35" height="35"></a></div>
  </div>

</div>


<h6 style="text-align: center">© 2019 Copyright Klinik Apps</h6>

</footer>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/js/core/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/core/popper.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/core/bootstrap-material-design.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/jquery.validate.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/jquery.bootstrap-wizard.js');?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/jquery.dataTables.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-tagsinput.js');?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/nouislider.min.js');?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js');?>"></script>
  <script src="<?php echo base_url('assets/js/material-dashboard.js?v=2.1.1');?>" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;
            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');
          } else {
            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');
            setTimeout(function() {
              $('body').addClass('sidebar-mini');
              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>
</html>