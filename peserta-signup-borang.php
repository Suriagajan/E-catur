<div id="signup-borang">
<?php
#memulakan fungsi session
session_start();

#memanggil fail header.php fungsi.php
include('fungsi.php');
?>
<style> <?php include('style.css'); ?></style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

<!-- Tajuk Antaramuka -->
<h3 id="signup-title"> PENDAFTARAN PESERTA BAHARU </h3>

<!--Borang pendaftaran peserta baru -->
<div id="form">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<form  id="signup-form" action="peserta-signup-proses.php" method = 'POST'>
    Nama peserta    <input id="name-signup-borang" type='text'      name="nama"         required><br>
    Nokp Peserta    <input id="nokp-signup-borang" type='text'      name="nokp"         required><br>
    Katalaluan      <input id="pass-signup-borang" type='password'  name="katalaluan"   required><br>
    Sekolah         <select id="sekolah-signup-borang"              name="kod_sekolah"  required><br>

                        <option selected value disabled> Pilih</option>
                        <!-- Menagambil senarai sekolah dari fail fungsi.php -->
                        <?= $list=senarai_sekolah(); ?>
                    </select>

                    <br><input id="daftar" type='submit' value='Daftar'>
</form>
</div>
<?php include('footer.php'); ?>
</div>