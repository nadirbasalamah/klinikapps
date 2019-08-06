<!doctype html>
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Student Data</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/dashboard.css');?>" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">KlinikApps</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="<?php echo base_url('User/logout');?>">Logout</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
            <li class="nav-item">
            <img src="<?php echo base_url('profile_pictures/') . $profile_picture; ?>" class="rounded mx-auto d-block" alt="Display picture" width="50" height="50">
            </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('User/viewDashboard'); ?>">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only"></span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('User/viewStudents'); ?>">
                  <span data-feather="users"></span>
                  Lihat Data Siswa
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('User/editProfile'); ?>">
                  <span data-feather="user"></span>
                  Edit Profil
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Profil Siswa</h1>
          </div>
        <?php foreach($student as $stdnt):?>
        <h4>Nama Lengkap            : </h4><?php echo $stdnt->fullname;?>
        <br/>
        <h4>Alamat Tempat Tinggal   : </h4><?php echo $stdnt->address;?>
        <br/>
        <h4>Status                  : </h4><?php echo $stdnt->status;?>
        <br/>
        <?php endforeach;?>
          </div>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <!-- <script src="../assets/js/vendor/popper.min.js"></script> -->
          <script src="../assets/js/bootstrap.min.js"></script>
          <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
          <script>feather.replace()</script>
        </main>
      </div>
    </div>
  </body>
</html>