<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$profile_picture = ($this->session->userdata['logged_in']['profile_picture']);
} else {
header("location: " . base_url('User/login'));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>User's Dashboard</title>
</head>
<body>
    <h1>Selamat Datang di KlinikApps</h1>
    <a href="<?php echo base_url('User/logout');?>">
        <button class="btn btn-primary">LOGOUT</button>
    </a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>