<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Klinik Apps</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/montserrat-font.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')?>">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/home.css')?>"/>
</head>
<body class="form-v10">
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="<?php echo base_url('User/user_login_process')?>" method="post" id="myform">
				<div style="background-color:darkcyan;" class="form-left">
				
					<h1>	Welcome To <br>
					Klinik Apps</h1>
					<p  >Don't have an account? </p>
					<a href="<?php echo base_url('user/register');?>">
					<p>Sign Up</p>
					</a>
					<style>
						h1 {
							color:black;
						font-variant: normal;
						text-align: left;
						margin-top: 140px;
						margin-left:140px;
						color:white;
						}
						img {

							margin-top:5px;
						margin-left:10px;
						}
					p {
						color:white;
						font-variant: normal;
						text-align: left;
						margin-left:140px;
						
					}
					</style>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
				<div style=background-color:teal; class="form-right">
					
					<h2>Sign in to Your Account</h2>
					<br>					
					<div class="form-row">
						<input type="text" name="username" class="username" id="username" placeholder="Username" required value="<?php echo set_value('username'); ?>">
					</div>
					<div class="form-row">
						<input type="password" name="password" id="password" class="password"  placeholder="Password" required value="<?php echo set_value('password'); ?>">
					</div>
					<div class="form-row-last">
						<input type="submit" name="register" class="register" value="Login">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>