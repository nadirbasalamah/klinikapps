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
    <title>Students List</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/dashboard.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/table.css')?>" rel="stylesheet">
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
                <a class="nav-link active" href="<?php echo base_url('Admin/viewStudents'); ?>">
                  <span data-feather="users">(current)</span>
                  Lihat Data Siswa
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Admin/editProfile'); ?>">
                  <span data-feather="user"></span>
                  Edit Profil
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <div class="container-fluid">
		    <h2>Daftar Siswa</h2>
        <table class="table" cellpadding="5" cellspacing="0">
        <thead>
          <tr class="header">
          <th scope="col">No</th>
          <th scope="col">Nama Siswa</th>
          <th scope="col">Alamat</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
          </tr>
        </thead>
			<tbody>
                <?php $count = 1; foreach($students as $student):?>
                <tr>
                    <th scope="row"><?php echo $count++;?></th>
                    <td><?php echo $student->fullname;?></td>
                    <td><?php echo $student->address;?></td>
                    <td><?php echo $student->status;?></td>
                    <td>
                        <a class="btn btn-info" href="<?php echo base_url('Admin/viewEditStudent/' . $student->id_student);?>">
                        <span data-feather="edit"></span>
                        </a>
                        <a class="btn btn-danger" href="<?php echo base_url('Admin/deleteStudent/' . $student->id_student);?>">
                        <span data-feather="delete"></span>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
		    </table>
			<a href='<?php echo base_url('Admin/viewAddStudent');?>' class="btn btn-primary">Tambah Data</a>
			</div>
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