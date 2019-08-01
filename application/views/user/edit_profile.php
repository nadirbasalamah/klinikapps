<!doctype html>
<html lang="en">
<?php
    if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $password = ($this->session->userdata['logged_in']['password']);
    $phone_number = ($this->session->userdata['logged_in']['phone_number']);
    $email = ($this->session->userdata['logged_in']['email']);
    $address = ($this->session->userdata['logged_in']['address']);
    $profile_picture = ($this->session->userdata['logged_in']['profile_picture']);
    } else {
    header("location: " . base_url('User/login'));
    }
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit <?php echo $username ?> 's Profile</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/dashboard.css" rel="stylesheet">
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
                <a class="nav-link active" href="<?php echo base_url('User/editProfile'); ?>">
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
        <?php echo form_open_multipart(base_url('User/edit')) ?>
        <div class="form-group">
            <label for="username">Ganti nama pengguna</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Ganti nama pengguna dengan nama yang baru" value=<?php echo $username?>>
        </div>
        <div class="form-group">
                <label for="password">Ganti password</label>
                <input type="password"  name="password" class="form-control" id="password" placeholder="Ganti password dengan password yang baru" value=<?php echo $password?>>
        </div>
        <div class="form-group">
        <label for="gambar">Ganti gambar profil</label>
        <input type="file" class="form-control-file" id="gambar" name="profile_picture" value="<?php echo $profile_picture;?>">
        </div>
        <div class="form-group">
                <label for="phone_number">Ganti nomor ponsel</label>
                <input type="number"  name="phone_number" class="form-control" id="phone_number" placeholder="Ganti nomor ponsel dengan yang baru" value=<?php echo $phone_number?>>
        </div>
        <div class="form-group">
                <label for="email">Ganti Alamat Email</label>
                <input type="email"  name="email" class="form-control" id="email" placeholder="Ganti alamat email dengan alamat email yang baru" value=<?php echo $email?>>
        </div>
        <div class="form-group">
                <label for="address">Ganti Alamat Tempat Tinggal</label>
                <input type="text"  name="address" class="form-control" id="address" placeholder="Ganti alamat tempat tinggal dengan alamat tempat tinggal yang baru" value=<?php echo $address?>>
        </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
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