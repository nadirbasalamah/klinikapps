<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <title>Klinik Apps</title>
</head>
<body>
    <h1>Selamat Datang di KlinikApps</h1>
    <p>Silahkan login dengan akun Anda</p>
    <a href="<?php echo base_url('user/login');?>">
        <button class="btn btn-primary">LOGIN</button>
    </a>
    <br>
    <br>
    <p>Belum memiliki akun ?</p>
    <a href="<?php echo base_url('user/register');?>">
        <button class="btn btn-primary">SIGN UP</button>
    </a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
</body>
</html>