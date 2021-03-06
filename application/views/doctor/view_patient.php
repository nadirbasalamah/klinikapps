<!DOCTYPE html>
<html lang="en">
<?php
    if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
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
    View Patient's Profile
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
          <li class="nav-item  ">
            <a class="nav-link" href="<?php echo base_url('Doctor/index'); ?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
              
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="#">
              <i class="material-icons">assignment</i>
              <p>Lihat Profil Pasien</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('Doctor/viewPatients'); ?>">
              <i class="material-icons">content_paste</i>
              <p>Daftar Pasien</p>
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
                  <a class="dropdown-item" href="<?php echo base_url('Doctor/editProfile');?>">Profil</a>
                
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url('User/logout');?>">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <?php 
      if(!empty($patient)) {
      foreach($patient as $ptnt):?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card card-profile">
            </div>
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Identitas Pasien (Registrasi)</h4>
                </div>
                <div class="card-body">
                  <form action="#">
                    <div class="row">
               <div class="col-md-12">
                        <div class="form-group">
                          <h6>Nomor RM</h6>
                          <p><?php echo $ptnt->rm_number;?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    
                      <div class="col-md-12">
                        <div class="form-group">
                        <h6>Nomor RM Gizi</h6>
                          <p><?php echo $ptnt->rmgizi_number;?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>Tanggal Kunjungan</h6>
                          <p><?php echo $ptnt->visitdate;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>Rujukan</h6>
                          <p><?php echo $ptnt->referral;?></p>
                          <br>
                          <br>
                        </div>
                      </div>
                    </div>
       
                  </form>
                </div>
              </div>
            </div>
          
        </div>
      </div>
      

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#">
                    <img class="img" src="<?php echo base_url('profile_pictures/') . $ptnt->profile_picture; ?>" />
                  </a>
                </div>
            </div>
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Identitas Pasien (Data Diri)</h4>
                </div>
                
                <div class="card-body">
                  <form action="#">
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>Nama Pasien</h6>
                          <p><?php echo $ptnt->fullname;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>Tempat Tanggal Lahir</h6>
                          <p><?php echo $ptnt->birthdate;?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>Alamat Email</h6>
                          <p><?php echo $ptnt->email;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>No Telp</h6>
                          <p><?php echo $ptnt->phone_number;?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <h6>Alamat Tempat Tinggal</h6>
                          <p><?php echo $ptnt->address;?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>Pendidikan</h6>
                          <p><?php echo $ptnt->education;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>Pekerjaan</h6>
                          <p><?php echo $ptnt->job;?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>Agama</h6>
                          <p><?php echo $ptnt->religion;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>Usia</h6>
                          <p><?php echo $ptnt->age;?></p>
                        </div>
                      </div>
                    </div>
              </form>
                </div>
              </div>
            </div>
           </div>
      </div>
</div>
<!--for doctor--->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card">
               
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Data</h4>
                  <p class="card-category">Antropometri</p>
                </div>
                
                <div class="card-body">
                  <form action="#">
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>BB</h6>
                          <p><?php echo $ptnt->bb;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>IMT</h6>
                          <p><?php echo $ptnt->imt;?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>TB</h6>
                          <p><?php echo $ptnt->tb;?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6>BBI</h6>
                          <p><?php echo $ptnt->bbi;?></p>
                        </div>
                      </div>
                    </div>
                      <br>
                          <div class="col-md-12">
                              <div class="form-group">
                                <h6>Status Gizi (Kategori)</h6>
                                <div class="form-check form-check-radio">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="underweight" <?= $ptnt->status=="underweight" ? "checked" : ""?> disabled>
                                      Underweight
                                      <span class="circle">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                              <div class="form-check form-check-radio">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="normal" <?= $ptnt->status=="normal" ? "checked" : ""?> disabled>
                                      Normal
                                      <span class="circle">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                              <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="overweight" <?= $ptnt->status=="overweight" ? "checked" : ""?> disabled>
                                    Overweight
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="obese" <?= $ptnt->status=="obese" ? "checked" : ""?> disabled>
                                    Obese
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                          </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
   
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Data</h4>
                <p class="card-category">Biokimia</p>
              </div>
              
              <div class="card-body">
                <form action="#">
                  
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <h6>GDA</h6>
                        <p><?php echo $ptnt->gda;?></p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <h6>Trigliserida</h6>
                        <p><?php echo $ptnt->trigliserida;?></p>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <h6>Ureum</h6>
                          <p><?php echo $ptnt->ureum;?></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <h6>GDP</h6>
                            <p><?php echo $ptnt->gdp;?></p>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <h6>Kolesterol Total</h6>
                            <p><?php echo $ptnt->kolesterol;?></p>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <h6 class="form-group">
                              <h6>Kreatinin</h6>
                              <p><?php echo $ptnt->kreatinin;?></p>
                            </h6>
                          </div>
                        </div>
                        <h6 class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <h6 >GD2JPP</h6>
                                <p><?php echo $ptnt->gd2jpp;?></p>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <h6>LDL</h6>
                                <p><?php echo $ptnt->ldl;?></p>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <h6>SGOT</h6>
                                  <p><?php echo $ptnt->sgot;?></p>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <h6>Asam Urat</h6>
                                    <p><?php echo $ptnt->asam_urat;?></p>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <h6>HDL</h6>
                                    <p><?php echo $ptnt->hdl;?></p>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <h6>SGPT</h6>
                                      <p><?php echo $ptnt->sgpt;?></p>
                                    </div>
                                  </div>
                                </div>
                </form>
              </div>
            </div>
          </div>
       
      </div>
  </div>
  </div>
  
  <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card">
             
              <div class="card-header card-header-primary">
                <h4 class="card-title">Data</h4>
                <p class="card-category">Klinik</p>
              </div>
              
              <div class="card-body">
                <form action="#">
                  
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <h6>Tensi (mmHg)</h6>
                        <p><?php echo $ptnt->tensi;?></p>
                      </div>
                    </div>
                   
                    <div class="col-md-4">
                        <div class="form-group">
                          <h6 >Suhu(Celcius)</h6>
                          <p><?php echo $ptnt->suhu;?></p>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <h6 >lainnya</h6>
                            <p><?php echo $ptnt->lainnya;?></p>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <h6 >RR(x/menit)</h6>
                            <p><?php echo $ptnt->rr;?></p>
                          </div>
                        </div>
                       
                        <div class="col-md-4">
                            <div class="form-group">
                              <h6 >Oedema</h6>
                              <p><?php echo $ptnt->oedema;?></p>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <br>
                            <div class="form-group">
                              <h6 >Aktivitas</h6>
                              <div class="col-md-4">
                            <br>
                            <div class="form-group">
                              <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="aktivitas" id="exampleRadios1" value="ringan" required <?= $ptnt->aktivitas=="ringan" ? "checked" : ""?> disabled>
                                    Ringan
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="aktivitas" id="exampleRadios2" value="sedang" <?= $ptnt->aktivitas=="sedang" ? "checked" : ""?> disabled>
                                    Sedang
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="aktivitas" id="exampleRadios2" value="berat" <?= $ptnt->aktivitas=="berat" ? "checked" : ""?> disabled>
                                  Berat
                                  <span class="circle">
                                      <span class="check"></span>
                                  </span>
                              </label>
                          </div>
                              </div>
                              </div>
                            </div>
                            
                        </div>
                          
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <h6 >Olahraga (x dalam 1 minggu,selama x menit)</h6>
                          <p><?php echo $ptnt->durasi_olahraga;?></p>
                        </div>
                      </div>
                     
                      <div class="col-md-6">
                          <div class="form-group">
                            <h6 >Jenis Olahraga</h6>
                            <p><?php echo $ptnt->jenis_olahraga;?></p>
                          </div>
                        </div>
                       
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <h6 >Diagnosa Dahulu </h6>
                              <p><?php echo $ptnt->diagnosa_dahulu;?></p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <h6 >Diagnosa Sekarang </h6>
                                <p><?php echo $ptnt->diagnosa_skrg;?></p>
                              </div>
                            </div>
                          </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
    </div>
  
  <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card">
             
              <div class="card-header card-header-primary">
                <h4 class="card-title">Edit </h4>
                <p class="card-category">Dietary</p>
              </div>
              
              <div class="card-body">
                <form action="#">
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <h6 >Nafsu Makan ( + / -)</h6>
                        <p><?php echo $ptnt->nafsu_makan;?></p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <h6 >Frekuensi Makan( x/hari , teratur/tidak teratur ) </h6>
                        <p><?php echo $ptnt->frekuensi_makan;?></p>
                      </div>
                    </div>
                   
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <h6 >Alergi / Pantangan</h6>
                            <p><?php echo $ptnt->alergi;?></p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <h6 >Kesukaan</h6>
                            <p><?php echo $ptnt->makanan_kesukaan;?></p>
                          </div>
                        </div>
                        
                        
                                </div>
                
                </form>
              </div>
            </div>
          </div>
       
      </div>
    </div>
  
  </div>
  <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card">
             
              <div class="card-header card-header-primary">
                <h4 class="card-title">Data </h4>
                <p class="card-category">Dietary</p>
              </div>
              
              <div class="card-body">
                <form action="#">
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <h6 >Nasi</h6>
                        <p><?php echo $ptnt->dietary_nasi;?></p>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <h6 >Yang biasa dikonsumsi (Susu , Teh , Kopi)</h6>
                       
                          </div>
                            
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <h6 >Keterangan :</h6>
                          <p><?php echo $ptnt->dietary_minuman;?></p>
                        </div>
                      </div>
                      </div>
                    <br>
                   
                    
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <h6 >Lauk Hewani</h6>
                            <p><?php echo $ptnt->dietary_lauk_hewani;?></p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <h6 >Softdrink</h6>
                            <p><?php echo $ptnt->dietary_softdrink;?></p>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <h6 >Lauk Nabati</h6>
                                <p><?php echo $ptnt->dietary_lauk_nabati;?></p>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <h6 >Jus / Buah</h6>
                                <p><?php echo $ptnt->dietary_jus;?></p>
                              </div>
                            </div>
                          </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <h6 >Sayur</h6>
                                            <p><?php echo $ptnt->dietary_sayur;?></p>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <h6 >Suplemen</h6>
                                            <p><?php echo $ptnt->dietary_suplemen;?></p>
                                          </div>
                                        </div>
                                        </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <h6 >Sumber Minyak</h6>
                                                        <p><?php echo $ptnt->dietary_sumber_minyak;?></p>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <h6 >Lainnya</h6>
                                                        <p><?php echo $ptnt->dietary_lainnya;?></p>
                                                      </div>
                                                    </div>
                                                            </div>
                </form>
              </div>
            </div>
          </div>
       
      </div>
    </div>
  
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10">
          <div class="card">
           
            <div class="card-header card-header-primary">
              <h4 class="card-title">Data </h4>
              <p class="card-category">Lain-lain</p>
            </div>
            
            <div class="card-body">
              <form action="#">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <h6>Lain Lain</h6>
                    <textarea class="form-control" rows="5" readonly>
                    <?php echo $ptnt->lain_lain;?>
                    </textarea>
                   </div>
                  </div>
                  </div>
               </form>
            </div>
          </div>
        </div>
    </div>
  </div>

</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
         
          <div class="card-header card-header-primary">
            <h4 class="card-title">Data</h4>
            <p class="card-category">Diagnosa</p>
          </div>
          
          <div class="card-body">
            <form action="#">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <h6>Diagnosa</h6>
                  <textarea class="form-control" rows="5" readonly>
                  <?php echo $ptnt->diagnosa;?>
                  </textarea>
                 </div>
                </div>
                </div>
             </form>
          </div>
        </div>
      </div>
   
  </div>
</div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
         
          <div class="card-header card-header-primary">
            <h4 class="card-title">Data TB/BB</h4>
            <p class="card-category">Status Gizi</p>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <h6 >Angka</h6>
                      <p><?php echo $ptnt->angka_tb_bb;?></p>
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><h6>Gambar</h6><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                        <img src="<?php echo base_url('graph_pictures/' . $ptnt->gambar_tb_bb);?>" alt="Gambar TB/BB" width="360" height="240"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <h6 >Keterangan </h6>
                        <p><?php echo $ptnt->keterangan_tb_bb;?></p>
                      </div>
                    </div>
                  </div>
          </div>
        </div>
      </div>
   
  </div>
</div>


<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
         
          <div class="card-header card-header-primary">
            <h4 class="card-title">Data BB/U</h4>
            <p class="card-category">Status Gizi</p>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <h6 >Angka</h6>
                      <p><?php echo $ptnt->angka_bb_u;?></p>
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Gambar</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                      <img src="<?php echo base_url('graph_pictures/' . $ptnt->gambar_bb_u);?>" alt="Gambar BB/U" width="360" height="240"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">   
                        <h6 >Keterangan </h6>
                        <p><?php echo $ptnt->keterangan_bb_u;?></p>
                      </div>
                    </div>
                  </div>
          </div>
        </div>
      </div>
   
  </div>
</div>


<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
         
          <div class="card-header card-header-primary">
            <h4 class="card-title">Data TB/U</h4>
            <p class="card-category">Status Gizi</p>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <h6 >Angka</h6>
                      <p><?php echo $ptnt->angka_tb_u;?></p>
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Gambar</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                      <img src="<?php echo base_url('graph_pictures/' . $ptnt->gambar_tb_u);?>" alt="Gambar TB/U" width="360" height="240"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <h6 >Keterangan </h6>
                        <p><?php echo $ptnt->keterangan_tb_u;?></p>
                      </div>
                    </div>
                  </div>
          </div>
        </div>
      </div>
  </div>
</div>

</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
         
          <div class="card-header card-header-primary">
            <h4 class="card-title">Data IMT/U</h4>
            <p class="card-category">Status Gizi</p>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <h6 >Angka</h6>
                      <p><?php echo $ptnt->angka_imt_u;?></p>
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Gambar</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                      <img src="<?php echo base_url('graph_pictures/' . $ptnt->gambar_imt_u);?>" alt="Gambar IMT/U" width="360" height="240"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <h6 >Keterangan </h6>
                        <p><?php echo $ptnt->keterangan_imt_u;?></p>
                      </div>
                    </div>
                  </div>
          </div>
        </div>
      </div>
   
  </div>
</div>

</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
         
          <div class="card-header card-header-primary">
            <h4 class="card-title">Data HC/U</h4>
            <p class="card-category">Status Gizi</p>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <h6 >Angka</h6>
                      <p><?php echo $ptnt->angka_hc_u;?></p>
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Gambar</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                      <img src="<?php echo base_url('graph_pictures/' . $ptnt->gambar_hc_u);?>" alt="Gambar HC/U" width="360" height="240"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <h6 >Keterangan </h6>
                        <p><?php echo $ptnt->keterangan_hc_u;?></p>
                      </div>
                    </div>
                  </div>
          </div>
        </div>
      </div>
  </div>
</div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
     
      
          <div class="card-header card-header-primary">
            <h4 class="card-title">Interenvensi </h4>
         
          </div>
          
          <div class="card-body">
                           <div class="row">
                                <div class="col-md-6">
                                <th>
                                <div class="form-group">
                                <h6>Kebutuhan Energi</h6>
                                <p><?php echo $ptnt->energi;?>&nbsp;&nbsp;&nbsp;&nbsp;Kalori</p>
                                </div>
                              </th>
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4">
                                <td><h6> Karbohidrat</h6>
                                <div class="form-group">
                                <p><?php echo $ptnt->persen_karbohidrat;?>&nbsp;&nbsp;&nbsp;&nbsp;%</p>
                                </div>
                                </td>
                              </div>
                                <div class="col-md-4">
                                <td><h6> 
                                 <br>
                                 <div class="form-group">
                                 <p><?php echo $ptnt->gram_karbohidrat;?>&nbsp;&nbsp;&nbsp;&nbsp;Gram</p>
                                  </div>
                          </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                              <td><h6> Protein</h6>
                              <div class="form-group">
                              <p><?php echo $ptnt->persen_protein;?>&nbsp;&nbsp;&nbsp;&nbsp;%</p>
                              </div>
                              </td>
                            </div>
                              <div class="col-md-4">
                              <td><h6> 
                            
                               <br>
                               <div class="form-group">
                               <p><?php echo $ptnt->gram_protein;?>&nbsp;&nbsp;&nbsp;&nbsp;Gram</p>
                                </div>
                        </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-md-4">
                            <td><h6> Lemak</h6>
                            <div class="form-group">
                            <p><?php echo $ptnt->persen_lemak;?>&nbsp;&nbsp;&nbsp;&nbsp;%</p>
                            </div>
                              </td>
                          </div>
                            <div class="col-md-4">
                            <td><h6> 
                          
                             <br>
                             <div class="form-group">
                             <p><?php echo $ptnt->gram_lemak;?>&nbsp;&nbsp;&nbsp;&nbsp;Gram</p>
                              </div>
                      </div>
                          </div>
                         </form>
                      </div>
                       </div>
                    </div>
                  </div>
              </div>
          </div>

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10">
          <div class="card">
           
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit </h4>
              <p class="card-category">Monitoring dan Evaluasi</p>
            </div>
            <div class="card-body">
              <form action="#">
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <h6 >Tanggal</h6>
                      <p><?php echo $ptnt->mon_date;?></p>
                    </div>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <h6 >Monitor dan Evaluasi</h6>
                      <textarea class="form-control" rows="5" placeholder="" readonly><?php echo $ptnt->result;?></textarea>
                    </div>
                  </div>  
                  <?php endforeach; 
                          } else { echo "Tidak ada data gizi,silahkan melakukan pengisian data gizi";
                          }?>                  
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
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