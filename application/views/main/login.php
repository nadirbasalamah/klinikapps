<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>Klinik Apps</title>
</head>
<body>
    <h2>Silahkan login dengan akun Anda</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open(base_url('User/user_login_process')); ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Masukkan username" name="username" value="<?php echo set_value('username'); ?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
    </div>
        <button type="submit" class="btn btn-primary">LOGIN</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>