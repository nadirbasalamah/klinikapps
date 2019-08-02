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
    <title>Add New Student</title>
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
                <a class="nav-link" href="<?php echo base_url('Admin/index'); ?>">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only"></span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Admin/viewStudents'); ?>">
                  <span data-feather="users"></span>
                  Lihat Data Siswa
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url('Admin/editProfile'); ?>">
                  <span data-feather="user">(current)</span>
                  Edit Profil
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Profil Anda</h1>
          </div>
        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart(base_url('Admin/addStudent')) ?>
        <div class="form-group">
            <label for="fullname">Nama Lengkap</label>
            <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Ganti nama lengkap" value="<?php echo set_value('fullname'); ?>">
        </div>
        <div class="form-group">
                <label for="birthdate">Tanggal Lahir</label>
                <input type="text"  name="birthdate" class="form-control" id="birthdate" placeholder="format:dd/mm/yyyy" value="<?php echo set_value('birthdate'); ?>">
        </div>
        <div class="form-group">
                <label for="age">Umur</label>
                <input type="number"  name="age" class="form-control" id="age" placeholder="Isi umur siswa" value="<?php echo set_value('age'); ?>">
        </div>
        <label for="gender-select">Jenis Kelamin</label>
        <div class="form-check form-check-inline" id="gender-select">
        <input class="form-check-input" type="radio" name="gender" id="genderlakilaki" value="lakilaki" checked>
        <label class="form-check-label" for="genderlakilaki">Laki-laki</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="genderperempuan" value="perempuan">
        <label class="form-check-label" for="genderperempuan">Perempuan</label>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar Profil</label>
            <input type="file" class="form-control-file" id="gambar" name="profile_picture">
        </div>
        <div class="form-group">
                <label for="phone_number">Nomor ponsel</label>
                <input type="number"  name="phone_number" class="form-control" id="phone_number" placeholder="Isi nomor ponsel yang dapat dihubungi" value="<?php echo set_value('phone_number'); ?>">
        </div>
        <div class="form-group">
                <label for="status">Alamat Tempat Tinggal</label>
                <input type="text"  name="address" class="form-control" id="address" placeholder="Isi alamat tempat tinggal" value="<?php echo set_value('address'); ?>">
        </div>
        <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email"  name="email" class="form-control" id="email" placeholder="Isi alamat email" value="<?php echo set_value('email'); ?>">
        </div>
        <div class="form-group">
                <label for="status">Status</label>
                <input type="text"  name="status" class="form-control" id="status" placeholder="Isi status gizi siswa" value="<?php echo set_value('status'); ?>">
        </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
          </div>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
          <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
          <script>feather.replace()</script>
        </main>
      </div>
    </div>
  </body>
</html>