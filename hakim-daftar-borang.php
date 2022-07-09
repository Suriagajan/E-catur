<?php
#memulakan fungsi session
session_start();

#memanggil fail header dan guard-hakim
include('header.php');
include('guard-hakim.php');
?>

<!--Tajuk Antaramuka-->
<h3>Pendaftaran Hakim Baru</h3>

<!--Borang pendaftaran hakim baru-->
<form action="hakim-daftar-proses.php"  method="POST">
    nama        <input type="text"      name="nama"><br>
    nokp        <input type="text"      name="nokp"><br>
    katalaluan  <input type="password"  name="katalaluan"><br>
                <input type="submit"    value="Simpan">
</form>
<?php include('footer.php'); ?>