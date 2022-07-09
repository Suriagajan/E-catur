
<?php
# memulakan fail session
session_start();

# memnaggil fail guard-hakim.php dan header.php 
include('header.php');

?>
<div class="hakim-menu">
<style><?php include('style.css') ?></style>

<!-- memaparkan nama hakim--> 
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
<div class='sectionContainer'>
<p id="namaHakim">SELAMAT DATANG <?= $_SESSION['nama'] ?></p>

<!-- Memaparkan tugas-tugas sebagai hakim pertandingan-->
<div class="tugasHakim-container">
<p id="tugasHakim">Tugas Hakim</p>
<ol>
    <li id="tugas">Setiap hakim boleh menilai mana-mana peserta yang disenaraikan</li>
    <li id="tugas">Setiap hakim boleh mendaftar peserta baharu dengan cara memuat naik data *txt peserta.</li>
    <li id="tugas">Peserta terakhir akan dinilai dan diberikan markah pada hari terakhir pertandingan.</li>
</ol>
</div>
<div id="footerContainer-hakim">
<?php include('footer.php'); ?>
</div>
</div>
</div>