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
    <h2>Silahkan lakukan registrasi</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open(base_url('User/new_user_registration')); ?>
    <div class="form-group">
        <label for="fullname">Nama Lengkap</label>
        <input type="text" class="form-control" id="fullname" placeholder="Masukkan nama lengkap" name="fullname">
    </div>
    <div class="form-group">
        <label for="birthdate">Tanggal Lahir</label>
        <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="format:dd/mm/yyyy">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Masukkan nama pengguna" name="username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
    </div>
    <label for="gender-select">Jenis Kelamin</label>
    <div class="form-check form-check-inline" id="gender-select">
  <input class="form-check-input" type="radio" name="gender" id="genderlakilaki" value="lakilaki" checked>
  <label class="form-check-label" for="genderlakilaki">Laki-laki</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender" id="genderperempuan" value="perempuan">
    <label class="form-check-label" for="genderperempuan">Perempuan</label>
    </div>
    <div class="form-group">
        <label for="phone_number">Nomor ponsel yang dapat dihubungi</label>
        <input type="number" class="form-control" id="phone_number" placeholder="Masukkan nomor ponsel / telepon" name="phone_number">
    </div>
    <div class="form-group">
        <label for="age">Umur</label>
        <input type="number" class="form-control" id="age" placeholder="Masukkan umur Anda" name="age">
    </div>
    <div class="form-group">
        <label for="email">Alamat Email</label>
        <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email">
    </div>
    <div class="form-group">
        <label for="address">Alamat Tempat Tinggal</label>
        <input type="text" class="form-control" id="address" placeholder="Masukkan alamat tempat tinggal" name="address">
    </div>
    <div class="form-group">
        <label for="id_number">Nomor Kartu Identitas</label>
        <input type="number" class="form-control" id="id_number" placeholder="Masukkan nomor kartu identitas Anda" name="id_number">
    </div>
    <label for="cardtype">Jenis Kartu Identitas</label>
    <div class="form-check form-check-inline" id="cardtype">
  <input class="form-check-input" type="radio" name="id_type" id="ktp" value="ktp" checked>
  <label class="form-check-label" for="ktp">KTP</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="id_type" id="sim" value="sim">
    <label class="form-check-label" for="sim">SIM</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="id_type" id="nip" value="nip">
    <label class="form-check-label" for="nip">NIP</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="id_type" id="ktm" value="ktm">
    <label class="form-check-label" for="ktm">KTM</label>
    </div>
        <button type="submit" class="btn btn-primary">SIGN UP</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>