<!-- Memaparkan pautan (hyperlink) -->

<div id="navbar">
<div id="button1"><a href='peserta-signup-borang.php'>Daftar Peserta Baharu</a><br></div>
<div id="button2"><a href='peserta-login-borang.php'>Login Peserta</a><br></div>
<div id="button3"><a href='hakim-login-borang.php'>Login Hakim</a><br></div>
</div>
<?php
# Memulakan fungsi SESSION
session_start();

# Memanggil fail header.php dan fail fungsi.php
include('header.php');
include('fungsi.php');
?>
<style> <?php include('style.css') ?></style>
<!-- Memaparkan Syarat-syarat Pertandingan. Ubahsuai syarat pertandingan ini -->
<p> Syarat Pertandingan</p>
<li>Seorang peserta hanya boleh hantar satu penyertaan </li>
<hr>
<!-- Memaparkan keputusan individu -->
keputusan individu
<?PHP
#Memanggil fungsi semak() dari fail fungsi.php
$k=semak();

#Semakan Nilai yang dipulangkan 
if ($k=="Semua peserta telah dinilai."){
    # jika nilai dipulangkan, semua peserta telah dinilai.
    # panggil fungsi keputusan individu dari fail fungsi.php
    # dan papar keputusan 5 individu terbaik.
    # Bilangan pemenang anda boleh ubah di fail fungsi.php
    keputusan_individu(); 
}
else{
    # paparan jika proses penilaian masih belum tamat
    echo"<br>Proses Penilaian masih dibuat";
}
?>
<hr>
<!-- Memaparkan keputusan keseluruhan sekolah -->
keputusan sekolah

<?PHP
# Memanggil fungsi semak() dari fail fungsi.php
$k = semak();

if ($k=="Semua peserta telah dinilai."){
    # jika nilai dipulangkan, semua peserta telah dinilai.
    # panggil fungsi keputusan sekolah dari fail fungsi
    # dan paparkan keputusan keseluruhan sekolah
    keputusan_sekolah(); 
}
else{
    # paparan jika proses penilaian masih belum tamat
    echo"<br>Proses Penilaian masih dibuat";
}
?>
<div id="footer-index">
<?php include ('footer.php'); ?>
</div>