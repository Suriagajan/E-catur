<?php
#memulakan fungsi session
session_start();

#memanggil fail header dan guard-hakim
include('header.php');
include('guard-hakim.php');
?>
<style><?php include('style.css') ?></style>
<div class="hakimDaftar">
<!--Tajuk Antaramuka-->
<h3 id="hakimDaftar-title">Pendaftaran Hakim Baru</h3>

<!--Borang pendaftaran hakim baru-->
<div class="hakimDaftar-formContainer">
<form action="hakim-daftar-proses.php"  method="POST">
    nama        <input id="hakimDaftar-name" type="text"      name="nama"><br>
    nokp        <input id="hakimDaftar-nokp" type="text"      name="nokp"><br>
    katalaluan  <input id="hakimDaftar-pass" type="password"  name="katalaluan"><br>
                <input id="hakimDaftar-btn" type="submit"    value="Simpan">
</form>
</div>
<?php include('footer.php'); ?>
</div>