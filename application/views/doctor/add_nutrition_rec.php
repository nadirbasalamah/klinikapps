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
    Add Nutrition Record
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>">
  <!-- CSS Files -->
  <link href="<?php echo base_url('assets/css/image-preview.css');?>" rel="stylesheet" />
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
              <i class="material-icons">edit</i>
              <p>Tambah Data Gizi Pasien</p>
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
            <a class="navbar-brand" href="#">Tambah Data Gizi Pasien</a>
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
                <?php foreach($patient as $ptnt):?>
                <?php echo form_open_multipart(base_url('Doctor/updateNutritionRecord/' . $ptnt->id_patient)); ?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">BB</label>
                          <input type="number" class="form-control" id="bb" name="bb" step="0.01" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">IMT</label>
                          <input type="number" class="form-control" id="imt" name="imt" step="0.01" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">TB (cm)</label>
                          <input type="number" class="form-control" id="tb" name="tb" step="0.01" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">BBI</label>
                          <input type="number" class="form-control" name="bbi" step="0.01"  required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">LILA/Lingkar Kepala</label>
                          <input type="number" class="form-control" name="lila" step="0.01" required>
                        </div>
                      </div>
  </div>
  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fat (%)</label>
                          <input type="number" class="form-control" name="fat" step="0.01" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Visceral Fat</label>
                          <input type="number" class="form-control" name="visceral_fat" step="0.01"  required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Muscle (%)</label>
                          <input type="number" class="form-control" name="muscle" step="0.01"  required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Body Age</label>
                          <input type="number" class="form-control" name="body_age" step="0.01"  required>
                        </div>
                      </div>
                    </div>

                      <br>
                          <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Status Gizi (Kategori)</label>
                                <div class="form-check form-check-radio">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="underweight" disabled>
                                      Underweight
                                      <span class="circle">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                              <div class="form-check form-check-radio">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="normal" disabled>
                                      Normal
                                      <span class="circle">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                              <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="overweight" disabled>
                                    Overweight
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="obese" disabled>
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
                        <input type="number" class="form-control" name="gda" step="0.01"  required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Trigliserida</label>
                        <input type="number" class="form-control" name="trigliserida" step="0.01"  required>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ureum</label>
                          <input type="number" class="form-control" name="ureum" step="0.01"  required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">GDP</label>
                            <input type="number" class="form-control" name="gdp" step="0.01"  required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Kolesterol Total</label>
                            <input type="number" class="form-control" name="kolesterol" step="0.01"  required>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Kreatinin</label>
                              <input type="number" class="form-control" name="kreatinin" step="0.01"  required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">GD2JPP</label>
                                <input type="number" class="form-control" name="gd2jpp" step="0.01"  required>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">LDL</label>
                                <input type="number" class="form-control" name="ldl" step="0.01"  required>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label class="bmd-label-floating">SGOT</label>
                                  <input type="number" class="form-control" name="sgot" step="0.01"  required>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Asam Urat</label>
                                    <input type="number" class="form-control" name="asam_urat" step="0.01"  required>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">HDL</label>
                                    <input type="number" class="form-control" name="hdl" step="0.01"  required>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">SGPT</label>
                                      <input type="number" class="form-control" name="sgpt" step="0.01"  required>
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
                        <input type="number" class="form-control" name="tensi" step="0.01"  required>
                      </div>
                    </div>
                   
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Suhu(Celcius)</label>
                          <input type="number" class="form-control" name="suhu" step="0.01"  required>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">lainnya</label>
                            <input type="text" class="form-control" name="lainnya"  required>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">RR(x/menit)</label>
                            <input type="number" class="form-control" name="rr" step="0.01"  required>
                          </div>
                        </div>
                       
                        <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Oedema</label>
                              <input type="number" class="form-control" name="oedema" step="0.01"  required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <br>
                            <div class="form-group">
                              <label class="bmd-label-floating">Aktivitas</label>
                              <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="aktivitas" id="exampleRadios1" value="ringan" required >
                                    Ringan
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="aktivitas" id="exampleRadios2" value="sedang" >
                                    Sedang
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio">
                              <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="aktivitas" id="exampleRadios2" value="berat" >
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
                          <input type="text" class="form-control" name="durasi_olahraga"  required>
                        </div>
                      </div>
                     
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Jenis Olahraga</label>
                            <input type="text" class="form-control" name="jenis_olahraga"  required>
                          </div>
                        </div>
                       
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">Diagnosa Dahulu </label>
                              <input type="text" class="form-control" name="diagnosa_dahulu"  required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Diagnosa Sekarang </label>
                                <input type="text" class="form-control" name="diagnosa_skrg"  required>
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
                        <input type="text" class="form-control" name="nafsu_makan"  required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Frekuensi Makan( x/hari , teratur/tidak teratur ) </label>
                        <input type="text" class="form-control" name="frekuensi_makan"  required>
                      </div>
                    </div>
                   
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Alergi / Pantangan</label>
                            <input type="text" class="form-control" name="alergi"  required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Kesukaan</label>
                            <input type="text" class="form-control" name="makanan_kesukaan"  required>
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
                        <input type="text" class="form-control" name="dietary_nasi"  required>
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
                          <input type="text" class="form-control" name="dietary_minuman"  required>
                        </div>
                      </div>
                      </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Lauk Hewani</label>
                            <input type="text" class="form-control" name="dietary_lauk_hewani"  required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Softdrink</label>
                            <input type="text" class="form-control" name="dietary_softdrink"  required>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">Lauk Nabati</label>
                                <input type="text" class="form-control" name="dietary_lauk_nabati"  required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">Jus / Buah</label>
                                <input type="text" class="form-control" name="dietary_jus"  required>
                              </div>
                            </div>
                          </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">Sayur</label>
                                            <input type="text" class="form-control" name="dietary_sayur"  required>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">Suplemen</label>
                                            <input type="text" class="form-control" name="dietary_suplemen"  required>
                                          </div>
                                        </div>
                                        </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="bmd-label-floating">Sumber Minyak</label>
                                                        <input type="text" class="form-control" name="dietary_sumber_minyak"  required>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="bmd-label-floating">Lainnya</label>
                                                        <input type="text" class="form-control" name="dietary_lainnya"  required>
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
                    <textarea class="form-control" rows="5" name="lain_lain" required></textarea>
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
                  <textarea class="form-control" rows="5" name="diagnosa" required></textarea>
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
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Angka</label>
                      <input type="number" class="form-control" name="angka_tb_bb" required>
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Upload Image</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                        <img src="<?php echo base_url('profile_pictures/default.png');?>" id="image-preview" alt="Default Image" width="360" height="240"/>
                      <br/>
                        <input type="file" id="image-source" name="gambar_tb_bb" onchange="previewImage('image-preview','image-source');"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                         
                        <label class="bmd-label-floating">Keterangan </label>
                        <input type="text" class="form-control" name="keterangan_tb_bb" required>
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
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Angka</label>
                      <input type="number" class="form-control" name="angka_bb_u" required>
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Upload Image</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                        <img src="<?php echo base_url('profile_pictures/default.png');?>" id="image-preview2" alt="Default Image" width="360" height="240"/>
                      <br/>
                        <input type="file" id="image-source2" name="gambar_bb_u" onchange="previewImage('image-preview2','image-source2');"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                         
                        <label class="bmd-label-floating">Keterangan </label>
                        <input type="text" class="form-control" name="keterangan_bb_u" required>
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
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Angka</label>
                      <input type="number" class="form-control" name="angka_tb_u" required>
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Upload Image</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                      <img src="<?php echo base_url('profile_pictures/default.png');?>" id="image-preview3" alt="Default Image" width="360" height="240"/>
                      <br/>
                        <input type="file" id="image-source3" name="gambar_tb_u" onchange="previewImage('image-preview3','image-source3');"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                         
                        <label class="bmd-label-floating">Keterangan </label>
                        <input type="text" class="form-control" name="keterangan_tb_u" required>
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
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Angka</label>
                      <input type="number" class="form-control" name="angka_imt_u" required>
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Upload Image</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                      <img src="<?php echo base_url('profile_pictures/default.png');?>" id="image-preview4" alt="Default Image" width="360" height="240"/>
                      <br/>
                        <input type="file" id="image-source4" name="gambar_imt_u" onchange="previewImage('image-preview4','image-source4');"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                         
                        <label class="bmd-label-floating">Keterangan </label>
                        <input type="text" class="form-control" name="keterangan_imt_u" required>
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
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Angka</label>
                      <input type="number" class="form-control" name="angka_hc_u" required>
                    </div>
                  </div>
              </div>
              
                <div class="row">
                  <div class="col-md-6">
                      <br><label>Upload Image</label><br>
                      <div style="padding:10px;margin-left:-10px;  " container>
                      <img src="<?php echo base_url('profile_pictures/default.png');?>" id="image-preview5" alt="Default Image" width="360" height="240"/>
                      <br/>
                        <input type="file" id="image-source5" name="gambar_hc_u" onchange="previewImage('image-preview5','image-source5');"/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                         
                        <label class="bmd-label-floating">Keterangan </label>
                        <input type="text" class="form-control" name="keterangan_hc_u" required>
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
                                <input type="number" class="form-control" name="energi"  required>
                                </div>
                                <div class="form-group">
                                <label class="bmd-label-floating">Keterangan </label>
                                <input type="text" class="form-control" name="keterangan_inter"  required>
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
                                    <input type="number" class="form-control" name="persen_karbohidrat" step="0.01"  required>
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
                                    <input type="number" class="form-control" name="gram_karbohidrat" step="0.01"  disabled>
                                  </div>
                          </div>
                          <span style="margin-top: 31px;">
                              <td><h6 >Gram</h6></td></span>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                              <td><h6> Protein</h6>
                              <div class="form-group">
                                  <input type="number" class="form-control" name="persen_protein" step="0.01"  required>
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
                                  <input type="number" class="form-control" name="gram_protein" step="0.01"  disabled>
                                </div>
                        </div>
                        <span style="margin-top: 31px;">
                            <td><h6 >Gram</h6></td></span>
                            </div>
                            
                            <div class="row">
                              <div class="col-md-4">
                            <td><h6> Lemak</h6>
                            <div class="form-group">
                                <input type="number" class="form-control" name="persen_lemak" step="0.01"  required>
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
                                <input type="number" class="form-control" name="gram_lemak" step="0.01"  disabled>
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
                      <input type="text" class="form-control" name="mon_date" required >
                    </div>
                  </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Monitor dan Evaluasi</label>
                      <textarea class="form-control" name="result" rows="5" required></textarea>
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
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/js/image-preview.js');?>"></script>
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