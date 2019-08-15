<!DOCTYPE html>
<html lang="en">
<?php
    if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $profile_picture = ($this->session->userdata['logged_in']['profile_picture']);
    } else {
    header("location: " . base_url('User/login'));
    }
?>
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo_klinik.png');?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Add new Student Data
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>">
  <!-- CSS Files -->
  <link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.1');?>" rel="stylesheet" />
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="<?php echo base_url('assets/img/sidebar-1.jpg');?>">
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
          <img src="<?php echo base_url('assets/img/logo_klinik.png');?>" width="82" height="86" title="White flower" alt="Flower">
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="<?php echo base_url('Admin/index'); ?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
              
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="#">
              <i class="material-icons">add</i>
              <p>Tambah Siswa</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('Admin/viewStudents'); ?>">
              <i class="material-icons">content_paste</i>
              <p>Daftar Siswa</p>
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
            <a class="navbar-brand" href="#pablo">Tambah Data Siswa</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form" action="#" method="post">
              <div class="input-group no-border">
                  <div class="ripple-container"></div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="<?php echo base_url('Admin/editProfile');?>">Profil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url('User/logout');?>">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card card-profile">
            </div>
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Tambah Data Siswa Baru </h4>
                </div>
                
                <div class="card-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart(base_url('Admin/addStudent')) ?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Lengkap</label>
                          <input type="text" class="form-control" name="fullname">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat Email</label>
                          <input type="email" class="form-control" name="email">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Lahir (dd/mm/yyyy)</label>
                          <input type="text" class="form-control" name="birthdate">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat Tempat Tinggal</label>
                          <input type="text" class="form-control" name="address">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Umur</label>
                          <input type="number" class="form-control" name="age">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">No Telp</label>
                          <input type="number" class="form-control" name="phone_number">
                        </div>
                      </div>
                    </div>
                    <br><label>Upload Foto</label><br>
                   <div style="padding:10px;margin-left:-10px;  " container>
                            <label class="bmd-label-floating"></label>
                       <input type="file" id="gambar" name="profile_picture">
                   </div>
                   <div style="padding:5px; " container>
                   <p>Jenis Kelamin</p>
                   <div class="form-check form-check-radio">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" value="lakilaki" >
                        Laki-laki
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                    </label>
                  </div>
                  <div class="form-check form-check-radio">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" value="perempuan" >
                        Perempuan
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                    </label>
                  </div>
             </div>
             <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Status</label>
                    <input type="text" class="form-control" name="status">
                  </div>
                </div>
                <!--pendidikan dll.-->
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Pendidikan</label>
                    <input type="text" class="form-control" name="education">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Pekerjaan</label>
                      <input type="text" class="form-control" name="job">
                    </div>
                  </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Agama / suku</label>
                    <input type="text" class="form-control" name="religion">
                  </div>
                </div>
              </div>
                    <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
          
          </nav>
         
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/js/core/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/core/popper.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/core/bootstrap-material-design.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo base_url('assets/js/plugins/moment.min.js');?>"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo base_url('assets/js/plugins/sweetalert2.js');?>"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url('assets/js/plugins/jquery.validate.min.js');?>"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?php echo base_url('assets/js/plugins/jquery.bootstrap-wizard.js');?>"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-selectpicker.js');?>"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-datetimepicker.min.js');?>"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo base_url('assets/js/plugins/jquery.dataTables.min.js');?>"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-tagsinput.js');?>"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?php echo base_url('assets/js/plugins/jasny-bootstrap.min.js');?>"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?php echo base_url('assets/js/plugins/fullcalendar.min.js');?>"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?php echo base_url('assets/js/plugins/jquery-jvectormap.js');?>"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url('assets/js/plugins/nouislider.min.js');?>"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="<?php echo base_url('assets/js/plugins/arrive.min.js');?>"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url('assets/js/plugins/chartist.min.js');?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js');?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
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