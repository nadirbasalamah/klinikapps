<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo_klinik.png');?>">
	<title>Sign Up</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/montserrat-font.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')?>">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>"/>
</head>
<body class="form-v10">
	<style>
		body{
			background-image: url("https://st4.depositphotos.com/2060305/22518/v/600/depositphotos_225182764-stock-video-dynamic-animation-smooth-gradient-background.jpg")
		}
		</style>
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="<?php echo base_url('User/new_user_registration')?>" method="post" id="myform">
				<div class="form-left">
					<h2>Sign-Up</h2>
					<div class="form-row">
						<input type="text" name="fullname" class="fullname" id="fullname" placeholder="Nama Lengkap" required>
					</div>
					<div class="form-group">
							<div class="form-row form-row-1">
								<input type="text" name="username" id="username" class="username" placeholder="Username" required>
							</div>
							<div class="form-row form-row-2">
								<input type="password" name="password" id="password" class="password" placeholder="Password" required>
							</div>
						</div>
					
				 <div class="form-row">
						<input type="text" name="birthdate" class="date" id="birthdate" placeholder="Tanggal lahir (format:dd/mm/yyyy)" required>
					</div>
					
					<div class="form-row">
						<select name="gender">
						    <option value="lakilaki">Laki-laki</option>
						    <option value="perempuan">Perempuan</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-row">
						<input type="number" name="age" class="age" id="age" placeholder="Age" required>
						<br>
						<br>
					</div>
				</div>
				<div style="background-color: teal;"   class="form-right">
					<h2>Rincian Kontak</h2>
					<div class="form-row">
						<input type="text" name="address" class="address" id="address" placeholder="Alamat Tempat Tinggal" required>
					</div>
					<div class="form-row">
						<input type="text" name="email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Alamat Email">
					</div>
						<div class="form-row form-row-2">
							<input type="number" name="phone_number" class="phone" id="phone" placeholder="Phone Number" required>
						</div>
						<div class="form-row form-row-2">
							<input type="number" name="id_number" class="id_number" id="id_number" placeholder="Nomor Kartu Identitas" required>
						</div>
						<div class="form-row">
						<select name="id_type">
						    <option value="ktp">KTP</option>
							<option value="sim">SIM</option>
							<option value="ktm">KTM</option>
							<option value="nip">NIP</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-row-last">
						<input type="submit" name="register" class="register" value="Sign-Up Now">
					</div>
				</div>
			</form>
		</div>
	</div>
	<script
	  type="text/javascript" src="<?php echo base_url('assets/js/jquery.gradientify.js')?>"></script>
	  <script
	  type="text/javascript" src="<?php echo base_url('assets/js/jquery.gradientify.min.js')?>"></script>
</body>
</html>