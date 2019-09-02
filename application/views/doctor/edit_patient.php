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
    Edit Patient's Profile
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>">
  <!-- CSS Files -->
  <link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.1');?>" rel="stylesheet" />
</head>

<body style="background-image: url('https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwiQkYTX9ZDkAhWBuo8KHU4iBUoQjRx6BAgBEAQ&url=https%3A%2F%2Fwebgradients.com%2F&psig=AOvVaw3mnMBPWmq-C9OH6YZxMSs0&ust=1566372268059189')">
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
            <a class="nav-link" href="<?php echo base_url('Doctor/index'); ?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
              
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="#">
              <i class="material-icons">edit</i>
              <p>Edit Profil Pasien</p>
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
            <a class="navbar-brand" href="#pablo">Ubah Data Gizi Pasien</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                  <div class="ripple-container"></div>
                </button>
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
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit </h4>
                  <p class="card-category">Antropometri</p>
                </div>
                <div class="card-body">
                <?php foreach($record as $rec):?>
                <?php echo form_open(base_url('Doctor/updateNutritionRecord/' . $rec->id_patient)); ?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">BB</label>
                          <input type="number" class="form-control" name="bb" step="0.01" value=<?php echo $rec->bb;?> required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">IMT</label>
                          <input type="number" class="form-control" name="imt" step="0.01" value=<?php echo $rec->imt;?> disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">TB</label>
                          <input type="number" class="form-control" name="tb" step="0.01" value=<?php echo $rec->tb;?> required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">BBI</label>
                          <input type="number" class="form-control" name="bbi" step="0.01" value=<?php echo $rec->bbi;?> required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">LILA/Lingkar Kepala</label>
                          <input type="number" class="form-control" name="lila" step="0.01" value=<?php echo $rec->lila;?> required>
                        </div>
                      </div>
  </div>
  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fat (%)</label>
                          <input type="number" class="form-control" name="fat" step="0.01" value=<?php echo $rec->fat;?> required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Visceral Fat</label>
                          <input type="number" class="form-control" name="visceral_fat" step="0.01" value=<?php echo $rec->visceral_fat;?> required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Muscle (%)</label>
                          <input type="number" class="form-control" name="muscle" step="0.01" value=<?php echo $rec->muscle;?> required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Body Age</label>
                          <input type="number" class="form-control" name="body_age" step="0.01" value=<?php echo $rec->body_age;?> required>
                        </div>
                      </div>
                    </div>

                      <br>
                          <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Status Gizi (Kategori)</label>
                                <div class="form-check form-check-radio">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="underweight" disabled <?= $rec->status=="underweight" ? "checked" : ""?>>
                                      Underweight
                                      <span class="circle">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                              <div class="form-check form-check-radio">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="normal" disabled <?= $rec->status=="normal" ? "checked" : ""?>>
                                      Normal
                                      <span class="circle">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                              <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="overweight" disabled <?= $rec->status=="overweight" ? "checked" : ""?>>
                                    Overweight
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="obese" disabled <?= $rec->status=="obese" ? "checked" : ""?>>
                                    Obese
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
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
                <h4 class="card-title">Edit </h4>
                <p class="card-category">Biokimia</p>
              </div>
              
              <div class="card-body">
                  
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">GDA</label>
                        <input type="number" class="form-control" name="gda" step="0.01" value=<?php echo $rec->gda;?> required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Trigliserida</label>
                        <input type="number" class="form-control" name="trigliserida" step="0.01" value=<?php echo $rec->trigliserida;?> required>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ureum</label>
                          <input type="number" class="form-control" name="ureum" step="0.01" value=<?php echo $rec->ureum;?> required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">GDP</label>
                            <input type="number" class="form-control" name="gdp" step="0.01" value=<?php echo $rec->gdp;?> required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Kolesterol Total</label>
                            <input type="number" class="form-control" name="kolesterol" step="0.01" value=<?php echo $rec->kolesterol;?> required>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Kreatinin</label>
                              <input type="number" class="form-control" name="kreatinin" step="0.01" value=<?php echo $rec->kreatinin;?> required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">GD2JPP</label>
                                <input type="number" class="form-control" name="gd2jpp" step="0.01" value=<?php echo $rec->gd2jpp;?> required>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">LDL</label>
                                <input type="number" class="form-control" name="ldl" step="0.01" value=<?php echo $rec->ldl;?> required>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label class="bmd-label-floating">SGOT</label>
                                  <input type="number" class="form-control" name="sgot" step="0.01" value=<?php echo $rec->sgot;?> required>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Asam Urat</label>
                                    <input type="number" class="form-control" name="asam_urat" step="0.01" value=<?php echo $rec->asam_urat;?> required>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">HDL</label>
                                    <input type="number" class="form-control" name="hdl" step="0.01" value=<?php echo $rec->hdl;?> required>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">SGPT</label>
                                      <input type="number" class="form-control" name="sgpt" step="0.01" value=<?php echo $rec->sgpt;?> required>
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
                <h4 class="card-title">Edit </h4>
                <p class="card-category">Klinik</p>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Tensi (mmHg)</label>
                        <input type="number" class="form-control" name="tensi" step="0.01" value=<?php echo $rec->tensi;?> required>
                      </div>
                    </div>
                   
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Suhu(Celcius)</label>
                          <input type="number" class="form-control" name="suhu" step="0.01" value=<?php echo $rec->suhu;?> required>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">lainnya</label>
                            <input type="text" class="form-control" name="lainnya" value="<?php echo $rec->lainnya;?>" required>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">RR(x/menit)</label>
                            <input type="number" class="form-control" name="rr" step="0.01" value=<?php echo $rec->rr;?> required>
                          </div>
                        </div>
                       
                        <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Oedema</label>
                              <input type="number" class="form-control" name="oedema" step="0.01" value=<?php echo $rec->oedema;?> required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <br>
                            <div class="form-group">
                              <label class="bmd-label-floating">Aktivitas</label>
                              <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="aktivitas" id="exampleRadios1" value="ringan" required <?= $rec->aktivitas=="ringan" ? "checked" : ""?>>
                                    Ringan
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="aktivitas" id="exampleRadios2" value="sedang" <?= $rec->aktivitas=="sedang" ? "checked" : ""?>>
                                    Sedang
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="aktivitas" id="exampleRadios2" value="berat" <?= $rec->aktivitas=="berat" ? "checked" : ""?>>
                                  Berat
                                  <span class="circle">
                                      <span class="check"></span>
                                  </span>
                              </label>
                          </div>
                              </div>
                            </div>
                            
                        </div>
                          
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Olahraga (x dalam 1 minggu,selama x menit)</label>
                          <input type="text" class="form-control" name="durasi_olahraga" value="<?php echo $rec->durasi_olahraga;?>" required>
                        </div>
                      </div>
                     
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Jenis Olahraga</label>
                            <input type="text" class="form-control" name="jenis_olahraga" value="<?php echo $rec->jenis_olahraga;?>" required>
                          </div>
                        </div>
                       
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">Diagnosa Dahulu </label>
                              <input type="text" class="form-control" name="diagnosa_dahulu" value="<?php echo $rec->diagnosa_dahulu;?>" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Diagnosa Sekarang </label>
                                <input type="text" class="form-control" name="diagnosa_skrg" value="<?php echo $rec->diagnosa_skrg;?>" required>
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
                <h4 class="card-title">Edit </h4>
                <p class="card-category">Dietary</p>
              </div>
              
              <div class="card-body">
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Nafsu Makan ( + / -)</label>
                        <input type="text" class="form-control" name="nafsu_makan" value="<?php echo $rec->nafsu_makan;?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Frekuensi Makan( x/hari , teratur/tidak teratur ) </label>
                        <input type="text" class="form-control" name="frekuensi_makan" value="<?php echo $rec->frekuensi_makan;?>" required>
                      </div>
                    </div>
                   
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Alergi / Pantangan</label>
                            <input type="text" class="form-control" name="alergi" value="<?php echo $rec->alergi;?>" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Kesukaan</label>
                            <input type="text" class="form-control" name="makanan_kesukaan" value="<?php echo $rec->makanan_kesukaan;?>" required>
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
                <h4 class="card-title">Edit </h4>
                <p class="card-category">Dietary</p>
              </div>
              
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Nasi</label>
                        <input type="text" class="form-control" name="dietary_nasi" value="<?php echo $rec->dietary_nasi;?>" required>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label class="bmd-label-floating">Yang biasa dikonsumsi (Susu , Teh , Kopi)</label>
                          </div>      
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Keterangan :</label>
                          <input type="text" class="form-control" name="dietary_minuman" value="<?php echo $rec->dietary_minuman;?>" required>
                        </div>
                      </div>
                      </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Lauk Hewani</label>
                            <input type="text" class="form-control" name="dietary_lauk_hewani" value="<?php echo $rec->dietary_lauk_hewani;?>" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Softdrink</label>
                            <input type="text" class="form-control" name="dietary_softdrink" value="<?php echo $rec->dietary_softdrink;?>" required>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">Lauk Nabati</label>
                                <input type="text" class="form-control" name="dietary_lauk_nabati" value="<?php echo $rec->dietary_lauk_nabati;?>" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">Jus / Buah</label>
                                <input type="text" class="form-control" name="dietary_jus" value="<?php echo $rec->dietary_jus;?>" required>
                              </div>
                            </div>
                          </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">Sayur</label>
                                            <input type="text" class="form-control" name="dietary_sayur" value="<?php echo $rec->dietary_sayur;?>" required>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">Suplemen</label>
                                            <input type="text" class="form-control" name="dietary_suplemen" value="<?php echo $rec->dietary_suplemen;?>" required>
                                          </div>
                                        </div>
                                        </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="bmd-label-floating">Sumber Minyak</label>
                                                        <input type="text" class="form-control" name="dietary_sumber_minyak" value="<?php echo $rec->dietary_sumber_minyak;?>" required>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="bmd-label-floating">Lainnya</label>
                                                        <input type="text" class="form-control" name="dietary_lainnya" value="<?php echo $rec->dietary_lainnya;?>" required>
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
              <h4 class="card-title">Edit </h4>
              <p class="card-category"></p>
            </div>
            
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Lain Lain</label>
                    <textarea class="form-control" rows="5" name="lain_lain" required><?php echo $rec->lain_lain;?></textarea>
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
            <h4 class="card-title">Edit </h4>
            <p class="card-category"></p>
          </div>
          
          <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Diagnosa</label>
                  <textarea class="form-control" rows="5" name="diagnosa" required><?php echo $rec->diagnosa;?></textarea>
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
            <h4 class="card-title">Edit TB/BB</h4>
            <p class="card-category">Status Gizi</p>
          </div>
          <!--TODO: update another data-->
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Angka</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Upload Image</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                               <label class="bmd-label-floating"></label>
                          <input type="file">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                         
                        <label class="bmd-label-floating">Keterangan </label>
                        <input type="text" class="form-control">
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
            <h4 class="card-title">Edit BB/U</h4>
            <p class="card-category">Status Gizi</p>
          </div>
          <!--TODO: update another data-->
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Angka</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Upload Image</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                               <label class="bmd-label-floating"></label>
                          <input type="file">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                         
                        <label class="bmd-label-floating">Keterangan </label>
                        <input type="text" class="form-control">
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
            <h4 class="card-title">Edit TB/U</h4>
            <p class="card-category">Status Gizi</p>
          </div>
          <!--TODO: update another data-->
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Angka</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Upload Image</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                               <label class="bmd-label-floating"></label>
                          <input type="file">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                         
                        <label class="bmd-label-floating">Keterangan </label>
                        <input type="text" class="form-control">
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
            <h4 class="card-title">Edit IMT/U</h4>
            <p class="card-category">Status Gizi</p>
          </div>
          <!--TODO: update another data-->
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Angka</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Upload Image</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                               <label class="bmd-label-floating"></label>
                          <input type="file">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                         
                        <label class="bmd-label-floating">Keterangan </label>
                        <input type="text" class="form-control">
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
            <h4 class="card-title">Edit HC/U</h4>
            <p class="card-category">Status Gizi</p>
          </div>
          <!--TODO: update another data-->
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Angka</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Upload Image</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                               <label class="bmd-label-floating"></label>
                          <input type="file">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                         
                        <label class="bmd-label-floating">Keterangan </label>
                        <input type="text" class="form-control">
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
                                <label class="bmd-label-floating">Kebutuhan Energi </label>
                                <input type="number" class="form-control" name="energi" value=<?php echo $rec->energi;?> required>
                                </div>
                                <div class="form-group">
                                <label class="bmd-label-floating">Keterangan </label>
                                <input type="text" class="form-control" name="keterangan_inter"  value="<?php echo $rec->keterangan_inter;?>" required>
                                </div>
                              </th>
                                </div>
                                <div class="col-md-6">
                                  <br>
                                 
                               
                                  <td><h6>kalori</h6></td>
                              
                              
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4">
                                <td><h6> Karbohidrat</h6>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="persen_karbohidrat" step="0.01" value=<?php echo $rec->persen_karbohidrat;?> required>
                                </div>
                                </td>
                              </div>
                              <span 
                                  style="margin-top: 31px;">
                                <td><h6 >%</h6></td>
                              </span>
                                <div class="col-md-4">
                                <td><h6> 
                              
                                 <br>
                                 <div class="form-group">
                                    <input type="number" class="form-control" name="gram_karbohidrat" step="0.01" value=<?php echo $rec->gram_karbohidrat;?> disabled>
                                  </div>
                          </div>
                          <span style="margin-top: 31px;">
                              <td><h6 >Gram</h6></td></span>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                              <td><h6> Protein</h6>
                              <div class="form-group">
                                  <input type="number" class="form-control" name="persen_protein" step="0.01" value=<?php echo $rec->persen_protein;?> required>
                              </div>
                              </td>
                            </div>
                            <span 
                                style="margin-top: 31px;">
                              <td><h6 >%</h6></td>
                            </span>
                              <div class="col-md-4">
                              <td><h6> 
                            
                               <br>
                               <div class="form-group">
                                  <input type="number" class="form-control" name="gram_protein" step="0.01" value=<?php echo $rec->gram_protein;?> disabled>
                                </div>
                        </div>
                        <span style="margin-top: 31px;">
                            <td><h6 >Gram</h6></td></span>
                            </div>
                            
                            <div class="row">
                              <div class="col-md-4">
                            <td><h6> Lemak</h6>
                            <div class="form-group">
                                <input type="number" class="form-control" name="persen_lemak" step="0.01" value=<?php echo $rec->persen_lemak;?> required>
                            </div>
                              </td>
                          </div>
                          <span 
                              style="margin-top: 31px;">
                            <td><h6 >%</h6></td>
                          </span>
                            <div class="col-md-4">
                            <td><h6> 
                          
                             <br>
                             <div class="form-group">
                                <input type="number" class="form-control" name="gram_lemak" step="0.01" value=<?php echo $rec->gram_lemak;?> disabled>
                              </div>
                      </div>
                      <span style="margin-top: 31px;">
                          <td><h6 >Gram</h6></td></span>
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
              <h4 class="card-title">Edit </h4>
              <p class="card-category">Monitoring dan Evaluasi</p>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tanggal</label>
                      <input type="text" name="mon_date" class="form-control" value="<?php echo $rec->mon_date;?>" required >
                    </div>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Monitor dan Evaluasi</label>
                      <textarea class="form-control" name="result" rows="5" required><?php echo $rec->result;?></textarea>
                    </div>
                  </div>
                  <?php endforeach;?>           
                <button type="submit" class="btn btn-primary pull-right">Simpan Data</button>
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
                <div class="card card-profile">
            </div>
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Kirim Pesan</h4>
                  <p class="card-category">Pesan dikirim melalui aplikasi Whatsapp</p>
                </div>
                <div class="card-body">
                <?php foreach($record as $rec):?>
                <?php echo form_open(base_url('Doctor/sendMessage/' . $rec->id_patient)); ?>
                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label class="bmd-label-floating">Isi pesan</label>
                          <textarea class="form-control" rows="5" name="message"></textarea>
                        </div>
                      </div>
                      </div>
                        <button type="submit" class="btn btn-primary pull-right">Kirim</button>      
                      <?php endforeach;?>
                       </form>
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
  <!-- Plugin for the momentJs  -->
  
  <!--  Plugin for Sweet Alert -->
  
  <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url('assets/js/plugins/jquery.validate.min.js');?>"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?php echo base_url('assets/js/plugins/jquery.bootstrap-wizard.js');?>"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo base_url('assets/js/plugins/jquery.dataTables.min.js');?>"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-tagsinput.js');?>"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url('assets/js/plugins/nouislider.min.js');?>"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  
  <!-- Chartist JS -->
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