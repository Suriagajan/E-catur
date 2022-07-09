<div id="header"><!-- tajuk sistem. Akan dipaprkan di sebelah atas -->
<h1 id="tajukUtama"> PERTANDINGAN CATUR </h1>
<img id="logo" src="logo.png"  alt="">
<P id="subHeader">ANJURAN PPD PETALING UTAMA </P>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nova+Square&display=swap" rel="stylesheet">

<!-- Video bckground-->
<video autoplay muted id="myVideo">
  <source src="video2.mp4" type="video/mp4">
</video>
<style> <?php include('style.css'); ?></style>

<!-- Bahagian menu asas.
    Menu terbahagi kepada 3 jenis iaitu
    1. Menu hakim dimana hakim dapat akses semua perkara
    2. Menu peserta di mana peserta hanya boleh memeriksa keputusan pertandingan. Peserta perlu login.
    3. Menu di laman utama - bagi pelawat yang tidak login

    Anda boleh menambah menu mengikut kehendak anda
-->
<?php

# Menu Hakim
if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "hakim")
{
    echo "
    <div class='MenuHakim'>
     <a id='hakimMenuOptions' href='hakim-menu.php'>Menu Hakim </a>
     <a id='hakimMenuOptions' href='senarai-peserta.php'>Senarai Peserta </a>
     <a id='hakimMenuOptions' href='peserta-upload-borang.php'>Upload Data Peserta Baharu </a>
     <a id='hakimMenuOptions' href='senarai-hakim.php'>Senarai Hakim </a>
     <a id='hakimMenuOptions' href='penilaian-peserta.php'>Penilaian Peserta </a>
     <a id='hakimMenuOptions' href='keputusan-individu.php'>Keputusan Individu </a>
     <a id='hakimMenuOptions' href='keputusan-sekolah.php'>Keputusan Sekolah </a>
     <a id='hakimMenuOptions' href='logout.php'>Logout </a>
     </div>";
}
# Menu Peserta
else if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "peserta")
{
    echo "
    <div class='MenuPeserta'>
     <a id='pesertaMenu' href='peserta-menu.php'>Menu Peserta </a>
     <a id='logoutPeserta' href='logout.php'>Logout </a> 
     </div>";

}
else{
    #menu Laman Utama
    echo " <a class='laman' href='index.php'>Laman Utama</a>";
}
?>
</div>